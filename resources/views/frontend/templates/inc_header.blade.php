 <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="top-header-content d-flex align-items-center justify-content-between">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="/"><img src="{{ asset('frontend/img/core-img/logo.png')}}" alt=""></a>
                        </div>

                        <!-- Login Search Area -->
                        <div class="login-search-area d-flex align-items-center">
                            <!-- Login -->
                            <div class="login d-flex">
                                @if(isset(Auth::user()->name))
                                     <a href="#">Xin chào: {{ Auth::user()->name }}</a>
                                    <a href="{{route('user.logout')}}">Đăng xuất</a>
                                @else
                                    <a href="{{route('login')}}">Login</a>
                                    <a href="{{route('register')}}">Register</a>
                                @endif
                            </div>
                            <!-- Search Form -->
                            <div class="search-form">
                                <form action="{{route('search')}}" method="get">
                                    <input type="search" name="search" class="form-control" placeholder="Search" value="{{old('search', isset($keys) ? $keys : '')}}">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar Area -->
    <div class="newspaper-main-menu" id="stickyMenu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="newspaperNav">

                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="{{ asset('frontend/img/core-img/logo.png')}}" alt=""></a>
                    </div>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li class="{{ !isset($slug)  ? 'active' : ''}}"><a href="/">Trang chủ</a></li>
                                @if(isset($categorys))
                                    @foreach($categorys as $key => $cate)
                                    <li class="{{ isset($slug) && $slug == safeTitle($cate->name) ? 'active' : '' }}"><a href="{{route('new.category',[safeTitle($cate->name), $cate->id])}}">{{$cate->name}}</a></li>
                                    @endforeach
                                @endif

                                <li class="{{ isset($activeNew) ? $activeNew : ''}}">
                                    <a href="{{route('ManageListNews')}}">
                                        <i class="fa fa-fw fa-file-word-o"></i>
                                            <span>Bài viết</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>