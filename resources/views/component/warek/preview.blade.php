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
                    <div class="card card-primary mt-2">
                        <div class="ribbon-wrapper ribbon-xl">

                        </div>
                        <div class="card-header">
                            <h3 class="card-title">Detail Surat</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <p class="card-text">
                                        {{ $pengajuan_dana[0]->user }}
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">tanggal</label>
                                    <input type="date" value="{{ $pengajuan_dana[0]->tanggal }}" class="form-control"
                                        id="tanggal" value="{{ date('Y-m-d') }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File Berkas</label>
                                    <div class="pdfobject-container"
                                        style="height: 750px; border: 1rem solid rgba(0,0,0,.1);">
                                        <div id="pdf-viewer" style="height: 720px;"></div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="keterangan">keterangan</label>
                                    <p class="card-text">

                                        {{ $pengajuan_dana[0]->keterangan }}
                                    </p>
                                </div>

                                <div class="row">
                                    <div class="col-6">disahkan Oleh Wadek</div>
                                </div>
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
