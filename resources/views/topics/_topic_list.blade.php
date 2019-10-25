@if (count($topics))
<ul class="media-list">
     @foreach ($topics as $topic)
    <li class="ant-list-item">
        <div class="ant-list-item-main">
            <div class="ant-list-item-meta">
                <div class="ant-list-item-meta-content">
                    <h4 class="ant-list-item-meta-title">
                        <a class="antd-pro-pages-articles-list-style-listItemMetaTitle" href="/articles/32/show" style="text-decoration: none;"> {{ $topic->title }}
                        </a>
                    </h4>
                    <div class="ant-list-item-meta-description">
                        <span class="ant-tag" style="padding-right: 10px;">WebSocket</span>
                        <span class="glyphicon glyphicon-folder-open" aria-hidden="true">&nbsp;{{ $topic->category->name }}</span>
                    </div>
                </div>
            </div>
            <div class="antd-pro-pages-articles-list-components-article-list-content-index-listContent">
                <div class="antd-pro-pages-articles-list-components-article-list-content-index-description">
                    <div id="antd-pro-ellipsis-157181647212663" class="antd-pro-components-ellipsis-index-ellipsis antd-pro-components-ellipsis-index-lineClamp">
                        对于很多后台管理系统来说，权限较多，对系统操作的人也会多。如此以来，对于一些操作的记录就非常有必要了，从而可以清楚的追踪对系统进行操作的人以及做了哪些操作，并且可以快速排查定位一些问题对于很多后台管理系统来说，权限较多，对系统操作的人也会多。如此以来，对于一些操作的记录就非常有必要了，从而可以清楚的追踪对系统进行操作的人以及做了哪些操作，并且可以快速排查定位一些问题
                    </div>
                </div>
            </div>
        </div>
        <span class="glyphicon glyphicon-time" aria-hidden="true" style="padding-top:10px;"></span>
        <span class="timeago" title="发表时间" >{{ $topic->updated_at->diffForHumans() }}</span>
        <span class="glyphicon glyphicon-eye-open" aria-hidden="true" style="padding-top:10px;padding-left: 10px"></span>
        <span class="timeago" title="查看数量">245</span>

    </li>
    @if ( ! $loop->last)
    <hr>
    @endif

    @endforeach
@else
    <div class="empty-block">暂无数据 ~_~ </div>
@endif
</ul>