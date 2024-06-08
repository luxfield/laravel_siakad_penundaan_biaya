<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SURAT PERJANJIAN PENUNDAAN PEMBAYARAN BIAYA KULIAH</title>
    <style>
        .spacer-row {
            display: block;
            margin-top: 10px;
            /* Adjust the margin-top value as needed */
        }

        @media print {
            #btn-print {
                visibility: hidden;
            }
        }
    </style>
</head>

<body>
    <button class="btn btn-primary" id="btn-print" onclick="window.print()">Print this</button>
    <div id="screen-to-print">
        <div>
            <table style="width: 100%;">
                <tr style="display: flex; justify-content: center;">
                    <td style="text-align: center;">
                        <div style="margin-top: 15px;">
                            <img src="https://portal.unsada.ac.id/gate/img/header/logo.png" alt="logo unsada" width="100px" height="100px">
                        </div>
                    </td>
                    <td style="text-align: center;">
                        <h1 style="margin-bottom: 5px;">UNIVERSITAS DARMA PERSADA</h1>
                        Jl. Raden Inten (Terusan Casablanca) Pondok Kelapa - Jakarta 13450
                        <br>
                        Telp. (021) 8649051, 8649053, 8649057 Fax (021) 8649052
                        <br>
                        Email : <u>humas@unsada.ac.id</u> Homepage :
                        <u>https://www.unsada.ac.id</u>

                    </td>
                </tr>
                <tr>

                </tr>
            </table>
        </div>
        <div>
            <hr>
        </div>
        <div style="text-align: center;">
            <p><u><b>SURAT PERJANJIAN PENUNDAAN PEMBAYARAN BIAYA KULIAH</b></u></p>
        </div>
</body>
<table style="border-collapse: separate;">
    <tr>
        <td><b>Nama Orang Tua/Wali</b></td>
        <td><?php echo e($nama_orang_tua_mahasiswa); ?></td>
    </tr>
    <tr>
        <td>Alamat Rumah</td>
        <td><?php echo e($alamat_orang_tua_mahasiswa); ?></td>
    </tr>
    <tr>
        <td>Telepon Rumah</td>
        <td><?php echo e($telepon_rumah_orang_tua_mahasiswa); ?></td>
    </tr>
    <tr>
        <td>Pekerjaan/Jabatan</td>
        <td><?php echo e($pekerjaan_jabatan_orang_tua_mahasiswa); ?></td>
    </tr>
    <tr>
        <td>Alamat Kantor/Telp</td>
        <td><?php echo e($alamat_kantor_orang_tua_mahasiswa); ?></td>
    </tr>
    <tr class="spacer-row"></tr>
    <tr>
        <td><b>Nama Mahasiswa</b></td>
        <td><?php echo e($nama_mahasiswa); ?></td>
    </tr>
    <tr>
        <td>NIM</td>
        <td><?php echo e($nim_mahasiswa); ?></td>
    </tr>
    <tr>
        <td>Fakultas/Program Studi</td>
        <td><?php echo e($fakultas_prodi_mahasiswa); ?></td>
    </tr>
    <tr>
        <td>Semester/IPK</td>
        <td><?php echo e($semester_ipk_mahasiswa); ?></td>
    </tr>
    <tr>
        <td>Alamat Rumah</td>
        <td><?php echo e($alamat_mahasiswa); ?></td>
    </tr>
    <tr>
        <td>Telepon Rumah/HP</td>
        <td><?php echo e($telepon_rumah_mahasiswa); ?></td>
    </tr>
    <tr>
        <td>Pekerjaan/Jabatan</td>
        <td><?php echo e($pekerjaan_jabatan_mahasiswa); ?></td>
    </tr>
    <tr>
        <td>Alamat Kantor/Telp</td>
        <td><?php echo e($alamat_kantor_mahasiswa); ?></td>
    </tr>
</table>
<p style="
margin-top: 5px;
margin-bottom: 5px;
margin-left: 3px;
">Mengajukan Permohonan Penundaan pembayaran biaya kuliah sebesar</p>
<table>
    <tr>
        <td>Jumlah Tunggakan</td>
        <td> Rp. <?php echo e($total_hutang); ?>,-</td>
    </tr>
    <tr>
        <td>Jumlah Dibayarkan</td>
        <td>Rp. 1.xxx.xxx,-</td>
    </tr>
</table>
<p>Sisa pembayaran</p>
<ol value="1">
    <li>Jumlah pembayaran Rp. <?php echo e($tunggakan_50_persen); ?>,- pada tanggal ...</li>
    <?php for($i = 0; $i < count($jumlah_cicilan); $i++): ?> <li>Jumlah pembayaran <?php echo e($jumlah_cicilan[$i]); ?> pada tanggal ...</li>
        <?php endfor; ?>
</ol>
<p>Permohonan tersebut kami ajukan dengan alasan :</p>
<p>__________________________________________________________________________________</p>
<p>Apabila sampai tanggal tersebut tidak menepati janji dan tidak melunasi pembayaran. Bersedia dikenakan sanksi
    administrasi dan akademik yang berlaku di lingkungan Universitas Darma Persada</p>
<p></p>
<table style="width: 100%;">
    <tr>
        <td></td>
        <td>Jakarta, <?php echo e(date('d')); ?>/<?php echo e(date('M')); ?>/<?php echo e(date('Y')); ?></td>
    </tr>
    <tr>
        <td style="display: block; margin-left: 10px;">Pemberi Rekomendasi</td>
        <td>Orang Tua/Wali</td>
    </tr>
    <tr>
        <td colspan="2" style="display: block; margin-left: 30px;">Wakil Dekan II</td>
    </tr>
    <tr>
        <td style="display: block; margin-left: 30px;"><?php echo QrCode::generate('Ade Supriatna, S.T, M.T'); ?></td>
        <td>
            <div style="border: 1px solid black; width: 100px; padding: 5px;"> Materai 10 ribu </div>
        </td>
    </tr>
    <tr>
        <td>Ade Supriatna, S.T, M.T</td>
        <td>Nama Orang Tua</td>
    </tr>
</table>
</div>

</html><?php /**PATH C:\Users\Acer\Documents\laravel-maulana\laravel-maulana\resources\views/dana_pdf.blade.php ENDPATH**/ ?>