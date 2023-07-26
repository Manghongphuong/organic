@extends('admin.masterAdmin')
@section('section_name')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Add product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Sản phẩm</li>
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
                <form action="{{ route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục</label>
                        <select class="form-control" name="id_catepro">
                            <option selected>Chọn danh mục</option>
                            @foreach ( $catepr as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name_pr" placeholder="Tên sản phẩm">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Hình ảnh</label>
                        <div class="input-group">
                          <div class="input-group mb-3">
                            <input type="file" class="form-control" name="file_upload" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Số lượng</label>
                        <input type="number" class="form-control" name="number" placeholder="Số lượng">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Gía cả</label>
                        <input type="text" class="form-control" name="price" placeholder="Gía">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Gía gốc</label>
                        <input type="text" class="form-control" name="promotional_price" placeholder="Gía gốc">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Chi tiết</label>
                        <textarea class="form-control" name="description" id="editor1" rows="10" cols="10"></textarea>
                        <script>
                          CKEDITOR.replace( 'editor1', {
                            fullPage: false,
                            entities: false,
                            basicEntities: true,
                            autoParagraph: false
                          });
                      </script>
                        
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Sản phẩm hot</label>
                        <input type="number" class="form-control" name="hot">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Sản phẩm views</label>
                        <input type="number" class="form-control" name="views">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Link sản phẩm</label>
                        <input type="text" class="form-control" name="slug">
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