@extends('admin.masterAdmin')
@section('section_name')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Tin Tức</h1>
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
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Responsive Hover Table</h3>
  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Danh mục</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Gía mới</th>
                        <th>Gía gốc</th>
                        <th>Chi tiết</th>
                        <th>Hot</th>
                        <th>Views</th>
                        <th>Link sản phẩm</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    @foreach ( $listproduct as $item)
                    <tbody>
                        <tr>
                          <td>{{ $item->id}}</td>
                          <td>{{ $item->name}}</td>
                          <td>{{ $item->name_pr}}</td>
                          <td><img src="{{$item->img}}" style="width:150px;"alt=""></td>
                          <td>{{ $item->number}}</td>
                          <td>{{ $item->price}}</td>
                          <td>{{ $item->promotional_price}}</td>
                          <td>{{substr( $item->description,0,300)}}</td>
                          <td>{{ $item->hot}}</td>
                          <td>{{ $item->view}}</td>
                          <td><a href="">{{ $item->slug}}</a></td>
                          <td>
                            <a href="{{ route('products.edit', $item->id)}}"><button style="width: 100px" class="btn btn-primary">Sửa</button></a>
                            <form action="{{ route('products.destroy', $item->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button style="width: 100px" class="btn btn-primary" onclick="return confirm('Bạn có chắc muốn xóa không')">Xóa</button>
                            </form>
                          </td>
                        </tr>  
                    </tbody>
                    @endforeach
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $listproduct->links() }}
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection