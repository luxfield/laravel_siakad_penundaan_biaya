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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> {{ $judul }}</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap" id="table_all_wadek">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Date</th>
                                        @if (Session::get('user') != 'Biro' && Session::get('user') != 'Warek')
                                        <th>Status</th>
                                        @endif
                                        @if (Session::get('user') == 'TU')
                                        <th>Keterangan</th>
                                        <th>Disetujui</th>
                                        <th>Diteruskan</th>
                                        @endif
                                        @if (Session::get('user') == 'HMJ')
                                        <th>Disetujui</th>
                                        @endif
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (Session::get('user') == 'HMJ')
                                    @foreach ($data_pengajuan as $data)
                                    <tr>
                                        <td>
                                            {{ $data->id }}
                                        </td>
                                        <td>
                                            {{ $data->name }}

                                        </td>
                                        <td>
                                            {{ $data->tanggal }}

                                        </td>
                                        <td>
                                            <p h3>Pengajuan dana</p>
                                            ({{ $data->status }})
                                        </td>

                                        <td>
                                            <a href="{{ route('user review', ['id' => $data->id]) }}" class="btn btn-primary">detail</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    @foreach ($data_pencairan as $data)
                                    <tr>
                                        <td>
                                            {{ $data->id }}
                                        </td>
                                        <td>
                                            {{ $data->name }}

                                        </td>
                                        <td>
                                            {{ $data->tanggal }}

                                        </td>
                                        <td>
                                            <p>Pencairan dana</p>
                                            @if ($data->disetujui == '-')
                                            <p>(pending)</p>
                                            @else
                                            <p>(disetujui)</p>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('user konfirmasi pencairan dana', ['id' => $data->id]) }}" class="btn btn-primary">detail</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @foreach ($data_pelaporan as $data)
                                    @if (DB::table('laporan_dana_proses')->where([['id', '=', $data->id], ['diteruskan', '=', 'TU']])->count() == 1)
                                    <tr>
                                        <td>
                                            {{ $data->id }}
                                        </td>
                                        <td>
                                            {{ $data->name }}

                                        </td>
                                        <td>
                                            {{ $data->tanggal }}

                                        </td>
                                        <td>
                                            <p> Pelaporan Dana </p>
                                            </p>(diteruskan oleh {{ $data->diteruskan }})<p>
                                        </td>
                                        <td>
                                            <a href="{{ route('user review', ['id' => $data->id]) }}" class="btn btn-primary">detail</a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @foreach ($data_pengajuan_dikonfirmasi as $data)
                                    <tr>
                                        <td>
                                            {{ $data->id }}
                                        </td>
                                        <td>
                                            {{ $data->name }}

                                        </td>
                                        <td>
                                            {{ $data->tanggal }}

                                        </td>
                                        <td>
                                            <p>Laporan penundaan biaya kuliah</p>
                                            <p> (dikonfirmasi oleh {{ $data->dikonfirmasi }} )
                                            <p>
                                        </td>
                                        <td>
                                            <a href="{{ route('user review', ['id' => $data->id]) }}" class="btn btn-primary">detail</a>
                                        </td>
                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
</div>
@endsection