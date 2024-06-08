<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            @yield('notifikasi')
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> {{ $judul }}</h3>
                            <div class="card-tools">

                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0 ">
                            <table class="table table-head-fixed text-nowrap" id="table_id" data-toggle="table"
                                data-sort-name="date" data-sort-order="desc">
                                @if (Session::get('user') == 'TU')
                                    @include('component.tu.thead')
                                @endif
                                @if (Session::get('user') == 'Warek')
                                    @include('component.warek.thead')
                                @endif
                                @if (Session::get('user') == 'HMJ')
                                    @include('component.hmj.thead')
                                @endif
                                @if (Session::get('user') == 'KAPRODI')
                                    @include('component.kaprodi.thead')
                                @endif
                                <tbody>
                                    {{-- @php
                                        dd($data["data_pengajuan"]);
                                    @endphp --}}
                                    @if (Session::get('user') == 'Wadek')
                                        @yield('wadek index laporan')
                                    @endif
                                    @if (Session::get('user') == 'TU')
                                        @include('component.tu.index')
                                    @endif
                                    @if (Session::get('user') == 'Warek')
                                        @include('component.warek.index')
                                    @endif
                                    @if (Session::get('user') == 'HMJ')
                                        @include('component.hmj.index')
                                    @endif
                                    @if (Session::get('user') == 'KAPRODI')
                                        @include('component.kaprodi.index')
                                    @endif
                                    {{-- @if (Session::get('user') == 'TU')
                                        @foreach ($laporan_dana_detail as $data)
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
                                                <td></td>
                                                <td>
                                                    <p>Laporan penggunaan dana</p>
                                                    <p>
                                                        ({{ $data->status }})
                                                    </p>
                                                </td>
                                                <td>{{ $data->disahkan }}</td>
                                                <td></td>
                                                <td>
                                                    <a href="{{ route('staff review', ['id' => $data->id]) }}"
                                                        class="btn btn-primary">detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif --}}
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
