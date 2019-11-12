<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use App\Models\Category;
class AppServiceProvider extends ServiceProvider

{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Topic::observe(\App\Observers\TopicObserver::class);
		\App\Models\Project::observe(\App\Observers\ProjectObserver::class);

        Schema::defaultStringLength(191);
        \Carbon\Carbon::setLocale('zh');
		
		// $cates = Category::get()
		
		// $category = Category::with('allChildrenCategorys')->find(1);
		// $re = $category->allChildrenCategorys;
		
		$cates= $this->tree();

			
		
		View::share('cate', $cates);
    }
	public function tree($parent_id = 0)
    {
        $rows = Category::where('parent_id', $parent_id)->orderBy('sort_order','ASC')->get();
        $arr = array();
        if (sizeof($rows) != 0){
            foreach ($rows as $key => $val){
                $val['list'] = $this->tree($val['id']);
                $arr[] = $val;
            }
            return $arr;
        }
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
