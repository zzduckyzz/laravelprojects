<div class="col-12 col-md-6 col-lg-4">
    <div class="section-heading">
        <h6>Bài viết mới</h6>
    </div>
@if(isset($dataNew))
    <!-- Single Featured Post -->
        @foreach($dataNew as $key => $word_new)
            <div class="single-blog-post small-featured-post d-flex">
                <div class="post-thumb">
                    <a href="{{route('detail.news',[safeTitle($word_new->title), $word_new->id])}}"><img src="{!! asset(replaceUrlImage($word_new->image_preview)) !!}" alt=""></a>
                </div>
                <div class="post-data">
                    <a href="{{route('detail.news',[safeTitle($word_new->title), $word_new->id])}}" class="post-catagory">{{$word_new->categories->name}}</a>
                    <div class="post-meta">
                        <a href="{{route('detail.news',[safeTitle($word_new->title), $word_new->id])}}" class="post-title">
                            <h6 class="title_new" title="{{$word_new->title}}">{{ theExcerpt($word_new->title, 70) }} @if(strlen($word_new->title)  > 70) ... @endif</h6>
                        </a>
                        <p class="post-date">{{ formatDate($word_new->created_at) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>