<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use App\Models\Category;
use App\Models\Links;
use App\Handlers\ImageUploadHandler;
use Illuminate\Support\Str;
class TopicsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    public function all(Category $category,Topic $topic,Request $request)
	{
	 	// $topics = $topic->where('is_show','y')->withOrder($request->order)->paginate(20);
		$topics = $topic->where('is_show','y')->withOrder($request->order)->paginate(20);
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
	public function index(Category $category,Topic $topic,Request $request)
	{
	 	// $topics = $topic->where('is_show','y')->withOrder($request->order)->paginate(20);
		$topics = $topic->->where('is_show','y')->withOrder($request->order)->paginate(20);
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

    public function show(Topic $topic,Request $request)
    {
		
        return view('topics.show', compact('topic'));
    }

	public function create(Topic $topic)
	{
		
		$categories= $this->tree();
		
        return view('topics.create_and_edit', compact('topic', 'categories'));
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
	public function store(TopicRequest $request, Topic $topic)
	{
		$topic->fill($request->all());
		$topic->is_show = 'n';
        $topic->save();

        return redirect()->route('topics.show', $topic->id)->with('success', '文章审核中！1~2个工作日审核完毕');
	}

	public function edit(Topic $topic)
	{
        $this->authorize('update', $topic);
		return view('topics.create_and_edit', compact('topic'));
	}

	public function update(TopicRequest $request, Topic $topic)
	{
		$this->authorize('update', $topic);
		$topic->update($request->all());

		return redirect()->route('topics.show', $topic->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Topic $topic)
	{
		$this->authorize('destroy', $topic);
		$topic->delete();

		return redirect()->route('topics.index')->with('message', 'Deleted successfully.');
	}
	public function likes(Topic $topic,$id){
		$increments = \DB::table('topics')->where('id',intval($id))->increment('click');
		$topics = Topic::where('id',intval($id))->first();
		$param = array(
			'aid'=>intval($id),
			'click_num' =>intval($topics['click']),
		);
		if($increments){
			return $this->returnCode(200,'成功',$param);
		}
	}
	public function getSearch(Request $request)
	{
		return view('seatch.create_and_edit', compact('topic'));
	}
	public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($file, 'topics', 1, 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;
    }
}