@extends('component.app')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content mt-3">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="ribbon-wrapper ribbon-xl">
                                @switch($data_pencairan[0]->disetujui)
                                    @case('Wadek')
                                        <div class="ribbon bg-success text-md">
                                            Disetujui Wadek
                                        </div>
                                    @break

                                    @default
                                @endswitch

                            </div>
                            <div class="card-header">
                                <h3 class="card-title">Pencairan Dana</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama"
                                            placeholder="Masukkan Nama" value="{{ $data_pencairan[0]->name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal">tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" id="tanggal"
                                            value="{{ date('Y-m-d') }}" readonly value="{{ $data_pencairan[0]->tanggal }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="dana">Permintaan Dana</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="number" name="dana" class="form-control" id="dana"
                                                placeholder="Masukkan pemintaan dana" value="{{ $data_pencairan[0]->dana }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">keterangan</label>
                                        <textarea rows="3" type="text" name="keterangan" class="form-control" id="keterangan"
                                            placeholder="Masukkan keterangan" readonly>{{ $data_pencairan[0]->keterangan }}</textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    @switch(Session::get('user'))
                                        @case('Wadek')
                                            <button type="submit" class="btn btn-primary">
                                                Submit
                                            </button>
                                        @break

                                        @case('Biro')
                                            <div class="row">
                                                <div class="col">
                                                    <p>
                                                        Dikonfirmasi oleh :
                                                    </p>
                                                    <p>
                                                        {!! QrCode::generate('Tata Usaha Fakultas Teknik') !!}
                                                    </p>
                                                    <p>
                                                        Tata Usaha Fakultas Teknik
                                                    </p>

                                                </div>
                                                <div class="col">
                                                    <p>
                                                        Disetujui oleh :
                                                    </p>
                                                    <p>
                                                        {!! QrCode::generate('Wakil Dekan 2 Fakultas Teknik') !!}
                                                    </p>
                                                    <p>
                                                        Wakil Dekan 2
                                                    </p>

                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                Konfirmasikan pengambilan dana
                                            </button>
                                        @break

                                        @case('TU')
                                            <div class="row">
                                                <div class="col">

                                                </div>
                                                <div class="col">
                                                    <p>
                                                        Disetujui oleh :
                                                    </p>
                                                    <p>
                                                        {!! QrCode::generate('Make me into a QrCode!') !!}
                                                    </p>
                                                    <p>
                                                        Wakil Dekan 2
                                                    </p>

                                                </div>
                                            </div>
                                            
                                        @break

                                        @case('HMJ' || 'DEKAN' || 'KAPRODI')
                                            <div class="row">
                                                <div class="col">
                                                    <p>
                                                        Dikonfirmasi oleh :
                                                    </p>
                                                    <p>
                                                        {!! QrCode::generate('Tata Usaha Fakultas Teknik') !!}
                                                    </p>
                                                    <p>
                                                        Tata Usaha Fakultas Teknik
                                                    </p>

                                                </div>
                                                <div class="col">
                                                    <p>
                                                        Disetujui oleh :
                                                    </p>
                                                    <p>
                                                        {!! QrCode::generate('Wakil Dekan 2 Fakultas Teknik') !!}
                                                    </p>
                                                    <p>
                                                        Wakil Dekan 2
                                                    </p>

                                                </div>
                                            </div>
                                        @break

                                        @default
                                    @endswitch
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
