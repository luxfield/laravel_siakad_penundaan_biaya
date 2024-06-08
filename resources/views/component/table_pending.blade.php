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
                            <table class="table table-head-fixed text-nowrap" id="table_pending">
                                <thead>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>keterangan</th>
                                    <th>detail</th>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuan_dana as $data)
                                        @if (Session::get('user') == 'KAPRODI')
                                            @if ($data->name == 'Kepala Prodi')
                                                <tr>
                                                    <td>{{ $data->id }}</td>
                                                    <td>{{ $data->name }}</td>
                                                    <td>{{ $data->tanggal }}</td>
                                                    <td>{{ $data->keterangan }}</td>
                                                    @if (Session::get('user') == 'TU')
                                                        <td><a class="btn btn-primary"
                                                                href="{{ route('staff review', ['id' => $data->id]) }}">Lihat
                                                                Detail</a></td>
                                                    @else
                                                        <td><a class="btn btn-primary"
                                                                href="{{ route('user review', ['id' => $data->id]) }}">Lihat
                                                                Detail</a></td>
                                                    @endif
                                                </tr>
                                            @endif

                                        @else

                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>{{ $data->keterangan }}</td>
                                            @if (Session::get('user') == 'TU')
                                                <td><a class="btn btn-primary"
                                                        href="{{ route('staff review', ['id' => $data->id]) }}">Lihat
                                                        Detail</a></td>
                                            @else
                                                <td><a class="btn btn-primary"
                                                        href="{{ route('user review', ['id' => $data->id]) }}">Lihat
                                                        Detail</a></td>
                                            @endif
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
