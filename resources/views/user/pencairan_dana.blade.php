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
                                            placeholder="Masukkan Nama" value="{{ $pengguna }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal">tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" id="tanggal"
                                            value="{{ date('Y-m-d') }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="dana">Permintaan Dana</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="number" name="dana" class="form-control" id="dana"
                                                placeholder="Masukkan pemintaan dana">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">keterangan</label>
                                        <input rows="3" type="text" name="keterangan" class="form-control" id="keterangan"
                                            readonly value="Pengajuan Dana">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
