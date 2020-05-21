@extends('backend.layouts.app')
@section('title-admin','Thêm Mới Bài Viết')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm Mới Bài Viết
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('HomeIndex')}}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="#">Thêm mới bài viết</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="btn-group mg-r-10 float-right">
                    <a href="{{route('ManageListNews')}}" class="btn btn-success btn-sm">
                        <i class="fa fa-fw fa-list"></i> Danh sách
                    </a>
                    <a href="" class="btn btn-sm btn-primary grid-refresh mg-l-5"><i class="fa fa-refresh"></i> Refresh</a>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12 mg-t-10">
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group input-file" name="images">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default btn-choose" type="button">Choose</button>
                                    </span>
                                    <input type="text" class="form-control"   placeholder='Choose a file...' style="width: 80%;" />
                                    <span class="input-group-btn">
                                        {{--<button class="btn btn-warning btn-reset" type="button">Reset</button>--}}
                                    </span>
                                </div>
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('images') }}</p></span>
                                <img src="" alt="" class="margin-auto-div img-rounded"  id="image_render" style="width: 84%; height: 260px; float: left;">
                            </div>

                        </div>
                        <div class="col-md-8">
                            <div class="form-group {{ $errors->first('title') ? 'has-error' : '' }} ">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Tiêu đề <sup class="title-sup">(*)</sup></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  placeholder="Tiêu đề " name="title" value="{{old('title')}}">
                                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('title') }}</p></span>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->first('categori_id') ? 'has-error' : '' }} ">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Danh mục <sup class="title-sup">(*)</sup></label>
                                <div class="col-sm-9">
                                    <select name="categori_id" id="categori_id"   class="form-control" style="width: 100%;" tabindex="-1">
                                        <option value=""></option>
                                        @foreach($categories as $cate )
                                            <option  @if(old('categori_id') == $cate->id ) selected ="selected" @endif value="{{$cate->id}}">{{$cate->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('categori_id') }}</p></span>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->first('meta_key') ? 'has-error' : '' }}">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Key Word</label>
                                <div class="col-sm-9">
                                    <textarea name="meta_key" style="resize:vertical" class="form-control" id="meta_key">{{ old('meta_key') }}</textarea>
                                    <span class="text-danger"><p class="mg-t-5">{{ $errors->first('meta_key') }}</p></span>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->first('meta_desc') ? 'has-error' : '' }}">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Mô tả</label>
                                <div class="col-sm-9">
                                    <textarea name="meta_desc" style="resize:vertical" class="form-control" id="meta_desc">{{ old('meta_desc') }}</textarea>
                                    <span class="text-danger"><p class="mg-t-5">{{ $errors->first('meta_desc') }}</p></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label default">Tin nóng</label>
                                <div class="col-sm-9">
                                    <input type="checkbox" id="hot" name="hot" value="1"> <label for="hot" class="permission-name">Hot</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group {{ $errors->first('content') ? 'has-error' : '' }}">
                                <label for="inputEmail3" class="col-sm-12 control-label mg-t-20 mg-b-20">Nội dung bài viết</label>
                                <div class="col-sm-12">
                                    <textarea name="content" style="resize:vertical" class="form-control" id="content">{{ old('content') }}</textarea>
                                    <span class="text-danger"><p class="mg-t-5">{{ $errors->first('content') }}</p></span>
                                    <script>
                                        ckeditor(content);
                                    </script>
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