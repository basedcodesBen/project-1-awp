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
                <div class="card-header">Polling Results</div>

                    <div class="card-body">
                        <h5>Number of Votes for Each Subject:</h5>
                        <ul>
                            @foreach ($voteCounts as $kode_matkul => $count)
                                <li>{{ $kode_matkul }}: {{ $count }} votes</li>
                            @endforeach
                        </ul>

                        <h5>List of Students and Their Voted Subjects:</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Student NRP</th>
                                    <th>Voted Subjects</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studentVotes as $nrp => $subjects)
                                    <tr>
                                        <td>{{ $nrp }} </td>
                                        <td>{{ implode(', ', $subjects) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </div>
    <!-- /.content -->
@endsection

@section('spc-css')

@endsection

@section('spc-js')

@endsection
