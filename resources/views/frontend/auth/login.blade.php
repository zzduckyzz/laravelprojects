@extends('frontend.layouts.app')
@section('main-content')
    <div class="contact-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-title">
                        <h2>Đăng nhập</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="contact-form-area">
                        <form action="{{route('postLogin')}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-12" style="height: 93px;">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                    <span class="errorsMessage" style="color: red">{{ $errors->first('email')  }}</span>
                                </div>
                                <div class="col-12">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu">
                                    <span class="errorsMessage" style="color: red">{{ $errors->first('password')  }}</span>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn newspaper-btn mt-30 w-100" type="submit">Đăng nhập</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @include('frontend.templates.inc_sidebar_right')
            </div>
        </div>
    </div>
@endsection