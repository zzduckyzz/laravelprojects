@extends('backend.layouts.app')
@section('title-admin','Chỉnh Sửa Người Dùng')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chỉnh Sửa Người Dùng
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('HomeIndex')}}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="#">Chỉnh sửa người dùng</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="btn-group mg-r-10 float-right">
                    <a href="{{route('ManageListUser')}}" class="btn btn-success btn-sm">
                        <i class="fa fa-fw fa-list"></i> Danh sách
                    </a>
                    <a href="" class="btn btn-sm btn-primary grid-refresh mg-l-5"><i class="fa fa-refresh"></i> Refresh</a>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12 mg-t-12">
                    <form class="form-horizontal" action="{{route('editUser', $user->id)}}" method="POST" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }} ">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Họ và tên<sup class="title-sup">(*)</sup></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  placeholder="Họ và tên" name="name" value="{{ old('name', isset($user->name)) ? $user->name : NULL }}">
                                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('name') }}</p></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control"  value="{{ $user->email }}" disabled>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->first('phone') ? 'has-error' : '' }}">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Phone</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control"   name="phone" value="{{ old('phone', isset($user->phone) ? $user->phone : NULL) }}">
                                    <span class="text-danger"><p class="mg-t-5">{{ $errors->first('phone') }}</p></span>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->first('address') ? 'has-error' : '' }}">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"   name="address" value="{{ old('address', isset($user->address) ? $user->address : NULL) }}">
                                    <span class="text-danger"><p class="mg-t-5">{{ $errors->first('address') }}</p></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Giới tính</label>
                                <div class="col-sm-9 default">
                                    <div class="col-sm-6">
                                        <input type="radio" id="Nam" {{$user->gender == FEMALE ? 'checked' : ''}}  name="gender" value="{{FEMALE}}" class="permission-checkbox">
                                        <label for="Nam" class="permission-name">Nam</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" id="Nữ" {{$user->gender == MALE ? 'checked' : ''}}  name="gender" value="{{MALE}}" class="permission-checkbox">
                                        <label for="Nữ" class="permission-name">Nữ</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Chọn quyền</label>
                                <div class="col-sm-9 default">
                                    @foreach($roles as $key => $item)
                                        <div class="col-md-6 mg-t-5">
                                            <input type="checkbox" name="roles[]" id="{{$item->name}}" class="permission-checkbox" value="{{$item->id}}" {{ in_array($item->id, $listRole) ? 'checked' : '' }}>
                                            <label for="{{$item->name}}" class="permission-name">{{$item->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a href="{{route('ManageListUser')}}"  class="btn btn-danger with-btn mg-r-5"><i class="fa fa-fw fa-reply-all"></i> Quay lại</a>
                                    <button type="submit" class="btn btn-primary with-btn"><i class="fa fa-save"></i> Chỉnh sửa</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection