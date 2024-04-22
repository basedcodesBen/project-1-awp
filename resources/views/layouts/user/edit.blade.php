@extends('pages.admin.master')

@section('web-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit User: {{ $user->name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="user">Users</a></li>
              <li class="breadcrumb-item active">Add User</li>
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
            <form method="post" action="{{ route('user-update', ['user' => $user->nrp]) }}">
                @csrf
                <div class="mb-2">
                    <a href="{{route('user-index')}}" class="btn btn-danger float-right">Exit</a>
                </div>

                <div class="card-body">
                    {{-- <div class="form-group">
                        <label for="user-nrp">NRP</label>
                        <input type="text" class="form-control" id="uuser-nrp" placeholder="Contoh: 2272013" name="nrp" required autofocus maxlength="7">
                    </div> --}}
                    <div class="form-group">
                      <label>Role</label>
                      <select class="form-control select2" style="width: 100%;" name="role" required>
                        <option selected="selected" value="user">User</option>
                        <option value="prodi">Prodi</option>
                        <option value="admin">Admin</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="user-idprodi">Prodi</label>
                      <select class="form-control select2" style="width: 100%;" name="id_prodi" required>
                        <option value="">Pilih ID Prodi</option>
                        @foreach ($programs as $program)
                          <option value="{{ $program->id_prodi }}">{{ $program->nama_prodi }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="user-password">Password</label>
                      <input type="text" class="form-control" id="user-password" placeholder="Password" name="password" required maxlength="10">
                    </div>
                    <div class="form-group">
                      <label for="user-idrole">Email</label>
                      <input type="text" class="form-control" id="user-email" placeholder="Contoh: email@mail.com" name="email">
                    </div>
                    <div class="form-group">
                      <label for="user-name">Nama</label>
                      <input type="text" class="form-control" id="user-name" placeholder="Contoh: John Doe" name="name" required>
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
