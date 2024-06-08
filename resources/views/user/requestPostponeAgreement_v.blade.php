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
                            <h3 class="card-title">{{ $judul }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" enctype="multipart/form-data" id="formAdd">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tanggal">tanggal</label>
                                    <p class="card-text">
                                        {{ date('Y-m-d H:i:s') }}
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <p class="card-text">
                                        {{ $pengguna }}
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="name">Jurusan</label>
                                    <p class="card-text">
                                        {{ $jabatan }}
                                    </p>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="name">NIM</label>
                                    <input type="text" name="nim_mahasiswa" class="form-control" id="nim_mahasiswa" placeholder="Masukkan NIM mahasiswa" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Semester/IPK</label>
                                    <input type="text" name="semester_ipk_mahasiswa" class="form-control" id="semester_ipk_mahasiswa" placeholder="Masukkan Semester/IPK mahasiswa" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Alamat</label>
                                    <input type="text" name="alamat_mahasiswa" class="form-control" id="alamat_mahasiswa" placeholder="Masukkan alamat mahasiswa" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Telepon Rumah</label>
                                    <input type="text" name="telepon_rumah_mahasiswa" class="form-control" id="telepon_rumah_mahasiswa" placeholder="Masukkan telepon rumah" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Pekerjaan/Jabatan</label>
                                    <input type="text" name="pekerjaan_jabatan_mahasiswa" class="form-control" id="pekerjaan_jabatan_mahasiswa" placeholder="Masukkan pekerjaan mahasiswa" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Alamat Kantor/Telp</label>
                                    <input type="text" name="alamat_kantor_mahasiswa" class="form-control" id="alamat_kantor_mahasiswa" placeholder="Masukkan alamat kantor mahasiswa" required>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body mt-3">
                                <div class="form-group">
                                    <label for="name">Nama Orang Tua</label>
                                    <input type="text" name="nama_orang_tua_mahasiswa" class="form-control" id="nama_orang_tua_mahasiswa" placeholder="Masukkan Nama penyelenggara" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Alamat</label>
                                    <input type="text" name="alamat_orang_tua_mahasiswa" class="form-control" id="alamat_orang_tua_mahasiswa" placeholder="Masukkan judul penyelenggara" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Telepon Rumah</label>
                                    <input type="text" name="telepon_rumah_orang_tua_mahasiswa" class="form-control" id="telepon_rumah_orang_tua_mahasiswa" placeholder="Masukkan lokasi penyelenggara" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Pekerjaan/Jabatan</label>
                                    <input type="text" name="pekerjaan_jabatan_orang_tua_mahasiswa" class="form-control" id="pekerjaan_jabatan_orang_tua_mahasiswa" placeholder="Masukkan Pekerjaan/Jabatan Orang Tua" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Alamat Kantor/Telp</label>
                                    <input type="text" name="alamat_kantor_orang_tua_mahasiswa" class="form-control" id="alamat_kantor_orang_tua_mahasiswa" placeholder="Masukkan lokasi penyelenggara" required>
                                </div> -->
                                <div class="form-group">
                                    <label for="exampleInputFile">Lampiran Surat Rincian Tagihan</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="berkas" style="visibility:hidden;" class="custom-file-input" id="exampleInputFile" accept=".pdf" required>
                                            <label class="custom-file-label" for="exampleInputFile">Pilih Berkas</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="keterangan">keterangan</label>
                                    <div class="input-group mb-3">

                                        <div class="input-group">
                                            <select class="custom-select" name="keterangan" id="inputGroupSelect04">
                                                <option selected>Pilih kebutuhan ...</option>
                                                <option value="Pengajuan Dana">Pengajuan Dana</option>
                                                <option value="Laporan Dana">Laporan Dana</option>
                                            </select>

                                        </div>
                                    </div>
                                </div> -->
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" id="submit_user" class="btn btn-primary">Submit</button>
                                </div>

                                <!-- <a href="{{ route('cetak_pdf') }}" class="btn btn-primary" type="submit" target="_blank" onclick="document.getElementById('formAdd').submit();">CETAK PDF</a> -->
                                <!-- <a href="{{route('preview_pdf')}}" class="btn btn-primary" type="submit" target="_blank">preview pdf</a> -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection