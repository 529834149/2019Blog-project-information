<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use App\Models\Category;
use App\Models\Links;
class TopicsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    public function all(Topic $topic,Request $request)
	{
		
	 	$topics = $topic->withOrder($request->order)->paginate(20);
        return view('topics.index', compact('topics'));
	}
	public function index(Topic $topic,Request $request)
	{
		

	 	$topics = $topic->withOrder($request->order)->paginate(20);
        return view('topics.index', compact('topics'));
	}

    public function show(Topic $topic,Request $request)
    {
		
		
		$links = Links::where('type',1)->get();
		$links2 = Links::where('type',2)->get();
        return view('topics.show', compact('topic','links','links2'));
    }

	public function create(Topic $topic)
	{
		return view('topics.create_and_edit', compact('topic'));
	}

	public function store(TopicRequest $request)
	{
		$topic = Topic::create($request->all());
		return redirect()->route('topics.show', $topic->id)->with('message', 'Created successfully.');
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
}