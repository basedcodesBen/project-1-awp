@extends('layouts.admin.master')

@section('web-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="prodi">Prodi</a></li>
              <li class="breadcrumb-item active">Add Prodi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="container-fluid">
              @if($errors->any())
                  <div class="alert alert-danger">
                      {{ implode('', $errors->all(':message')) }}
                  </div>
              @endif
        <div class="card p-4">
            <form method="post" action="{{ route('prodi-store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="prodi-idprodi">ID Program Studi</label>
                        <input type="text" class="form-control" id="prodi-idprodi" placeholder="Contoh: 72 (Untuk IF)" name="id_prodi" required autofocus maxlength="2">
                    </div>
                    <div class="form-group">
                      <label for="prodi-namaprodi">Nama Program Studi</label>
                      <input type="text" class="form-control" id="prodi-idprodi" placeholder="Contoh: S1 Teknik Informatika" name="nama_prodi" required maxlength="255">
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
  
@section('spc-css')
    
@endsection

@section('spc-js')

@endsection