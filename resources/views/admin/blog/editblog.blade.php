@extends('admin.masterAdmin')
@section('section_name')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Thêm danh mục tin tức</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tin Tức</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('section_main')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Quick Example</h3>
                    </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('blogposts.update', $editblog->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" value="{{$editblog->title}}" placeholder="Tiêu đề">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục</label>
                        <select class="form-control" name="id_blog">
                            @foreach ( $cateblog as $cate)
                                @if($cate->id == $editblog->id_blog)
                                    <option selected value="{{$cate->id}}">{{$cate->name}}</option>
                                @else
                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                @endif
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tóm tắt</label>
                        <textarea cols="10" rows="5" class="form-control" name="summary" placeholder="Tóm tắt">{{$editblog->summary}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Nội dung</label>
                        <textarea class="form-control" name="content" id="editor1" rows="10" cols="10">{{$editblog->content}}</textarea>
                        <script>
                            CKEDITOR.replace( 'editor1' );
                        </script>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Hình ảnh</label>
                        <div class="input-group">
                          <div class="input-group mb-3">
                            <input type="file" class="form-control" name="file_upload" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                          </div>
                          <img src="{{$editblog->img}}" style="width: 100px;padding-bottom: 20px" alt="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Lượt xem</label>
                        <input type="number" class="form-control" value="{{$editblog->views}}" name="views">
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Gửi đi</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection