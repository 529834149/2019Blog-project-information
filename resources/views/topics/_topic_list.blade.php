@if (count($topics))
<ul class="media-list">
     @foreach ($topics as $topic)
    <li class="ant-list-item">
        <div class="ant-list-item-main">
            <div class="ant-list-item-meta">
                <div class="ant-list-item-meta-content">
                    <h4 class="ant-list-item-meta-title">
                        <a class="antd-pro-pages-articles-list-style-listItemMetaTitle" href="{{ route('topics.show', [$topic->id]) }}" style="text-decoration: none;"> {{ $topic->title }}
                        </a>
                    </h4>
                    <div class="ant-list-item-meta-description">
                        <span class="ant-tag" style="padding-right: 10px;">原创</span>
                        <a href="{{ route('categories.show', $topic->category->id) }}" title="{{ $topic->category->name }}">
                            <span class="glyphicon glyphicon-folder-open  alert-info" aria-hidden="true" role="alert">&nbsp;{{ $topic->category->name }}</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="antd-pro-pages-articles-list-components-article-list-content-index-listContent">
                <div class="antd-pro-pages-articles-list-components-article-list-content-index-description">
                    <div id="antd-pro-ellipsis-157181647212663" class="antd-pro-components-ellipsis-index-ellipsis antd-pro-components-ellipsis-index-lineClamp">
					{{$topic->article_summary}}
                    </div>
                </div>
            </div>
        </div>
        <span class="glyphicon glyphicon-time" aria-hidden="true" style="padding-top:10px;"></span>
        <span class="timeago" title="发表时间" >{{ $topic->updated_at->diffForHumans() }}</span>
        <span class="glyphicon glyphicon-heart" aria-hidden="true" style="padding-top:10px;padding-left: 10px"></span>
        <span class="timeago" title="查看数量" id="click-{{$topic->id}}">{{ $topic->click }}</span>
    </li>
    @if ( ! $loop->last)
    <hr>
    @endif
    @endforeach
@else
	
	@include('shared._nodata', ['topics' => $topics])
    <!--<div class="empty-block">暂无数据 ~_~ </div>-->
@endif
</ul>