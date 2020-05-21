<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.templates.inc_head')
</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        @include('frontend.templates.inc_header')
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
        @include('frontend.templates.inc_news_hot')
    <!-- ##### Hero Area End ##### -->

    @yield('main-content')
    
    <!-- ##### Footer Add Area Start ##### -->
    <div class="footer-add-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-add">
                        <a href="#"><img src="{{ asset('frontend/img/bg-img/footer-add.gif')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Footer Add Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
     @include('frontend.templates.inc_footer')
</body>

</html>