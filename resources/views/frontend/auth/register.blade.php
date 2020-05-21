@extends('frontend.layouts.app')
@section('main-content')
    <div class="contact-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-title">
                        <h2>Đăng ký tài khoản</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="contact-form-area">
                        <form action="{{route('postRegister')}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-12 col-lg-6" style="height: 93px;">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Họ và tên" value="{{old('name')}}">
                                    <span class="errorsMessage" style="color: red">{{ $errors->first('email')  }}</span>
                                </div>
                                <div class="col-12 col-lg-6" style="height: 93px;">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" value="{{old('email')}}">
                                    <span class="errorsMessage" style="color: red">{{ $errors->first('email')  }}</span>
                                </div>
                                <div class="col-12 col-lg-6" style="height: 93px;">
                                    <input type="password" class="form-control" name="password" >
                                    <span class="errorsMessage" style="color: red">{{ $errors->first('password')  }}</span>
                                </div>
                                <div class="col-12 col-lg-6" style="height: 93px;">
                                    <input type="password" class="form-control" name="rpassword" >
                                    <span class="errorsMessage" style="color: red">{{ $errors->first('rpassword')  }}</span>
                                </div>
                                <div class="col-12" style="height: 93px;">
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="2">Nam</option>
                                        <option value="1">Nữ</option>
                                    </select>
                                </div>
                                <div class="col-12" style="height: 93px;">
                                    <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{old('phone')}}">
                                </div>
                                <div class="col-12" style="height: 93px;">
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Địa chỉ" value="{{old('address')}}">
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn newspaper-btn mt-30 w-100" type="submit">Đăng ký</button>
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