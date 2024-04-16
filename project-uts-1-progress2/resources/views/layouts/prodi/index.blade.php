@extends('pages.admin.master')

@section('web-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Program Studi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Prodi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="card p-4">
          <table id="table-kk" class="table table-striped">
              <div class="p-2 container-fluid row">
                  <button type="button" class="btn btn-block btn-success btn-lg col-2" onclick="window.location='{{ route('prodi-create') }}'">Tambah Program Studi</button>
              </div>
              <thead>
              <tr>
                  <th>ID Prodi</th>
                  <th>Nama Prodi</th>
                  <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              @foreach($prodis as $prodi)
                  <tr>
                      <td>{{ $prodi->id_prodi }}</td>
                      <td>{{ $prodi->nama_prodi }}</td>
                      <td>
                        <a href="{{ route('prodi-edit', ['prodi' => $prodi->id_prodi]) }}" role="button" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('prodi-delete', ['prodi' => $prodi->id_prodi]) }}" role="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a>
                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>
      </div>
    </div><!-- /.container-fluid -->
  </div>
    <!-- /.content -->
@endsection
  
@section('spc-css')
    
@endsection

@section('spc-js')

@endsection