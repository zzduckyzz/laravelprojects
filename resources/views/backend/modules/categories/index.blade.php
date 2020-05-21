@extends('backend.layouts.app')
@section('title-admin','Danh mục')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh Sách Danh Mục
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('HomeIndex')}}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="#">Danh sách danh mục</a></li>
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
                    <a href="{{route('createCategories')}}" class="btn btn-success btn-sm">
                        <i class="fa fa-save"></i> Thêm mới
                    </a>
                    <a href="{{route('ManageListCategories')}}" class="btn btn-sm btn-primary grid-refresh mg-l-5"><i class="fa fa-refresh"></i> Refresh</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered" id="checkAll">
                    <thead>
                    <tr>
                        <th><input type="checkbox" id="check-all"></th>
                        <th>Tên danh mục</th>
                        <th>Vị trí</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr class="row_{{$category->id}}">
                                <td><input type="checkbox" name="id[]" value="{{$category->id}}"></td>
                                <td><p class="text-space"><span class="content-space" title="{{$category->name}}">{{$category->name}}</span></p></td>
                                <td>{{ $category->position }}</td>
                                <td>
                                    @if($category->status == STATUS_ACTIVE)
                                        <button type="button" class="btn btn-success btn-xs mg-t-5 btn_update_status"
                                            status="{{STATUS_LOCKED}}"
                                            link="{{route('updateStatusCategories')}}"
                                            id="{{$category->id}}"
                                            _token = "{{ csrf_token() }}"
                                            title="Kích để đổi trạng thái"
                                        >{{trans('message_vn.show')}}</button>
                                    @elseif ($category->status == STATUS_LOCKED)
                                        <button type="button" class="btn btn-warning btn-xs mg-t-5 btn_update_status"
                                            status="{{STATUS_ACTIVE}}"
                                            link="{{route('updateStatusCategories')}}"
                                            id="{{$category->id}}"
                                            _token = "{{ csrf_token() }}"
                                            title="Kích để đổi trạng thái"
                                        >{{trans('message_vn.hidden')}}</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('editCategories', $category->id)}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Cập nhật</a>
                                    <a href="{{route('deleteCategories', $category->id)}}"  class="btn btn-xs btn-danger option-delete-modal mg-l-5"><i class="fa fa-trash"></i> Xoá</a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="8">

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <button type="button" class="btn btn-warning" id="deleteAll" link = "{{route('deleteMultipleCategories')}}"> <i class="fa fa-trash"></i> Delete All</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection