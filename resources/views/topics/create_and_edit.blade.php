@extends('layouts.app')

@section('content')

<div class="container">
	<div class="col-md-10 offset-md-1">
		<div class="card ">
			<div class="card-body">
				<h2 class="">
					<span class="glyphicon glyphicon-pencil"></span>
					@if($topic->id)
						编辑文章
					@else
						创建文章
					@endif
				</h2>
				<hr>
				@if($topic->id)
				<form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
					<input type="hidden" name="_method" value="PUT">
				@else
					<form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
				@endif
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					@include('shared._error')
					<div class="form-group">
						<input class="form-control" type="text" name="title" value="{{ old('title', $topic->title ) }}" placeholder="请填写标题" required />
					</div>

					<div class="form-group">
						
						<select class="form-control" name="category_id" required>
							<option value="" hidden disabled selected>请选择分类</option>
							@foreach ($categories as $value)
								@if($value->parent_id == 0)
									<option value="{{ $value->id }}">{{ $value->name }}</option>
									@if(count($value->list)>0)
										@foreach($value['list'] as $v)
											<option value="{{ $v->id }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $v->name }}</option>
										@endforeach
									@endif
								@endif
							@endforeach
							
						</select>
					</div>
					<div class="form-group">
						<textarea name="body" class="form-control" id="editor" rows="6" placeholder="请填入至少三个字符的内容。" required>{{ old('body', $topic->body ) }}</textarea>
					</div>

					<div class="w ll well-sm">
						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> 保存</button>
					</div>
				</form> 
			</div>
		</div>
    </div>
</div>

@endsection
@section('styles')
  <link rel="stylesheet" type="text/css" href="/default/editor/css/simditor.css?{{time()}}">
@stop
@section('scripts')
  <script type="text/javascript" src="/default/editor/js/module.js?{{time()}}"></script>
  <script type="text/javascript" src="/default/editor/js/hotkeys.js?{{time()}}"></script>
  <script type="text/javascript" src="/default/editor/js/uploader.js?{{time()}}"></script>
  <script type="text/javascript" src="/default/editor/js/simditor.js?{{time()}}"></script>

	<script>
	/**
	  *	pasteImage —— 设定是否支持图片黏贴上传，这里我们使用 true 进行开启；
	  *	url —— 处理上传图片的 URL；
	  *	params —— 表单提交的参数，Laravel 的 POST 请求必须带防止 CSRF 跨站请求伪造的 _token 参数；
	  *	fileKey —— 是服务器端获取图片的键值，我们设置为 upload_file;
	  *	connectionCount —— 最多只能同时上传 3 张图片；
	  *	leaveConfirm —— 上传过程中，用户关闭页面时的提醒。
	*/
    $(document).ready(function() {
		var editor = new Simditor({
        textarea: $('#editor'),
        upload: {
			url: '{{ route('topics.upload_image') }}',
			params: {
				_token: '{{ csrf_token() }}'
			},
			fileKey: 'upload_file',
			connectionCount: 3,
			leaveConfirm: '文件上传中，关闭此页面将取消上传。'
        },
        pasteImage: true,
      });
    });
	</script>
@stop