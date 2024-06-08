@extends('component.app')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->

                </div>
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="ribbon-wrapper ribbon-xl">

                            @switch($pengajuan_dana[0]->status)
                                @case("tolak")
                                    <div class="ribbon bg-danger text-lg">
                                        ditolak
                                    </div>
                                @break

                                @case("pending")
                                    <div class="ribbon bg-warning text-lg">
                                        Pending
                                    </div>
                                @break

                                @case("setuju" || "disetujui")
                                    <div class="ribbon bg-success text-lg">
                                        disetujui
                                    </div>
                                @break

                                @default
                            @endswitch
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">Detail Surat Rincian Tagihan Untuk Penundaan Biaya Kuliah</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <p class="card-text">
                                        {{ $pengajuan_dana[0]->name }}
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">tanggal</label>
                                    <p class="card-text">
                                        {{ $pengajuan_dana[0]->tanggal }}
                                    </p>
                                    <!-- <input type="date" value="{{ $pengajuan_dana[0]->tanggal }}" class="form-control"
                                        id="tanggal"  disabled> -->
                                </div>
                                 <!-- <div class="form-group">
                                    <label for="name">Nama Penyelenggara</label>
                                    <input type="text" name="nama_penyelenggara" class="form-control" id="nama_penyelenggara"
                                        value="{{-- $data_detail[0]->nama_penyelenggara --}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="name">judul Penyelenggara</label>
                                    <input type="text" name="judul_penyelenggara" class="form-control" id="judul_penyelengara"
                                    value="{{-- $data_detail[0]->judul_penyelenggara --}}"  readonly>
                                </div>
                                <div class="form-group">
                                    <label for="name">lokasi Penyelenggara</label>
                                    <input type="text" name="lokasi_penyelenggara" class="form-control" id="lokasi_penyelengara"
                                    value="{{-- $data_detail[0]->lokasi_penyelenggara --}}"  readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">tanggal Penyelenggara</label>
                                    <input type="date" name="tanggal_penyelenggara" class="form-control" id="tanggal_penyelenggara"
                                    readonly value="{{-- $data_detail[0]->tanggal_penyelenggara --}}" >
                                </div> -->
                                <div class="form-group">
                                    <label for="exampleInputFile">File Berkas</label>
                                    <div class="pdfobject-container"
                                        style="height: 750px; border: 1rem solid rgba(0,0,0,.1);">
                                        <div id="pdf-viewer" style="height: 720px;"></div>
                                    </div>

                                </div>
                                <!-- <div class="form-group">
                                    <label for="keterangan">keterangan</label>
                                    <p class="card-text">

                                        {{ $pengajuan_dana[0]->keterangan }}
                                    </p>
                                </div> -->

                                <!-- <div class="card-footer">
                                    <button type="submit" id="submit_user" class="btn btn-primary">Ajukan Penundaan</button>
                                </div> -->
                                @if (DB::table('request_postpone_agreement')
                                ->where('id','=', $pengajuan_dana[0]->id)
                                ->where('disahkan','=', 'wadek')
                                ->count() == 1)

                                <!-- <div class="row">
                                    <div class="col-6">
                                        <p>Dikonfirmasi Oleh : </p>
                                        {!! QrCode::generate('Dikonfirmasi Oleh : Tata Usaha Fakultas Teknik') !!}
                                         <p class="mt-2">Tata Usaha Fakultas Teknik</p>
                                    </div>
                                    <div class="col-6 ml-auto">
                                        <p>disahkan Oleh : </p>
                                        {!! QrCode::generate('Disahkan Oleh : Wakil Dekan 2 Fakultas Teknik') !!}
                                        <p class="mt-2">Wakil Dekan 2 Fakultas Teknik</p>
                                    </div>
                                </div> -->
                                @endif

                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection
@section('embed')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.8/pdfobject.min.js"></script>
    <script>
        PDFObject.embed("{{ route('show-pdf', ['id' => $pdf]) }}", "#pdf-viewer");
    </script>
@endsection
