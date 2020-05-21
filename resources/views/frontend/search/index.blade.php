@extends('frontend.layouts.app')
@section('main-content')
    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="section-heading">
                        <h6>Tìm kiếm</h6>
                    </div>
                    <div class="blog-posts-area">
                        <!-- Single Featured Post -->
                        @if(isset($news))
                            @foreach($news as $key => $new)
                                <div class="col-12 col-lg-4">
                                    <div class="single-blog-post">
                                        <div class="post-thumb">
                                            <a href="{{route('detail.news',[safeTitle($new->title), $new->id])}}"><img src="{!! asset(replaceUrlImage($new->image_preview)) !!}" alt=""></a>
                                        </div>
                                        <div class="post-data">
                                            <a href="{{route('detail.news',[safeTitle($new->title), $new->id])}}" class="post-title">
                                                <h6 class="title_new" title="{{$new->title}}">{{ theExcerpt($new->title, 50) }} @if(strlen($new->title)  > 50) ... @endif</h6>
                                            </a>
                                            <p class="post-excerp meta_desc">{{ theExcerpt($new->meta_desc, 70) }} @if(strlen($new->meta_desc)  > 70) ... @endif</p>
                                            <div class="post-meta">
                                                <div class="post-date"><a href="{{route('detail.news',[safeTitle($new->title), $new->id])}}">{{ formatDate($new->created_at) }}</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @include('frontend.templates.inc_sidebar_right')
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->
@endsection