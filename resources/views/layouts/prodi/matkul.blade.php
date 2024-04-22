<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>
@extends('pages.prodi.dashboard')
@section('web-content')
    <div class="container mt-4">
        <table class="table" id="myTable">
            <thead>
            <tr>
                <th>Kode Matakuliah</th>
                <th>Nama Matakuliah</th>
                <th>Tahun Kurikulum</th>
                <th>Jumlah SKS</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{$item->kode_matkul}}</td>
                    <td>{{$item->nama_matkul}}</td>
                    <td>{{$item->tahun_kurikulum}}</td>
                    <td>{{$item->jumlah_sks}}</td>
                    <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal{{$item->kode_matkul}}">
                            Hapus
                        </button>
                    </td>
                </tr>
                <div class="modal fade" id="modal{{$item->kode_matkul}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Matakuliah</h5>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda Ingin Menghapus Mata Kuliah {{$item->nama_matkul}} ?</p>
                                <form method="POST" action="{{route('hapusmatkul')}}">
                                    @csrf
                                    <input type="hidden" name="kode_matkul" value="{{$item->kode_matkul}}">
                                    <button type="submit" class="btn btn-danger">Konfirmasi</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>

        @foreach($data as $item)

        @endforeach
        <a class="btn btn-primary" href="{{route('tambahmatkul')}}">Tambah Matakuliah</a>
    </div>
@endsection
</body>
</html>
