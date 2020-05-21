@extends('backend.layouts.app')
@section('title-admin','Chỉnh Sửa Quyền')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chỉnh Sửa Quyền
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('HomeIndex')}}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="#">Chỉnh Sửa Quyền</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="btn-group mg-r-10 float-right">
                    <a href="{{route('ManageListPermission')}}" class="btn btn-success btn-sm">
                        <i class="fa fa-fw fa-list"></i> Danh sách
                    </a>
                    <a href="" class="btn btn-sm btn-primary grid-refresh mg-l-5"><i class="fa fa-refresh"></i> Refresh</a>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="col-md-8 margin-auto-div">
                        <form class="form-horizontal" action="{{route('editPermission', $permission->id)}}" method="POST" enctype="multipart/form-data">
                            <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }} ">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Tên Quyền <sup class="title-sup">(*)</sup></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  placeholder="Tên quyền" name="name" value="{{ old('name', isset($permission->name)? $permission->name : NULL) }}">
                                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('name') }}</p></span>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->first('group_permission_id') ? 'has-error' : '' }} ">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Nhóm quyền <sup class="title-sup">(*)</sup></label>
                                <div class="col-sm-9">
                                    <select name="group_permission_id" id="group_permission_id"   class="form-control" style="width: 100%;" tabindex="-1">
                                        <option value=""></option>
                                        @foreach($groupPermission as $group )
                                            <option  @if($permission->group_permission_id == $group->id ) selected ="selected" @endif value="{{$group->id}}">{{$group->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('group_permission_id') }}</p></span>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->first('display_name') ? 'has-error' : '' }}">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Tên Hiển Thị</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  placeholder="Tên Hiển Thị" name="display_name" value="{{ old('display_name', isset($permission->display_name)? $permission->display_name : NULL) }}">
                                    <span class="text-danger"><p class="mg-t-5">{{ $errors->first('display_name') }}</p></span>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->first('description') ? 'has-error' : '' }}">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Mô Tả Chi Tiết</label>
                                <div class="col-sm-9">
                                    <textarea name="description" style="resize:vertical" class="form-control">{{ old('description', isset($permission->description)? $permission->description : NULL) }}</textarea>
                                    <span class="text-danger"><p class="mg-t-5">{{ $errors->first('description') }}</p></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label default"></label>
                                <div class="col-sm-9 text-center">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a href="{{route('ManageListPermission')}}" class="btn btn-danger with-btn mg-r-5"><i class="fa fa-fw fa-reply-all"></i>Quay lại</a>
                                    <button type="submit" class="btn btn-primary with-btn"><i class="fa fa-save"></i> Chỉnh sửa</button>
                                </div>
                            </div>

                        </form>
                    </div>
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