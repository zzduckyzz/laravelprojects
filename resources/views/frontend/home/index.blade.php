@extends('frontend.layouts.app')
@section('main-content')
    <!-- ##### Popular News Area Start ##### -->
    <div class="popular-news-area section-padding-80-50">
        <div class="container">
            <div class="row">
                <!-- Editors Pick -->
                <div class="col-12 col-md-7 col-lg-8">
                    @if(isset($dataShowHOme))
                        @foreach($dataShowHOme as $key => $news)
                            @if(!empty($news->news))
                                <div class="section-heading">
                                    <h6>{{$news->name}}</h6>
                                </div>

                                <div class="row">
                                    @foreach($news->news as $key => $new)
                                        <!-- Single Post -->
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
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
                @include('frontend.templates.inc_sidebar_right')
            </div>
        </div>
    </div>
    <!-- ##### Popular News Area End ##### -->
@endsection