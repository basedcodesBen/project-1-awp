@extends('pages.mahasiswa.master')

@section('web-content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $poll->judul_polling }}</h1>
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

    <div class="content">
        <div class="container-fluid">
            <div class="container-fluid">
                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                
                {{-- <h1>{{ $poll->judul_polling }}</h1> --}}
                {{-- <form method="post" action="{{ route('poll.vote') }}">
                    @csrf
                    <input type="hidden" name="id_polling" value="{{ $poll->id_polling }}">
                    @foreach ($subjects as $subject)
                        <input type="checkbox" name="selected_subjects[]" value="{{ $subject->kode_matkul }}">{{ $subject->nama_matkul }}<br>
                    @endforeach
                    <button class="btn btn-primary" type="submit">Vote</button>
                </form> --}}
                <form method="post" action="{{ route('poll.vote') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" name="id_polling" value="{{ $poll->id_polling }}">
                        </div>
                        <div class="form-group">
                            <label>Pilih Mata Kuliah</label><br>
                            @foreach ($subjects as $subject)
                                <div class="icheck-primary">
                                    <input type="checkbox" name="selected_subjects[]" id="primary" value="{{ $subject->kode_matkul }}">
                                    <label for="primary">{{ $subject->nama_matkul }} - Jumlah SKS: {{ $subject->jumlah_sks }}</label><br>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Vote</button>
                    </div>
                </form>
            </div><!-- /.container-fluid -->
        </div>
    </div>
    <!-- /.content -->
@endsection

@section('spc-css')

@endsection

@section('spc-js')

@endsection
