@extends('pages.prodi.dashboard')

@section('web-content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Polls</h1>
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

                @if ($polls->isNotEmpty())
                    {{-- @foreach ($polls as $poll)
                        <div class="poll-item">
                            <h3><a href="{{ route('poll.show', $poll->id_polling) }}">{{ $poll->judul_polling }}</a></h3>
                            <form method="post" action="{{ route('poll.vote') }}">
                                @csrf
                                <input type="hidden" name="id_polling" value="{{ $poll->id_polling }}">
                                <select name="kode_matkul[]" multiple>
                                    @foreach ($poll->mataKuliah as $matkul)
                                        <option value="{{ $matkul->kode_matkul }}">{{ $matkul->nama_matkul }}</option>
                                    @endforeach
                                </select>
                                <button type="submit">Vote</button>
                            </form>
                        </div>
                    @endforeach --}}
                    @foreach ($polls as $poll)
                        <a href="{{ route('poll.details', $poll->id_polling) }}" class="btn btn-block btn-primary btn-lg">{{ $poll->judul_polling }}</a>
                    @endforeach
            </div><!-- /.container-fluid -->
        </div>
    </div>
    <!-- /.content -->
@endsection

@section('spc-css')

@endsection

@section('spc-js')

@endsection
