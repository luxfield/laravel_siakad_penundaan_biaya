<?php $__env->startSection('content'); ?>
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

                        <?php switch($pengajuan_dana[0]->status):
                        case ('tolak'): ?>
                        <div class="ribbon bg-danger text-lg">
                            ditolak
                        </div>
                        <?php break; ?>

                        <?php case ('pending'): ?>
                        <div class="ribbon bg-warning text-lg">
                            Pending
                        </div>
                        <?php break; ?>

                        <?php case ('setuju' || 'disetujui'): ?>
                        <div class="ribbon bg-success text-lg">
                            disetujui
                        </div>
                        <?php break; ?>

                        <?php default: ?>
                        <?php endswitch; ?>

                    </div>
                    <div class="card-header">
                        <h3 class="card-title">Detail Surat</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <p class="card-text">
                                    <?php echo e($pengajuan_dana[0]->name); ?>

                                </p>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">tanggal</label>
                                <input type="text" value="<?php echo e($pengajuan_dana[0]->tanggal); ?>" class="form-control" id="tanggal"  disabled>
                            </div>
                            <!-- <div class="form-group">
                                    <label for="name">Nama Penyelenggara</label>
                                    <input type="text" name="nama_penyelenggara" class="form-control" id="nama_penyelenggara"
                                        value="" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="name">judul Penyelenggara</label>
                                    <input type="text" name="judul_penyelenggara" class="form-control" id="judul_penyelengara"
                                    value=""  readonly>
                                </div>
                                <div class="form-group">
                                    <label for="name">lokasi Penyelenggara</label>
                                    <input type="text" name="lokasi_penyelenggara" class="form-control" id="lokasi_penyelengara"
                                    value=""  readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">tanggal Penyelenggara</label>
                                    <input type="date" name="tanggal_penyelenggara" class="form-control" id="tanggal_penyelenggara"
                                    readonly value="" >
                                </div> -->
                            <div class="form-group">
                                <label for="exampleInputFile">File Berkas</label>
                                <div class="pdfobject-container" style="height: 750px; border: 1rem solid rgba(0,0,0,.1);">
                                    <div id="pdf-viewer" style="height: 720px;"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="keterangan">keterangan</label>
                                <p class="card-text">
                                
                                    <?php echo e($pengajuan_dana[0]->keterangan); ?>

                                </p>
                            </div>

                            <!-- /.card-body -->
                            <?php if($pengajuan_dana[0]->dikonfirmasi == 'TU'): ?>
                            <div class="row justify-content-center">
                                <div class="col">
                                </div>
                                <div class="col">
                                    <p class="font-medium">
                                        Dikonfirmasi oleh :
                                    </p>

                                    <?php echo QrCode::generate('Dikonfirmasi oleh : Tata Usaha Fakultas Teknik'); ?>

                                    <p class="mt-2">
                                        Tata Usaha Fakultas Teknik
                                    </p>
                                </div>
                            </div>
                            <?php echo $__env->make('component.wadek.btn_mengesahkan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                            <?php if(Session::get('user') == 'Wadek' && $pengajuan_dana[0]->diteruskan == 'TU' && $pengajuan_dana[0]->dikonfirmasi != 'TU'): ?>
                            <div class="form-group">
                                <label for="name">Keterangan Disetujui / ditolak</label>
                                <input type="text" name="keterangan_pilihan" placeholder="masukkan keterangan disetujui / ditolak" class="form-control" id="keterangan_pilihan" required>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col">
                                </div>
                                <div class="col">
                                    <p class="font-medium">
                                        Diteruskan oleh :
                                    </p>
                                    <div style="margin-left: 40px;">
                                        <?php echo QrCode::generate('Tata Usaha Fakultas Teknik'); ?>

                                    </div>
                                    <p class="mt-2">
                                        Tata Usaha Fakultas Teknik
                                    </p>
                                </div>
                            </div>
                            <?php echo $__env->make('component.wadek.btn_preview_laporan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
</div>
</section>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('embed'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.8/pdfobject.min.js"></script>
<script>
    PDFObject.embed("<?php echo e(route('show-pdf', ['id' => $pdf])); ?>", "#pdf-viewer");
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('component.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Acer\Documents\laravel-maulana\laravel-maulana\resources\views/component/wadek/preview_pending.blade.php ENDPATH**/ ?>