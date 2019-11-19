<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function show(Category $category, Request $request, Topic $topic)
    {
		
		
        // 读取分类 ID 关联的话题，并按每 20 条分页
        $topics = $topic->where('is_show','y')->withOrder($request->order)
                        ->where('category_id', $category->id)
                        ->paginate(20);
		//判断当前分类是否是子分类
		if($category['parent_id'] !== 0){
			$parent_info = Category::where('id',$category['parent_id'])->first();
		}
		if(isset($parent_info)){
			// 传参变量话题和分类到模板中
			return view('topics.index', compact('topics', 'category','parent_info'));
		}else{
			return view('topics.index', compact('topics', 'category'));
		}
      
    }
	
}