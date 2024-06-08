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

                        @switch($pengajuan_penundaan[0]->status)
                        @case('tolak')
                        <div class="ribbon bg-danger text-lg">
                            ditolak
                        </div>
                        @break

                        @case('pending')
                        <div class="ribbon bg-warning text-lg">
                            Pending
                        </div>
                        @break

                        @case('setuju' || 'disetujui')
                        <div class="ribbon bg-success text-lg">
                            disetujui
                        </div>
                        @break

                        @default
                        @endswitch

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
                                <label for="tanggal">tanggal</label>
                                <p class="card-text">
                                    {{ $pengajuan_penundaan[0]->tanggal }}
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <p class="card-text">
                                    {{ $pengajuan_penundaan[0]->name }}
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="name">NIM</label>
                                <p class="card-text">
                                    <!-- {{-- $data_detail[0]->nama_penyelenggara --}} -->
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="name">Fakultas/Program Studi</label>
                                <p class="card-text">
                                    <!-- {{-- $data_detail[0]->judul_penyelenggara --}} -->
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="name">Semester/IPK</label>
                                <p class="card-text">
                                    <!-- {{-- $data_detail[0]->lokasi_penyelenggara --}} -->
                                </p>
                            </div>
                            <!-- <div class="form-group">
                                <label for="tanggal">tanggal Penyelenggara</label>
                                <input type="date" name="tanggal_penyelenggara" class="form-control" id="tanggal_penyelenggara" readonly value="{{-- $data_detail[0]->tanggal_penyelenggara --}}">
                            </div> -->
                            <!-- <div class="form-group">
                                <label for="tanggal">Alasan ditolak / disetujui</label>
                                <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{-- $pengajuan_penundaan[0]->keterangan_persetujuan --}}" required>
                            </div> -->
                            <div class="form-group">
                                <label for="name">Alasan ditolak / disetujui</label>
                                <p class="card-text">
                                    {{ $pengajuan_penundaan[0]->keterangan }}
                                    <!-- {{-- $data_detail[0]->lokasi_penyelenggara --}} -->
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File Berkas</label>
                                <div class="pdfobject-container" style="height: 750px; border: 1rem solid rgba(0,0,0,.1);">
                                    <div id="pdf-viewer" style="height: 720px;"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="text-center">Pengajuan ini tidak memenuhi syarat untuk melakukan penundaan biaya</label>
                                <p class="card-text">
                                </p>
                            </div>
                            <!-- <div class="form-group">
                                <label for="lblrdtitle">Setujui ?</label>

                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rbAction" id="rdYa" value="ya" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rbAction" id="rdYidak" value="tidak" required>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Tidak
                                </label>
                            </div>
                        </div> -->
                        <!-- /.card-body -->
                        @if (DB::table('request_postpone_agreement')->where([['id', '=', $pengajuan_penundaan[0]->id], ['status', '!=', 'setuju']])->count() == 1)
                        <!-- <div class="row justify-content-center">
                            <div class="col">
                            </div>
                            <div class="col">
                                <p class="font-medium">
                                    Dibuat oleh :
                                </p>

                                {!! QrCode::generate('Dibuat oleh : Himpunan Mahasiswa Jurusan') !!}
                                <p class="mt-2">
                                    Himpunan Mahasiswa Jurusan
                                </p>
                            </div>
                        </div> -->
                        <!-- <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-primary" name="action" id="btnSubmitAction">Ya</button>
                        </div> -->
                        @if ($pengajuan_penundaan[0]->status == 'tolak')
                        @else

                        @endif
                        @endif
                        @if (DB::table('laporan_dana_proses')->where([['id', '=', $pengajuan_penundaan[0]->id], ['status', '!=', 'setuju'], ['dikonfirmasi', '=', null]])->count() == 1)
                        <div class="row justify-content-center">
                            <div class="col">
                            </div>
                            <div class="col">
                                <p class="font-medium">
                                    Dibuat oleh :
                                </p>

                                {!! QrCode::generate('Dibuat oleh : Himpunan Mahasiswa Jurusan') !!}
                                <p class="mt-2">
                                    Himpunan Mahasiswa Jurusan
                                </p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-primary" name="action">Meneruskan ke
                                wadek 1</button>
                        </div>
                        @endif

                        @if (DB::table('request_postpone_agreement')->where([['id', '=', $pengajuan_penundaan[0]->id], ['status', '=', 'setuju']])->count() == 1)

                        @if ($pengajuan_penundaan[0]->status == 'setuju')
                        <div class="row justify-content-center">
                            <div class="col">
                            </div>
                            <div class="col">
                                <p class="font-medium">
                                    Disetujui oleh :
                                </p>

                                {!! QrCode::generate('Disetujui oleh : Wakil Dekan 2 Fakultas Teknik') !!}
                                <p class="mt-2">
                                    Wakil Dekan 2 Fakultas Teknik
                                </p>
                            </div>
                        </div>
                        @if ($pengajuan_penundaan[0]->status == 'setuju' && !$pengajuan_penundaan[0]->dikonfirmasi == 'TU')
                        <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-primary" name="action">Konfirmasikan ke wadek 1</button>
                        </div>
                        @endif
                        @endif
                        @if (DB::table('expedisi')->where('id', '=', $pengajuan_penundaan[0]->id)->count() == 1 &&
                        DB::table('request_postpone_agreement')->where([['id', '=', $pengajuan_penundaan[0]->id], ['disahkan', '=', 'Wadek']])->count() == 1)
                        <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-primary" name="action">Konfirmasikan ke Wakil Rektor 2</button>
                        </div>
                        @endif

                        @endif
                        @if (DB::table('laporan_dana_proses')->where([['id', '=', $pengajuan_penundaan[0]->id],['status', '=', 'setuju'], ['disetujui', '=', 'Wadek']])->count() == 1)
                        <div class="row justify-content-center">
                            <div class="col">
                            </div>
                            <div class="col">
                                <p class="font-medium">
                                    Disetujui oleh :
                                </p>

                                {!! QrCode::generate('Disetujui oleh : Wakil Dekan 2 Fakultas Teknik') !!}
                                <p class="mt-2">
                                    Wakil Dekan 2 Fakultas Teknik
                                </p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-primary" name="action">Meneruskan ke
                                Wakil Rektor 2</button>
                        </div>
                        @endif
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
<script type="text/javascript">
    // Get references to the radio buttons and button elements
    const choiceButtons = document.querySelectorAll('input[name="rbAction"]');
    const myButton = document.getElementById('btnSubmitAction');

    // Add an event listener to each radio button
    choiceButtons.forEach(button => {
        button.addEventListener('change', () => {
            if (button.value === 'ya') {
                myButton.textContent = 'Setujui';
                myButton.classList.remove('btn-danger'); // Remove the class for "no"
                myButton.classList.add('btn-primary'); // Add the class for "yes"
            } else {
                myButton.textContent = 'Tolak';
                myButton.classList.remove('btn-primary'); // Add the class for "yes"
                myButton.classList.add('btn-danger'); // Remove the class for "no"
            }
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.8/pdfobject.min.js"></script>
<script>
    PDFObject.embed("{{ route('show-pdf', ['id' => $pdf]) }}", "#pdf-viewer");
</script>
@endsection