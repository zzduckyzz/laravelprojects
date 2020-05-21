@extends('backend.layouts.app')
@section('title-admin','Thêm Mới Danh Mục')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm Mới Danh Mục
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('HomeIndex')}}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="#">Thêm mới danh mục</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="btn-group mg-r-10 float-right">
                    <a href="{{route('ManageListCategories')}}" class="btn btn-success btn-sm">
                        <i class="fa fa-fw fa-list"></i> Danh sách
                    </a>
                    <a href="" class="btn btn-sm btn-primary grid-refresh mg-l-5"><i class="fa fa-refresh"></i> Refresh</a>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12 mg-t-10">
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }} ">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Tên danh mục<sup class="title-sup">(*)</sup></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  placeholder="Tên danh mục" name="name" value="{{old('name')}}">
                                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('name') }}</p></span>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->first('position') ? 'has-error' : '' }} ">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Vị trí hiển thị</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control"  placeholder="Vị trí hiển thị (1, 2, 3, ...)" name="position" min="0" value="{{old('position')}}">
                                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('position') }}</p></span>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->first('status') ? 'has-error' : '' }} ">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Trạng thái</label>
                                <div class="col-sm-9">
                                    <select name="status" id="status"   class="form-control" style="width: 100%;" tabindex="-1">
                                        <option value="{{STATUS_ACTIVE}}"
                                        {{ old('status') ==  STATUS_ACTIVE ? 'selected ="selected"' : '' }}
                                        >{{trans('message_vn.show')}}</option>
                                        <option value="{{STATUS_LOCKED}}"
                                        {{ old('status') ==  STATUS_LOCKED ? 'selected ="selected"' : '' }}
                                        >{{trans('message_vn.hidden')}}</option>
                                    </select>
                                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('status') }}</p></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a href=""  class="btn btn-danger with-btn mg-r-5"><i class="fa fa-fw fa-reply-all"></i> Quay lại</a>
                                    <button type="submit" class="btn btn-primary with-btn"><i class="fa fa-save"></i> Thêm mới </button>
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