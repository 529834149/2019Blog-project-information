<?php

namespace App\Models;

class Topic extends Model
{
    protected $fillable = ['id','title', 'body', 'category_id', 'reply_count', 'view_count', 'last_reply_user_id', 'order', 'slug','article_summary'];
	protected $table ='topics';
    protected $primaryKey = 'id';//定义主键
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 排序
    public function scopeWithOrder($query, $order)
    {
        // 不同的排序，使用不同的数据读取逻辑
        switch ($order) {
            case 'recent':
                $query->recent();
                break;

            default:
                $query->recentReplied();
                break;
        }
        // 预加载防止 N+1 问题
        return $query->with('category');
    }

    public function scopeRecentReplied($query)
    {
        // 当话题点击量最多的时候，我们将编写逻辑来更新话题模型的 reply_count 属性，
        // 此时会自动触发框架对数据模型 click 时间戳的更新
        return $query->orderBy('click', 'desc');
    }

    public function scopeRecent($query)
    {
        // 按照创建时间排序
        return $query->orderBy('created_at', 'desc');
    }
}