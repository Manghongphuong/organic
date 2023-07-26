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
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Danh mục</th>
                        <th>Hình ảnh</th>
                        <th>Tóm tắt</th>
                        <th>Nội dung</th>
                        <th>Views</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    @foreach ( $listblog as $item)
                    <tbody>
                        <tr>
                          <td>{{ $item->id}}</td>
                          <td>{{ $item->title}}</td>
                          <td>{{ $item->name}}</td>
                          <td><img src="{{$item->img}}" style="width:150px;"alt=""></td>
                          <td>{{ $item->summary}}</td>
                          <td>{{ $item->content}}</td>
                          <td>{{ $item->views}}</td>
                          <td>
                            <a href="{{ route('blogposts.edit', $item->id)}}"><button style="width: 100px" class="btn btn-primary">Sửa</button></a>
                            <form action="{{ route('blogposts.destroy', $item->id)}}" method="post">
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
                    <ul class="pagination pagination-sm m-0 float-right">
                      <li class="page-item"><a class="page-link" href="#">«</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                  </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection