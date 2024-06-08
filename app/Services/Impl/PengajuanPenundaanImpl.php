<?php

namespace App\Services\Impl;

use App\Services\PengajuanPenundaan;
use Illuminate\Support\Facades\DB;

class PengajuanPenundaanImpl implements PengajuanPenundaan {
    public function ajukanSuratPenundaan(array $data): bool
    {
        // var_dump($data);
        DB::table("request_postpone_agreement")->insert(
            [
                "id" => $data["id"],
                "name" => $data["nama"],
                "tanggal" => $data["tanggal"],
                "berkas" => $data["berkas"],
                "status" => $data["status"],
                "jenis_pengajuan" => $data["jenis_pengajuan"],
                "disetujui" => $data["disetujui"],
                "diteruskan" => $data["diteruskan"],
                "keterangan" => "-"
            ]
        );
        return true;
    }
}
