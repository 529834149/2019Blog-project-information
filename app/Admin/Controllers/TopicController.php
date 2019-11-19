<?php

namespace App\Admin\Controllers;

use App\Models\Topic;
use App\Models\Category;
use Encore\Admin\Controllers\AdminController;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class TopicController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '待审核文章';
	
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
	
        $grid = new Grid(new Topic);
		$grid->model()->orderBy('id', 'desc');
		//$grid->model()->where('is_show', '=', 'off');
		//$grid->model()->orderBy('is_show','desc');
		///$grid->where('is_show',$request->input('n') );
        $grid->column('id', __('自增ID'));
        $grid->column('category_id', __('分类名称'))->display(function($category_id){
			$cate  = Category::find($category_id);
			return $cate['name'].'('.$category_id.')';
		});
        $grid->column('title', __('标题'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
		$grid->column('is_show','处理状态')->bool(['y' => true, 'n' => false]);
		
	
		$grid->disableCreateButton();

		$grid->disableExport();
		$grid->disableColumnSelector();
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Topic::findOrFail($id));

        $show->field('id', '自增ID');
        $show->field('category_id', '分类ID');
        $show->field('title','文章标题');
      
        $show->field('article_summary','文章摘要');
        $show->field('body', '文章内容');
        $show->field('created_at', '创建时间');
        $show->field('updated_at', '修改时间');
        $show->field('click', '点击数');
        $show->field('is_show', '是否展示');
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Topic);

        $form->number('category_id', '分类ID');
        $form->text('title', '标题');
        $form->textarea('article_summary', '文章摘要');
        $form->textarea('body', '文章内容');
        $form->number('click', '浏览次数');
		$form->radio('is_show', '文章状态')->options(['n' => '审核', 'y'=> '展示'])->default('n');

        return $form;
    }
}
