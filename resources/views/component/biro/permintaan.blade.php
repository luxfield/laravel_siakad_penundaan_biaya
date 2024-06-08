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
                                <h3 class="card-title">Permintaan Uang Muka Kerja</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama</label>

                                      <div class="input-group">
                                        <select class="custom-select" name="id" id="inputGroupSelect04">
                                          <option selected>Pilih pengguna ...</option>
                                          @foreach (DB::table('expedisi')->get() as $data)
                                          <option value="{{ $data->id }}">{{ $data->user }}</option>
                                          @endforeach
                                        </select>

                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control" id="keterangan"
                                            value="Pengajuan Dana" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal">tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" id="tanggal"
                                            value="{{ date('Y-m-d') }}" readonly>
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
