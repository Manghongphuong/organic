@extends('admin.masterAdmin')
@section('section_name')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Danh sách banner</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Banner</li>
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
                  <a href="{{route('banners.create')}}">
                    <h3 class="card-title">Thêm banner</h3>
                  </a>
  
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
                        <th>Hình ảnh</th>
                        <th>Chi tiết</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    @foreach ($banners as $item)
                    <tbody>
                        <td>{{$item->id}}</td>
                        <td><img src="{{$item->img_banner}}" style="width:150px;"alt=""></td>
                        <td>{{$item->detail}}</td>
                        <td>
                          <a href="{{ route('banners.edit', $item->id)}}"><button style="width: 100px" class="btn btn-primary">Sửa</button></a>
                          <form action="{{ route('banners.destroy', $item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button style="width: 100px" class="btn btn-primary" onclick="return confirm('Bạn có chắc muốn xóa không')">Xóa</button>
                          </form>
                        </td>
                    </tbody>
                    @endforeach
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection