@extends('backend.layouts.app')
@section('title-admin','Bài Viết')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh Sách Bài viết
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('HomeIndex')}}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="#">Danh sách bài viết</a></li>
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
                            <input type="text" value="{{ Request::get('title') }}" name="title" autocomplete="off" placeholder="Nhập tiêu đề bài viết " class="form-control w-200">
                        </div>
                        <div class="col-md-3">
                            <select name="categori_id" id="categori_id"   class="form-control" style="width: 100%;" tabindex="-1">
                                <option  value="">Chọn danh mục</option>
                                @foreach($categories as $cate )
                                    <option  @if(Request::get('categori_id') == $cate->id ) selected ="selected" @endif value="{{$cate->id}}">{{$cate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="status" id="status"   class="form-control" style="width: 100%;" tabindex="-1">
                                <option  value="">Trạng thái</option>
                                <option @if(Request::get('status') == STATUS_ACTIVE ) selected ="selected" @endif value="{{STATUS_ACTIVE}}">Đã duyệt</option>
                                <option @if(Request::get('status') == STATUS_LOCKED ) selected ="selected" @endif value="{{STATUS_LOCKED}}">Chưa duyệt</option>
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
                    <a href="{{route('createNews')}}" class="btn btn-success btn-sm">
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
                        <th>Tiêu đề </th>
                        <th>Ảnh</th>
                        <th>Danh mục</th>
                        <th>Người đăng</th>
                        <th>Lượt xem</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    @php $checkRole = \Auth::user()->hasRole('Quản trị viên'); @endphp
                    @foreach($news as $new)
                        <tr class="row_{{$new->id}}">
                            <td><input type="checkbox" name="id[]" value="{{$new->id}}"></td>
                            <td><p class="text-space"><span class="content-space" data-toggle="tooltip" title="{{$new->title}}">{{$new->title}}</span></p></td>
                            <td><img src="{!! asset(replaceUrlImage($new->image_preview)) !!}" alt="" width="150" height="100"></td>
                            <td> @if($new->categories->name !=  null )<button type="button" class="btn btn-success btn-xs mg-t-5">{{$new->categories->name}}</button> @endif</td>
                            <td> @if($new->user->name !=  null )<button type="button" class="btn btn-success btn-xs mg-t-5">{{$new->user->name}}</button> @endif</td>
                            <td>{{$new->view}}</td>
                            <td>
                                @if($new->status == STATUS_ACTIVE)
                                    <button type="button" class="btn btn-success btn-xs mg-t-5 btn_update_status"
                                            status="{{STATUS_LOCKED}}"
                                            link="{{route('updateStatusNews')}}"
                                            id="{{$new->id}}"
                                            _token = "{{ csrf_token() }}"
                                            title="Kích để đổi trạng thái"
                                    >Đã duyệt</button>
                                @elseif ($new->status == STATUS_LOCKED)
                                    <button type="button" class="btn btn-warning btn-xs mg-t-5 btn_update_status"
                                            status="{{STATUS_ACTIVE}}"
                                            link="{{route('updateStatusNews')}}"
                                            id="{{$new->id}}"
                                            _token = "{{ csrf_token() }}"
                                            title="Kích để đổi trạng thái"
                                    >Chưa duyệt</button>
                                @endif
                            </td>

                            <td>
                                <a href="{{route('editNews', $new->id)}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Cập nhật</a>
                                @if($checkRole)
                                   <a href="{{route('deleteNews', $new->id)}}"  class="btn btn-xs btn-danger option-delete-modal mg-l-5"><i class="fa fa-trash"></i> Xoá</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <tbody>
                    <tr>
                        <td colspan="8">
                            {!! renderPaginate($news, $query) !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <button type="button" class="btn btn-warning" id="deleteAll" link = "{{route('deleteMultipleNews')}}"> <i class="fa fa-trash"></i> Delete All</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection