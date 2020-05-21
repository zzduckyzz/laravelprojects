@extends('backend.layouts.app')
@section('title-admin','Quyền')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh Sách Quyền
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('HomeIndex')}}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="#">Danh sách quyền</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Bộ Lọc Tìm Kiếm</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <form action="">
                        <div class="col-md-3">
                            <input type="text" value="{{ Request::get('name') }}" name="name" autocomplete="off" placeholder="Nhập tên tìm kiếm " class="form-control w-200">
                        </div>
                        <div class="col-md-3">
                            <select name="group_permission_id" id="group_permission_id"   class="form-control" style="width: 100%;" tabindex="-1">
                                <option value="">Nhóm quyền</option>
                                @foreach($groupPermission as $group )
                                    <option  @if(Request::get('group_permission_id') == $group->id ) selected ="selected" @endif value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success btn-search">
                            <i class="fa fa-save"></i> Tìm kiếm
                        </button>
                    </form>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer"></div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="btn-group mg-r-10 float-right">
                    <a href="{{route('createPermission')}}" class="btn btn-success btn-sm">
                        <i class="fa fa-save"></i> Thêm mới
                    </a>
                    <a href="{{route('ManageListPermission')}}" class="btn btn-sm btn-primary grid-refresh mg-l-5"><i class="fa fa-refresh"></i> Refresh</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered" id="checkAll">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="check-all"></th>
                            <th>Tên quyền</th>
                            <th>Tên hiển thị</th>
                            <th>Nhóm</th>
                            <th>Mô tả</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                            <tr class="row_{{$permission->id}}">
                                <td><input type="checkbox" name="id[]" value="{{$permission->id}}"></td>
                                <td><p class="text-space"><span class="content-space" title="{{$permission->name}}">{{$permission->name}}</span></p></td>
                                <td><p class="text-space"><span class="content-space" title="{{$permission->display_name}}">{{$permission->display_name}}</span></p></td>
                                <td><p class="text-space"><span class="content-space" title="{{$permission->groups->name}}">{{$permission->groups->name}}</span></p></td>
                                <td><p class="text-space-description"><span class="content-space" title="{{$permission->description}}"> {{$permission->description}}</p></td>
                                <td>
                                    <a href="{{route('editPermission', $permission->id)}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Cập nhật</a>
                                    <a href="{{route('deletePermission', $permission->id)}}"  class="btn btn-xs btn-danger option-delete-modal mg-l-5"><i class="fa fa-trash"></i> Xoá</a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6">
                                {!! renderPaginate($permissions, $query) !!}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <button type="button" class="btn btn-warning" id="deleteAll" link = "{{route('deleteMultiplePermission')}}"> <i class="fa fa-trash"></i> Delete All</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection