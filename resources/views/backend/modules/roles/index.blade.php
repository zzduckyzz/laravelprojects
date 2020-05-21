@extends('backend.layouts.app')
@section('title-admin','Vai Trò Quản Trị Website')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh Sách Vai Trò Quản Trị Website
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('HomeIndex')}}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="#">Danh sách vai trò </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box"></div>
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="btn-group mg-r-10 float-right">
                    <a href="{{route('createRole')}}" class="btn btn-success btn-sm">
                        <i class="fa fa-save"></i> Thêm mới
                    </a>
                    <a href="{{route('ManageListRole')}}" class="btn btn-sm btn-primary grid-refresh mg-l-5"><i class="fa fa-refresh"></i> Refresh</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered" id="checkAll">
                    <thead>
                    <tr>
                        <th><input type="checkbox" id="check-all"></th>
                        <th>Tên vai trò</th>
                        <th>Danh sách quyền</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr class="row_{{$role->id}}">
                                <td><input type="checkbox" name="id[]" value="{{$role->id}}"></td>
                                <td><p class="text-space"><span class="content-space" title="{{$role->name}}">{{$role->name}}</span></p></td>
                                <td style="max-width: 300px">
                                    @foreach($role->permissionRole as $permission)
                                        <button type="button" class="btn btn-success btn-xs mg-t-5">{{$permission->name}}</button>
                                    @endforeach

                                </td>
                                <td><p class="text-space-description"><span class="content-space" title="{{$role->description}}"> {{$role->description}}</p></td>
                                <td>
                                    <a href="{{route('editRole', $role->id)}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Cập nhật</a>
                                    <a href="{{route('deleteRole', $role->id)}}"  class="btn btn-xs btn-danger option-delete-modal mg-l-5"><i class="fa fa-trash"></i> Xoá</a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6">
                                {!! renderPaginate($roles, $query) !!}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <button type="button" class="btn btn-warning" id="deleteAll" link = "{{route('deleteMultipleRoles')}}"> <i class="fa fa-trash"></i> Delete All</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection