@extends('layouts.master')

@section('web-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
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
            <form method="post" action="{{ route('uuser-store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="uuser-nrp">NRP</label>
                        <input type="text" class="form-control" id="uuser-nrp" placeholder="Contoh: 2272013" name="nrp" required autofocus maxlength="7">
                    </div>
                    <div class="form-group">
                        <label for="uuser-idrole">ID Role</label>
                        <input type="text" class="form-control" id="uuser-idrole" placeholder="Contoh: 3" name="id_role" required maxlength="1">
                    </div>
                    <div class="form-group">
                      <label for="uuser-idprodi">ID Prodi</label>
                      <input type="text" class="form-control" id="uuser-idprodi" placeholder="Contoh: 72 (untuk IF)" name="id_prodi" required>
                    </div>
                    <div class="form-group">
                      <label for="uuser-password">Password</label>
                      <input type="text" class="form-control" id="uuser-password" placeholder="Password" name="password" required maxlength="10">
                    </div>
                    <div class="form-group">
                      <label for="uuser-idrole">Email</label>
                      <input type="text" class="form-control" id="uuser-email" placeholder="Contoh: email@mail.com" name="email">
                    </div>
                    <div class="form-group">
                      <label for="uuser-name">Nama</label>
                      <input type="text" class="form-control" id="uuser-name" placeholder="Contoh: John Doe" name="name" required>
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