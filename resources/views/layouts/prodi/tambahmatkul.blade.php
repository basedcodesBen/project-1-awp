<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body>
    @extends('pages.prodi.sidebar')
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('tambahmatkul.store') }}">
                        @csrf
                        <input type="hidden" class="form-control" id="id_prodi" name="id_prodi" value="{{$data}}" required>
                        <div class="mb-3">
                            <label for="courseCode" class="form-label">Kode Matakuliah</label>
                            <input type="text" class="form-control" id="kodematkul"  name="kode_matkul"required>
                        </div>
                        <div class="mb-3">
                            {{-- <label for="endDate" class="form-label">Tahun Kurikulum</label>
                            <input type="text" class="form-control" id="tahunkurikulum"  name="tahun_kurikulum" required> --}}
                            <label for="endDate" class="form-label">Tahun Kurikulum</label>
                            <select class="form-control" name="tahun_kurikulum" required>
                                <option value="">Pilih Tahun Kurikulum</option>
                                @foreach ($kurikulums as $kurikulum)
                                  <option value="{{ $kurikulum->tahun_kurikulum }}">{{ $kurikulum->tahun_kurikulum }}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="mb-3">
                            <label for="courseName" class="form-label">Nama Matakuliah</label>
                            <input type="text" class="form-control" id="namamatkul" name="nama_matkul" required>
                        </div>
                        <div class="mb-3">
                            <label for="startDate" class="form-label">Jumlah SKS</label>
                            <input type="text" class="form-control" id="jumlahsks" name="jumlah_sks" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Mata Kuliah</button>
                        <a href="{{route('matkul')}}" class="btn btn-danger float-right ">Exit</a>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>
