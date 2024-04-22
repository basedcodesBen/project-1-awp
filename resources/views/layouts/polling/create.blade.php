@extends('pages.prodi.dashboard')

@section('web-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Tambah Poll</h1>
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
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="container-fluid">
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
          <div class="card p-4">
            <form method="post" action="{{ route('poll.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="id_polling" id="id_polling" class="form-control" value="{{ $nextPollId }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="judul_polling">Title</label>
                        <input type="text" name="judul_polling" id="judul_polling" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_mulai">Start Date</label>
                        <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_selesai">End Date</label>
                        <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control" required>
                    </div>
                    {{-- <div class="form-group">
                        <label>Select Subjects</label><br>
                        @foreach ($mataKuliahs as $matkul)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="mata_kuliahs[]" id="{{ $matkul->kode_matkul }}" value="{{ $matkul->kode_matkul }}">
                                <label class="form-check-label" for="{{ $matkul->kode_matkul }}">{{ $matkul->nama_matkul }}</label>
                            </div>
                        @endforeach
                    </div> --}}
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create Poll</button>
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
