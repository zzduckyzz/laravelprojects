@extends('frontend.layouts.app')
@section('main-content')
    <div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">

                        <!-- Single Featured Post -->
                        <div class="single-blog-post featured-post single-post">
                            <div class="post-thumb">
                                <a href="#"><img src="{!! asset(replaceUrlImage($new->image_banner)) !!}" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="{{route('new.category',[safeTitle($new->categories->name), $new->categories->id])}}" class="post-catagory">{{$new->categories->name}}</a>
                                <a href="#" class="post-title">
                                    <h6>{{$new->title}}</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">{{$new->user->name}}</a></p>
                                    <div class="contents">{!! $new->content!!}</div>
                                </div>
                            </div>
                        </div>
                       

                        <div class="section-heading">
                            <h6>Bài viết liên quan</h6>
                        </div>

                        <div class="row">
                            <!-- Single Post -->
                            @if(isset($news))
                                @foreach($news as $key => $new)
                                    <div class="col-12 col-md-4">
                                        <div class="single-blog-post style-3 mb-80">
                                            <div class="post-thumb">
                                                <a href="{{route('detail.news',[safeTitle($new->title), $new->id])}}"><img src="{!! asset(replaceUrlImage($new->image_preview)) !!}" alt=""></a>
                                            </div>
                                            <div class="post-data">
                                                <a href="{{route('new.category',[safeTitle($new->categories->name), $new->categories->id])}}" class="post-catagory">{{$new->categories->name}}</a>
                                                <a href="{{route('detail.news',[safeTitle($new->title), $new->id])}}" class="post-title">
                                                    <h6>{{ theExcerpt($new->title, 50) }} @if(strlen($new->title)  > 50) ... @endif</h6>
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
                </div>
                @include('frontend.templates.inc_sidebar_right')
            </div>
        </div>
    </div>
@endsection