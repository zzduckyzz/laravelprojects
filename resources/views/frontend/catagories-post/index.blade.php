@extends('frontend.layouts.app')
@section('main-content')
    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">
                        <!-- Single Featured Post -->
                        @if(isset($news))
                            @foreach($news as $key => $new)
                            <div class="single-blog-post featured-post mb-30">
                                <div class="post-thumb">
                                    <a href="{{route('detail.news',[safeTitle($new->title), $new->id])}}"><img src="{!! asset(replaceUrlImage($new->image_banner)) !!}" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="{{route('new.category',[safeTitle($new->categories->name), $new->categories->id])}}" class="post-catagory">{{$new->categories->name}}</a>
                                    <a href="{{route('detail.news',[safeTitle($new->title), $new->id])}}" class="post-title">
                                        <h6>{{$new->title}}</h6>
                                    </a>
                                    <div class="post-meta">
                                        <p class="post-excerp">{{$new->meta_desc}}</p>
                                        <!-- Post Like & Post Comment -->
                                    </div>
                                    <div class="post-meta">
                                        <div class="post-date"><a href="{{route('detail.news',[safeTitle($new->title), $new->id])}}">{{ formatDate($new->created_at) }}</a></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <div style="float: left">
                        {!! paginatePage($news, $query = '') !!}
                    </div>

                </div>
                @include('frontend.templates.inc_sidebar_right')
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->
@endsection