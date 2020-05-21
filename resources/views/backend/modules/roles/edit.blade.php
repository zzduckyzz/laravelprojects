@extends('backend.layouts.app')
@section('title-admin','Chỉnh Sửa Vai Trò')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chỉnh Sửa Vai Trò
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('HomeIndex')}}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="#">Chỉnh sửa vai trò</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="btn-group mg-r-10 float-right">
                    <a href="{{route('ManageListRole')}}" class="btn btn-success btn-sm">
                        <i class="fa fa-fw fa-list"></i> Danh sách
                    </a>
                    <a href="" class="btn btn-sm btn-primary grid-refresh mg-l-5"><i class="fa fa-refresh"></i> Refresh</a>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12 mg-t-10">
                    <form class="form-horizontal" action="{{route('editRole', $role->id)}}" method="POST" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }} ">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Tên vai trò <sup class="title-sup">(*)</sup></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  placeholder="Tên vai trò" name="name" value="{{ old('name', isset($role->name)? $role->name : NULL) }}">
                                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('name') }}</p></span>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->first('description') ? 'has-error' : '' }}">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Mô tả chi tiết</label>
                                <div class="col-sm-9">
                                    <textarea name="description" style="resize:vertical" class="form-control">{{ old('description', isset($role->description)? $role->description : NULL) }}</textarea>
                                    <span class="text-danger"><p class="mg-t-5">{{ $errors->first('description') }}</p></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12 mg-b-20 ">
                                    <div class="col-md-9 ">
                                        <input type="checkbox" id="checkAll" name="checkAll" {{old('checkAll') ? 'checked' : ''}}  class="checkbox-toggle permission-checkbox"> <label for="checkAll" class="permission-name"><b>All Permission</b></label>
                                    </div>
                                </div>
                                <div class="col-sm-12 permission default mailbox-messages">
                                    @foreach($dataPermissions as $groupPer)
                                        <div class="col-md-12 mg-b-20">
                                            <label for=""><i class="fa fa-fw fa-key"></i>{{$groupPer->name}}</label> <br>
                                            @foreach($groupPer->permissions as $key => $item)
                                                <div class="col-md-4 mg-t-5">
                                                    <input type="checkbox" name="permission[]" id="{{$item->name}}" class="permission-checkbox" value="{{$item->id}}" {{ in_array($item->id, $listPermission) ? 'checked' : '' }}>
                                                    <label for="{{$item->name}}" class="permission-name">{{$item->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a href="{{route('ManageListRole')}}" class="btn btn-danger with-btn mg-r-5"><i class="fa fa-fw fa-reply-all"></i> Quay lại</a>
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