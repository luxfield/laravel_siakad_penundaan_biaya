@extends('component.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                @yield('notifikasi')
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="margin-top: 5px;">
                            <div class="card-header">
                                <h3 class="card-title">Laporan Dana disetujui</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Date</th>
                                        <th>keterangan</th>
                                        <th>detail</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataLaporanDanaSetuju as $laporanDanaSetuju)
                                            @if (
                                                $laporanDanaSetuju->name == Session::get('user') ||
                                                $laporanDanaSetuju->name == Session::get('nama')
                                                )
                                                <tr>
                                                    <td>{{ $laporanDanaSetuju->id }}</td>
                                                    <td>{{ $laporanDanaSetuju->name }}</td>
                                                    <td>{{ $laporanDanaSetuju->tanggal }}</td>
                                                    <td>{{ $laporanDanaSetuju->berkas }}</td>
                                                    <td><a class="btn btn-primary" href="">Lihat Detail</a></td>
                                                </tr>
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
