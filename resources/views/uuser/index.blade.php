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
      <div class="card p-4">
          <table id="table-kk" class="table table-striped">
              <div class="p-2 container-fluid row">
                  <button type="button" class="btn btn-block btn-success btn-lg col-2" onclick="window.location='{{ route('uuser-create') }}'">Tambah User</button>
              </div>
              <thead>
              <tr>
                  <th>NRP</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Birthdate</th>
                  <th>Gender</th>
              </tr>
              </thead>
              <tbody>
              @foreach($users as $user)
                  <tr>
                      <td>{{ $user->nrp }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->birthdate }}</td>
                      <td>{{ $user->gender }}</td>
                      {{-- <td>
                        <a href="{{ route('kk-edit', ['kartuKeluarga' => $kk->id]) }}" role="button" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('kk-delete', ['kartuKeluarga' => $kk->id]) }}" role="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a>
                      </td> --}}
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