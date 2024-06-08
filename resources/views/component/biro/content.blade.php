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
                    <div class="my-2">
                            <a href="{{ route("ajukan permintaan uang muka") }}" class="btn btn-primary"> Ajukan Permintaan Uang Muka Kerja</a >
                        </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> {{ $judul }}</h3>
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
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap" id="table_all_biro">
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
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php
                                        dd($data["data_pengajuan"]);
                                    @endphp --}}

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
                                                <a href="{{ route('user konfirmasi pencairan dana', ['id' => $data->id]) }}"
                                                    class="btn btn-primary">detail</a>
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
