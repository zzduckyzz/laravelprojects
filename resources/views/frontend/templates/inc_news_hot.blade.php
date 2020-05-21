<div class="hero-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-8">
                <!-- Breaking News Widget -->

                <div class="breaking-news-area d-flex align-items-center">
                    <div class="news-title">
                        <p>Tin nóng</p>
                    </div>
                    <div id="breakingNewsTicker" class="ticker">
                        <ul>
                            @if(isset($dataNewView['newHot']))
                                @foreach($dataNewView['newHot'] as $key => $newHot)
                                    <li><a href="{{route('detail.news',[safeTitle($newHot->title), $newHot->id])}}">{{ $newHot->title }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>

                <!-- Breaking News Widget -->
                <div class="breaking-news-area d-flex align-items-center mt-15">
                    <div class="news-title title2">
                        <p>Tin xem nhiều</p>
                    </div>
                    <div id="internationalTicker" class="ticker">
                        <ul>
                            @if(isset($dataNewView['newNews']))
                                @foreach($dataNewView['newNews'] as $key => $newHot)
                                    <li><a href="{{route('detail.news',[safeTitle($newHot->title), $newHot->id])}}">{{ $newHot->title }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Hero Add -->
            <div class="col-12 col-lg-4">
                <div class="hero-add">
                    <a href="#"><img src="{{ asset('frontend/img/bg-img/hero-add.gif')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>