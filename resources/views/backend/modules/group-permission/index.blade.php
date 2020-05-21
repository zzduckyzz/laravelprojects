@extends('backend.layouts.app')
@section('title-admin','Nhóm Quyền')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh Sách Nhóm Quyền
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('HomeIndex')}}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="#">Danh nhóm sách quyền</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">

        </div>
        <!-- /.box -->

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="btn-group mg-r-10 float-right">
                    <a href="{{route('createGroupPermission')}}" class="btn btn-success btn-sm">
                        <i class="fa fa-save"></i> Thêm mới
                    </a>
                    <a href="" class="btn btn-sm btn-primary grid-refresh mg-l-5"><i class="fa fa-refresh"></i> Refresh</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered" id="checkAll">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="check-all"></th>
                            <th>Tên nhóm quyền</th>
                            <th>Mô tả</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groupPermission as $group)
                            <tr class="row_{{$group->id}}">
                                <td><input type="checkbox" name="id[]" value="{{$group->id}}"></td>
                                <td><span title="{{$group->name}}">{{$group->name}}</span></td>
                                <td><span title="{{$group->description}}"> {{$group->description}}</td>
                                <td>
                                    <a href="{{route('editGroupPermission', $group->id)}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Cập nhật</a>
                                    <a href="{{route('deleteGroupPermission', $group->id)}}"  class="btn btn-xs btn-danger option-delete-modal mg-l-5"><i class="fa fa-trash"></i> Xoá</a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6">
                                {!! renderPaginate($groupPermission, $query) !!}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <button type="button" class="btn btn-warning" id="deleteAll" link = "{{route('deleteMultipleGroupPermission')}}"> <i class="fa fa-trash"></i> Delete All</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection