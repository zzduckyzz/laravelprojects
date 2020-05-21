@extends('backend.layouts.app')
@section('title-admin','Danh sách người dùng')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh Sách Người Dùng
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('HomeIndex')}}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="#">Danh sách người dùng </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
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
                            <input type="text" value="{{ Request::get('email') }}" name="email" autocomplete="off" placeholder="Nhập email tìm kiếm " class="form-control w-200">
                        </div>
                        <div class="col-md-2">
                            <select name="status" id="status"   class="form-control" style="width: 100%;" tabindex="-1">
                                <option  value="">Trạng thái</option>
                                <option @if(Request::get('status') == STATUS_ACTIVE ) selected ="selected" @endif value="{{STATUS_ACTIVE}}">Đang hoạt động</option>
                                <option @if(Request::get('status') == STATUS_LOCKED ) selected ="selected" @endif value="{{STATUS_LOCKED}}">Khóa</option>
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
            <div class="box-body">
                <table class="table table-bordered" id="checkAll">
                    <thead>
                    <tr>
                        <th><input type="checkbox" id="check-all"></th>
                        <th>Tên người dùng</th>
                        <th>Email</th>
                        <th>Vai Trò</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="row_{{$user->id}}">
                                <td><input type="checkbox" name="id[]" value="{{$user->id}}"></td>
                                <td><p class="text-space"><span class="content-space" title="{{$user->name}}">{{$user->name}}</span></p></td>
                                <td><p class="text-space"><span class="content-space" title="{{$user->email}}">{{$user->email}}</span></p></td>
                                <td style="max-width: 300px">

                                    @if($user->userRole->isNotEmpty())
                                        @foreach($user->userRole as $role)
                                            <button type="button" class="btn btn-success btn-xs mg-t-5">{{$role->name}}</button>
                                        @endforeach
                                    @else
                                        <button type="button" class="btn btn-success btn-xs mg-t-5">Member</button>
                                    @endif

                                </td>
                                <td>
                                    @if($user->status == STATUS_ACTIVE)
                                        <button type="button" class="btn btn-success btn-xs mg-t-5 btn_update_status"
                                                status="{{STATUS_LOCKED}}"
                                                link="{{route('updateStatusUser')}}"
                                                id="{{$user->id}}"
                                                _token = "{{ csrf_token() }}"
                                                title="Kích để đổi trạng thái">Đang hoạt động</button>
                                    @elseif ($user->status == STATUS_LOCKED)
                                        <button type="button" class="btn btn-warning btn-xs mg-t-5 btn_update_status"
                                                status="{{STATUS_ACTIVE}}"
                                                link="{{route('updateStatusUser')}}"
                                                id="{{$user->id}}"
                                                _token = "{{ csrf_token() }}"
                                                title="Kích để đổi trạng thái">Khóa</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('editUser', $user->id)}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Cập nhật</a>
                                    <a href="{{route('deleteUser', $user->id)}}"  class="btn btn-xs btn-danger option-delete-modal mg-l-5"><i class="fa fa-trash"></i> Xoá</a>
                                </td>
                            </tr>
                        @endforeach
                    <tr>
                        <td colspan="6">
                            {!! renderPaginate($users, $query) !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <button type="button" class="btn btn-warning" id="deleteAll" link = "{{route('deleteMultipleUser')}}"> <i class="fa fa-trash"></i> Delete All</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection