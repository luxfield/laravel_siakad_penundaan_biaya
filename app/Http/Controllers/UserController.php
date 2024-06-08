<?php

namespace App\Http\Controllers;

use App\Services\PengajuanPenundaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use PhpParser\Node\Stmt\Return_;

use function Psy\debug;

class UserController extends Controller
{

    public function __construct(PengajuanPenundaan $pengajuanDana)
    {
        $this->pengajuanDana = $pengajuanDana;
        date_default_timezone_set('Asia/Jakarta');
    }

    //
    public function index(Request $request)
    {
        switch ($request->session()->get('user')) {
            case 'HMJ':
                $data = DB::table('request_postpone_agreement')->join('users', 'users.id', '=', 'request_postpone_agreement.name')->select('request_postpone_agreement.*', 'users.name')->get();
                // dd($data);
                // $data_pencairan = DB::table('trx')
                //     ->join('users', 'trx.user_id', '=', 'users.id')
                //     ->join('pencairan_dana', 'trx.pencairan_id', '=', 'pencairan_dana.id')
                //     ->select('pencairan_dana.id', 'users.name', 'pencairan_dana.tanggal', 'pencairan_dana.disetujui', 'pencairan_dana.diteruskan')->get();
                return view('user.index', [
                    'judul' => 'Semua Pesan',
                    'all' => route('user index'),
                    'inbox' => route('user inbox'),
                    'pending' => route('user pending'),
                    'reject' => route('user reject'),
                    'pengguna' => $request->session()->get('nama'),
                    'add' => route('ajukan surat'),
                    'request' => route('meminta surat perjanjian penundaan'),
                    'pengajuan_dana' => $data,
                    'pencairan_dana_all' => [],
                ]);
                break;

            case 'Biro':
                $data = DB::table('pencairan_dana')->get();
                return view('component.biro.content', [
                    'judul' => 'Semua Pesan',
                    'all' => route('user index'),
                    'inbox' => route('user inbox'),
                    'pending' => route('user pending'),
                    'reject' => route('user reject'),
                    'pengguna' => $request->session()->get('user'),
                    'add' => route('ajukan surat'),
                    'data_pencairan' => $data,
                ]);
                break;

            case 'Warek':
                $data = DB::table('expedisi')->get();
                return view('user.index', [
                    'judul' => 'Semua Pesan',
                    'all' => route('user index'),
                    'inbox' => route('user inbox'),
                    'pending' => route('user pending'),
                    'reject' => route('user reject'),
                    'pengguna' => $request->session()->get('user'),
                    'add' => route('ajukan surat'),
                    'laporan_dana' => $data,
                ]);
                break;
            case 'KAPRODI':
                $data = DB::table('pengajuan_dana_proses')->get();
                $data_pencairan = DB::table('trx')
                    ->join('users', 'trx.user_id', '=', 'users.id')
                    ->join('pencairan_dana', 'trx.pencairan_id', '=', 'pencairan_dana.id')
                    ->select(
                        'pencairan_dana.id',
                        'users.name',
                        'pencairan_dana.tanggal',
                        'pencairan_dana.disetujui',
                        'pencairan_dana.diteruskan'
                    )->get();
                return view('user.index', [
                    'judul' => 'Semua Pesan',
                    'all' => route('user index'),
                    'inbox' => route('user inbox'),
                    'pending' => route('user pending'),
                    'reject' => route('user reject'),
                    'pengguna' => $request->session()->get('nama'),
                    'add' => route('ajukan surat'),
                    'pengajuan_dana' => $data,
                    'pencairan_dana_all' => $data_pencairan,
                ]);
                break;

            case 'DOSEN':
                $data = DB::table('pengajuan_dana_proses')->get();
                $data_pencairan = DB::table('trx')
                    ->join('users', 'trx.user_id', '=', 'users.id')
                    ->join('pencairan_dana', 'trx.pencairan_id', '=', 'pencairan_dana.id')
                    ->select(
                        'pencairan_dana.id',
                        'users.name',
                        'pencairan_dana.tanggal',
                        'pencairan_dana.disetujui',
                        'pencairan_dana.diteruskan'
                    )->get();
                return view('user.index', [
                    'judul' => 'Semua Pesan',
                    'all' => route('user index'),
                    'inbox' => route('user inbox'),
                    'pending' => route('user pending'),
                    'reject' => route('user reject'),
                    'pengguna' => $request->session()->get('nama'),
                    'add' => route('ajukan surat'),
                    'pengajuan_dana' => $data,
                    'pencairan_dana_all' => $data_pencairan,
                ]);
                break;

               
        }

        $data_pengajuan = DB::table('request_postpone_agreement')->get();
        $data_pencairan = DB::table('pencairan_dana')->get();
        $data_pelaporan_proses = DB::table('laporan_dana_proses')->get();
        $data_pelaporan = DB::table('laporan_dana')->get();
        $data_permintaan = DB::table('permintaan_pencairan_data');
        $data_pengajuan_dikonfirmasi = DB::table('request_postpone_agreement')->where('diteruskan', '=', 'TU')->get();
        // DD($data_pengajuan_dikonfirmasi);
        return view('component.wadek.content', [
            'judul' => 'Semua Pesan',
            'all' => route('user index'),
            'inbox' => route('user inbox'),
            'pending' => route('user pending'),
            'reject' => route('user reject'),
            'pengguna' => $request->session()->get('user'),
            'add' => route('ajukan surat'),
            'data_pengajuan' => $data_pengajuan,
            'data_pencairan' => $data_pencairan,
            'data_pelaporan' => $data_pelaporan_proses,
            'data_laporan' => $data_pelaporan,
            'data_pengajuan_dikonfirmasi' => $data_pengajuan_dikonfirmasi,
            'data_permintaan' => $data_permintaan
        ]);
    }
    public function inbox(Request $request)
    {
        $data = DB::table('pengajuan_dana')->get();
        $data_pencairan = DB::table('pencairan_dana')->get();
        return view('user.inbox', [
            'judul' => 'Semua Pesan',
            'all' => route('user index'),
            'inbox' => route('user inbox'),
            'pending' => route('user pending'),
            'reject' => route('user reject'),
            'pengguna' => $request->session()->get('user'),
            'add' => route('ajukan surat'),
            'pengajuan_dana' => $data,
            'pencairan_dana_all' => $data_pencairan,
        ]);
    }
    public function pending(Request $request)
    {


        if ($request->session()->get('user') == 'HMJ') {
            # code...
            $data = DB::table('pengajuan_dana')->where('status', '=', 'pending')->get();
            return view('user.pending', [
                'pengguna' => $request->session()->get('user'),
                'judul' => 'Semua Pesan pending',
                'all' => route('user index'),
                'inbox' => route('user inbox'),
                'pending' => route('user pending'),
                'reject' => route('user reject'),
                'add' => route('ajukan surat'),
                'pengajuan_dana' => $data,
            ]);
        } else {
            $data = DB::table('pengajuan_dana')->get();
            return view('user.pending', [
                'pengguna' => $request->session()->get('user'),
                'judul' => 'Semua Pesan pending',
                'all' => route('user index'),
                'inbox' => route('user inbox'),
                'pending' => route('user pending'),
                'reject' => route('user reject'),
                'add' => route('ajukan surat'),
                'pengajuan_dana' => $data,
            ]);
        }
    }
    public function reject(Request $request)
    {
        $data = DB::table('pengajuan_dana')->where('status', '=', 'tolak')->get();
        return view('user.reject', [
            'pengguna' => $request->session()->get('user'),
            'judul' => 'Semua Pesan ditolak',
            'all' => route('user index'),
            'inbox' => route('user inbox'),
            'pending' => route('user pending'),
            'reject' => route('user reject'),
            'add' => route('ajukan surat'),
            'pengajuan_dana' => $data,
        ]);
    }
    public function add(Request $request)
    {
        $user = DB::table('users')->where('name', '=', $request->session()->get('nama'))->get();
        $cicilan = DB::table('request_postpone_agreement')->where('id', '=', $request->parent_id)->get();
        // dd($cicilan);

        return view('user.add', [
            'judul' => 'Ajukan Surat Cicilan Biaya Kuliah',
            'add' => route('ajukan surat'),
            'pengguna' => $request->session()->get('nama'),
            'jabatan' => $user[0]->keterangan,
            'request' => route('ajukan surat'),
            'all' => route('user index'),
            'inbox' => route('user inbox'),
            'pending' => route('user pending'),
            'reject' => route('user reject'),
            'add' => route('ajukan surat'),
            'hutang' => $cicilan[0]->total_hutang,
            'cicilan' => $cicilan[0]->cicilan,
            "parent_id" => $request->parent_id
        ]);
    }

    public function doAdd(Request $request)
    {
        return $this->previewPDF($request);
        // $nama = $request->input("nama");
        // $tanggal = $request->input("tanggal");
        // $berkas = $request->file("berkas");
        // $keterangan = $request->input("keterangan");
        // $id = uniqid();
        // $berkas->storePubliclyAs($request->session()->get('user'), $berkas->getClientOriginalName(), "public");
        // DB::table('pengajuan_dana')->insert([
        //     "id" => $id,
        //     "name" => $nama,
        //     "tanggal" => $tanggal,
        //     "berkas" => $berkas->getClientOriginalName(),
        //     "status" => "pending",
        //     "keterangan" => $keterangan,
        //     "nama_penyelenggara" => $request->nama_penyelenggara,
        //     "judul_penyelenggara" => $request->judul_penyelenggara,
        //     "lokasi_penyelenggara" => $request->lokasi_penyelenggara,
        //     "tanggal_penyelenggara" => $request->tanggal_penyelenggara,
        // ]);
        // if (
        //     $this->pengajuanDana->tambahSuratPengajuan([
        //         "id" => $id,
        //         "nama" => $nama,
        //         "tanggal" => $tanggal,
        //         "berkas" => $berkas->getClientOriginalName(),
        //         "keterangan" => $keterangan,
        //         "status" => "pending",
        //         "disetujui" => "-",
        //         "diteruskan" => "-"
        //     ])
        // ) {
        //     return redirect()->route('user index');
        //     # code...
        // };

        // return false;
    }

    public function preview(Request $request)
    {
        // if ($request->session()->get('user') == 'Wadek') {

        // }
        switch ($request->session()->get('user')) {
           
            case 'Wadek':
                # code...
                // return dd($request);
                $param = $request->id;
                $ttd = QrCode::generate('Make me into a QrCode!');
                if (DB::table('request_postpone_agreement')->where('id', '=', $param)->count() == 1) {

                    $data = DB::table('request_postpone_agreement')->join('users', 'users.id', '=', 'request_postpone_agreement.name')->where('request_postpone_agreement.id', '=', $param)->select('request_postpone_agreement.*', 'users.name')->get();
                    // dd($data);
                    $user = $request->session()->get('user');

                    if ($data[0]->dikonfirmasi == "Dekan") {
                        switch ($data[0]->status) {
                            case 'tolak':
                                # code...
                                return view('component.wadek.preview_tolak', [
                                    'pengguna' => $user,
                                    'request' => '',
                                    'judul' => 'Detail Surat',
                                    'all' => route('user index'),
                                    'inbox' => route('user inbox'),
                                    'pending' => route('user pending'),
                                    'reject' => route('user reject'),
                                    'pdf' => $data[0]->id,
                                    'add' => route('ajukan surat'),
                                    'pengajuan_dana' => $data,
                                    'ttd' => $ttd,

                                ]);
                                break;

                            case 'setuju':
                                return view('component.wadek.preview_setuju', [
                                    'pengguna' => $user,
                                    'request' => '',
                                    'judul' => 'Detail Surat',
                                    'all' => route('user index'),
                                    'inbox' => route('user inbox'),
                                    'pending' => route('user pending'),
                                    'reject' => route('user reject'),
                                    'pdf' => $data[0]->id,
                                    'add' => route('ajukan surat'),
                                    'pengajuan_dana' => $data,
                                    'ttd' => $ttd,

                                ]);
                                break;
                            default:
                                # code...
                                break;
                        }
                    } else {
                       
                        return view('component.wadek.preview_pending', [
                            'pengguna' => $user,
                            'request' => '',
                            'judul' => 'Detail Surat',
                            'all' => route('user index'),
                            'inbox' => route('user inbox'),
                            'pending' => route('user pending'),
                            'reject' => route('user reject'),
                            'pdf' => $data[0]->id,
                            'add' => route('ajukan surat'),
                            'pengajuan_dana' => $data,
                            'ttd' => $ttd,

                        ]);
                    }
                }
                break;
            case 'HMJ':
                $param = $request->id;
                $ttd = QrCode::generate('Make me into a QrCode!');
                if ($data = DB::table('request_postpone_agreement')->where('id', '=', $param)->count() == 1) {
                    $data = DB::table('request_postpone_agreement')->join('users', 'users.id', '=', 'request_postpone_agreement.name')->where('request_postpone_agreement.id', '=', $param)->select('request_postpone_agreement.*', 'users.name')->get();
                    $user = $request->session()->get('user');
                    switch ($data[0]->status) {
                        case 'pending':
                            # code...
                            return view('component.hmj.preview_pending', [
                                'pengguna' => $user,
                                'request' => route('meminta surat perjanjian penundaan'),
                                'judul' => 'Detail Surat',
                                'all' => route('user index'),
                                'inbox' => route('user inbox'),
                                'pending' => route('user pending'),
                                'reject' => route('user reject'),
                                'pdf' => $data[0]->id,
                                'add' => route('ajukan surat'),
                                'pengajuan_dana' => $data,
                                'ttd' => $ttd,

                            ]);
                            break;
                        case 'setuju':
                            return view('component.hmj.preview_setuju', [
                                'pengguna' => $user,
                                'request' => route('meminta surat perjanjian penundaan'),
                                'judul' => 'Detail Surat',
                                'all' => route('user index'),
                                'inbox' => route('user inbox'),
                                'pending' => route('user pending'),
                                'reject' => route('user reject'),
                                'pdf' => $data[0]->id,
                                'add' => route('ajukan surat'),
                                'pengajuan_dana' => $data,
                                'ttd' => $ttd,

                            ]);
                            break;
                        case 'tolak':
                            break;
                        default:
                            # code...
                            break;
                    }
                }
                break;
            default:
                # code...
                break;
        }
        // dd($request);

        // $param = $request->id;
        // $ttd = QrCode::generate('Make me into a QrCode!');
        // if ($request->session()->get('user') == 'Warek') {
        //     # code...
        //     $user = $request->session()->get('user');
        //     $data = DB::table('expedisi')->where('id', '=', $param)->get();
        //     return view('component.warek.preview', [
        //         'pengguna' => $user,
        //         'judul' => 'Detail Surat',
        //         'all' => route('user index'),
        //         'inbox' => route('user inbox'),
        //         'pending' => route('user pending'),
        //         'reject' => route('user reject'),
        //         'pdf' => $data[0]->id,
        //         'add' => route('ajukan surat'),
        //         'pengajuan_dana' => $data,
        //         'ttd' => $ttd,
        //     ]);
        // }
        // if ($request->session()->get('user') == 'Wadek') {
        //     # code...
        //     if (DB::table('pengajuan_dana_proses')->where('id', '=', $param)->count() == 1) {
        //         $user = $request->session()->get('user');
        //         $data = DB::table('pengajuan_dana_proses')->where('id', '=', $request->id)->get();
        //         $data_detail = DB::table('pengajuan_dana')->where('id', '=', $param)->get();
        //         return view('component.wadek.preview', [
        //             'pengguna' => $user,
        //             'judul' => 'Detail Surat',
        //             'all' => route('user index'),
        //             'inbox' => route('user inbox'),
        //             'pending' => route('user pending'),
        //             'reject' => route('user reject'),
        //             'pdf' => $data[0]->id,
        //             'add' => route('ajukan surat'),
        //             'pengajuan_dana' => $data,
        //             'data_detail' => $data_detail,
        //             'ttd' => $ttd,

        //         ]);
        //     }

        //     if (DB::table('laporan_dana_proses')->where('id', '=', $param)->count() == 1) {
        //         # code...
        //         $data = DB::table('laporan_dana_proses')->where('id', '=', $param)->get();

        //         $user = $request->session()->get('user');
        //         if ($request->session()->get('user') == 'Wadek') {
        //             return view('component.wadek.preview', [
        //                 'pengguna' => $user,
        //                 'judul' => 'Detail Surat',
        //                 'all' => route('user index'),
        //                 'inbox' => route('user inbox'),
        //                 'pending' => route('user pending'),
        //                 'reject' => route('user reject'),
        //                 'pdf' => $data[0]->id,
        //                 'add' => route('ajukan surat'),
        //                 'pengajuan_dana' => $data,
        //                 'ttd' => $ttd,

        //             ]);
        //             # code...
        //         }
        //     }
        //     if ($data = DB::table('request_postpone_agreement')->where('id', '=', $param)->count() == 1) {
        //         $data = DB::table('request_postpone_agreement')->where('id', '=', $param)->get();
        //         $user = $request->session()->get('user');
        //         return view('component.hmj.preview', [
        //             'pengguna' => $user,
        //             'judul' => 'Detail Surat',
        //             'all' => route('user index'),
        //             'inbox' => route('user inbox'),
        //             'pending' => route('user pending'),
        //             'reject' => route('user reject'),
        //             'pdf' => $data[0]->id,
        //             'add' => route('ajukan surat'),
        //             'pengajuan_dana' => $data,
        //             'ttd' => $ttd,

        //         ]);
        //     }
        // }
        // if (DB::table('laporan_dana_proses')->where('id', '=', $param)->count() == 1) {
        //     # code...
        //     $data = DB::table('laporan_dana_proses')->where('id', '=', $param)->get();

        //     $user = $request->session()->get('user');
        //     if ($request->session()->get('user') == 'Wadek') {
        //         return view('component.wadek.preview', [
        //             'pengguna' => $user,
        //             'judul' => 'Detail Surat',
        //             'all' => route('user index'),
        //             'inbox' => route('user inbox'),
        //             'pending' => route('user pending'),
        //             'reject' => route('user reject'),
        //             'pdf' => $data[0]->id,
        //             'add' => route('ajukan surat'),
        //             'pengajuan_dana' => $data,
        //             'ttd' => $ttd,

        //         ]);
        //         # code...
        //     }
        // }
        // if ($data = DB::table('request_postpone_agreement')->where('id', '=', $param)->count() == 1) {
        //     $data = DB::table('request_postpone_agreement')->where('id', '=', $param)->get();
        //     $data_detail = DB::table('pengajuan_penundaan')->where('id', '=', $param)->get();

        //     $user = $request->session()->get('user');
        //     return view('component.hmj.preview', [
        //         'pengguna' => $user,
        //         'judul' => 'Detail Surat',
        //         'all' => route('user index'),
        //         'inbox' => route('user inbox'),
        //         'pending' => route('user pending'),
        //         'reject' => route('user reject'),
        //         'pdf' => $data[0]->id,
        //         'add' => route('ajukan surat'),
        //         'pengajuan_dana' => $data,
        //         'data_detail' => $data_detail,
        //         'ttd' => $ttd,

        //     ]);
        // }
    }

    public function showPDF(Request $request, String $id)
    {
        if (DB::table('pengajuan_penundaan')->where('id', '=', $id)->count() == 1) {
            # code...
            $data = DB::table('pengajuan_penundaan')->where('id', '=', $id)->get();

            return response()->file(public_path('storage/uploaded/' . $data[0]->berkas));
        } else {
            $data = DB::table('laporan_dana')->where('id', '=', $id)->get();

            return response()->file(public_path('storage/uploaded/' . $data[0]->berkas));
        }
    }

    public function proses(Request $request)
    {
        // dd($request->session()->get('user'));
        $user = $request->session()->get('user');

        switch ($user) {
            case 'HMJ':
                # code...
                return redirect()->route('ajukan surat', ["parent_id" => $request->id,]);
                break;
            case 'Wadek':

                switch ($request->action) {
                    case 'tolak':
                        # code...
                        DB::table('request_postpone_agreement')->where('id', '=', $request->id)->update([
                            'status' => 'tolak',
                            'keterangan' => $request->keterangan_pilihan,
                            'dikonfirmasi' => 'Dekan'
                        ]);
                        break;
                    case 'setuju':
                        DB::table('request_postpone_agreement')->where('id', '=', $request->id)->update([
                            'status' => 'setuju',
                            'keterangan' => $request->keterangan_pilihan,
                            'dikonfirmasi' => 'Dekan'
                        ]);
                        break;
                    default:
                        # code...
                        break;
                }
            default:
                # code...
                break;
        }
        // $user = $request->session()->get('user');
        // if ($user == "Wadek") {
        //     # code...

        //     if (DB::table('pengajuan_dana_proses')->where(
        //         [
        //             ['id', '=', $request->id],
        //             ['dikonfirmasi', '=', 'TU']
        //         ]
        //     )->count() == 1) {
        //         $pengajuan_dana = DB::table('pengajuan_dana_proses')->where('id', '=', $request->id)->get();
        //         DB::table('pengajuan_dana_proses')->where('id', '=', $request->id)->update(
        //             [
        //                 'disahkan' => 'Wadek'
        //             ]
        //         );

        //         DB::table('expedisi')->insert([
        //             'id' => $request->id,
        //             'tanggal' => date('Y-m-d'),
        //             'keterangan' => $pengajuan_dana[0]->keterangan,
        //             'berkas' => $pengajuan_dana[0]->berkas,
        //             'user' => $pengajuan_dana[0]->name,
        //         ]);
        //     }
        //     if (
        //         DB::table('laporan_dana_proses')->where([['id', '=', $request->id], ['dikonfirmasi', '=', 'TU']])->count() == 1

        //     ) {
        //         DB::table('laporan_dana_proses')->where('id', '=', $request->id)->update(
        //             [
        //                 'disahkan' => $user,
        //             ]
        //         );
        //         DB::table('laporan_dana')->where('id', '=', $request->id)->update(
        //             [
        //                 'status' => 'setuju',
        //                 'disahkan' => $user,

        //             ]
        //         );
        //     }
        //     # code...
        //     switch ($request->action) {
        //         case 'setuju':
        //             if (DB::table('laporan_dana_proses')->where('id', '=', $request->id)->count() == 1) {

        //                 # code...
        //                 DB::table('laporan_dana_proses')->where('id', '=', $request->id)->update(
        //                     [
        //                         "status" => "setuju",
        //                         "disetujui" => 'Wadek',

        //                     ]
        //                 );
        //             } else {
        //                 $user = DB::table('pengajuan_dana_proses')->where('id', '=', $request->id)->get();
        //                 DB::table('pengajuan_dana_proses')->where('id', '=', $request->id)->update(
        //                     [
        //                         'status' => 'setuju',
        //                         'disetujui' => 'Wadek',
        //                         'keterangan_persetujuan' => $request->keterangan_pilihan
        //                     ]
        //                 );
        //             }
        //             break;
        //         case 'tolak':
        //             if (DB::table('laporan_dana_proses')->where('id', '=', $request->id)->count() == 1) {
        //                 # code...
        //                 DB::table('laporan_dana_proses')->where('id', '=', $request->id)->update(
        //                     [
        //                         // 'disetujui' => $user,
        //                         'status' => "ditolak"
        //                     ]
        //                 );
        //             } else {

        //                 DB::table('pengajuan_dana_proses')->where('id', '=', $request->id)->update(
        //                     [
        //                         'status' => 'tolak',
        //                         'disetujui' => '-',
        //                         'keterangan_persetujuan' => $request->keterangan_pilihan
        //                     ]
        //                 );
        //             }
        //             break;
        //     }
        // }
        // if ($user == 'TU') {

        //     DB::table('laporan_dana_proses')->where('id', '=', $request->id)->update(
        //         [
        //             'diteruskan' => "TU",
        //         ]
        //     );
        // }


        return redirect()->route('user index');
    }

    public function pencairan(Request $request, String $id)
    {

        return view('user.pencairan_dana', [
            'nama' => 'HMJ',
            'add' => route('ajukan surat'),
            'pengguna' => $request->session()->get('user'),
            'request' => route('ajukan surat'),
            'all' => route('user index'),
            'inbox' => route('user inbox'),
            'pending' => route('user pending'),
            'reject' => route('user reject'),
            'add' => route('ajukan surat'),
        ]);
    }

    public function pencairanProses(Request $request)
    {
        $nama = $request->nama;
        $tanggal = $request->tanggal;
        $dana = $request->dana;
        $keterangan = $request->keterangan;
        DB::table('pencairan_dana')->insert([
            'id' => uniqid(),
            'name' => $nama,
            'tanggal' => $tanggal,
            'dana' => $dana,
            'keterangan' => $keterangan,
            'disetujui' => '-'
        ]);
        return redirect()->route('staff index');
    }

    public function konfirmasiPencairan(Request $request, String $id)
    {
        $data = DB::table('pencairan_dana')->where('id', '=', $id)->get();
        return view('user.pencairan_dana_proses', [
            'pengguna' => $request->session()->get('user'),
            'request' => route('ajukan surat'),
            'add' => route('ajukan surat'),
            'all' => route('user index'),
            'inbox' => route('user inbox'),
            'pending' => route('user pending'),
            'reject' => route('user reject'),
            'data_pencairan' => $data
        ]);
    }
    public function konfirmasiPencairanProses(Request $request, String $id)
    {
        switch ($request->session()->get('user')) {
            case "Wadek":

                $data = DB::table('pencairan_dana')->where('id', '=', $id)->update([
                    'disetujui' => "Wadek"
                ]);

                return redirect()->route('user index');
                break;

            case "Biro":
                $data = DB::table('pencairan_dana')->where('id', '=', $id)->get();
                $user = DB::table('users')->where('status', '=', $data[0]->name)->get();
                // dd($user);
                DB::table('trx')->insert([
                    "pencairan_id" => $id,
                    'user_id' => $user[0]->id,
                    "tanggal" => $request->input("tanggal"),
                ]);
                return redirect()->route('user index');
                break;
            case 'TU':
                $dana = DB::table('pencairan_dana')->where('id', '=', $id)->get();
                DB::table('pencairan_dana')->where('id', '=', $id)->update(
                    ['diteruskan' => $dana[0]->name]
                );
                return redirect()->route('staff index');
        }
    }

    public function laporan(Request $request)
    {
        $nama = $request->session()->get('nama');
        $jabatan = DB::table('users')->where('name', '=', $request->session()->get('nama'))->get();

        return view('user.add', [
            'jabatan' => $jabatan[0]->keterangan,
            'judul' => "Laporan penggunaan dana",
            'pengguna' => $request->session()->get('nama'),
            'request' => route('ajukan surat'),
            'add' => route('ajukan surat'),
            'all' => route('user index'),
            'inbox' => route('user inbox'),
            'pending' => route('user pending'),
            'reject' => route('user reject'),
        ]);
    }
    public function doLaporan(Request $request,)
    {
        $nama = $request->input("nama");
        $tanggal = $request->input("tanggal");
        $berkas = $request->file("berkas");
        $keterangan = $request->input("keterangan");
        $id = uniqid();
        $berkas->storePubliclyAs('uploaded', $berkas->getClientOriginalName(), "public");
        DB::table('laporan_dana')->insert([
            "id" => $id,
            "name" => $nama,
            "tanggal" => $tanggal,
            "berkas" => $berkas->getClientOriginalName(),
            "status" => "pending",
            "keterangan" => $keterangan
        ]);

        DB::table('laporan_dana_proses')->insert([
            "id" => $id,
            "name" => $nama,
            "tanggal" => $tanggal,
            "berkas" => $berkas->getClientOriginalName(),
            "keterangan" => $keterangan,
            "status" => "pending",
            "disetujui" => "-",
            "diteruskan" => "-"
        ]);

        return redirect()->route('user index');
        # code...

    }

    public function permintaan(Request $request)
    {
        return view('component.biro.permintaan', [
            'pengguna' => $request->session()->get('user'),
            'judul' => 'Surat Masuk',
            'all' => route('staff index'),
            'inbox' => route('staff inbox'),
            'pending' => route('staff pending'),
            'reject' => route('staff reject'),

        ]);
    }
    public function doPermintaan(Request $request)
    {
        $user = DB::table('pengajuan_dana_proses')->where('id', '=', $request->id)->get();
        DB::table('permintaan_pencairan_dana')->insert([
            'id' => uniqid(),
            'id_pengajuan_dana' => $request->id,
            'nama' => $user[0]->name,
            'tanggal' => $request->tanggal,
            'status' => $request->keterangan,
        ]);

        return redirect()->route('user index');
    }

    public function laporanDisetujui(Request $request)
    {
        $laporanDanaSetuju = DB::table('laporan_dana')->where('status', '=', 'setuju')->get();
        $user = DB::table('users')->where('name', '=', $request->session()->get('nama'))->get();

        return response()->view('component.report.approve', [
            'dataLaporanDanaSetuju' => $laporanDanaSetuju,
            'judul' => 'Laporan Dana Disetujui',
            'all' => route('user index'),
            'inbox' => route('user inbox'),
            'pending' => route('user pending'),
            'reject' => route('user reject'),
            'pengguna' => $request->session()->get('user'),
            'add' => route('ajukan surat'),
        ]);
    }
    public function laporanDitolak(Request $request)
    {
        $laporanDanaSetuju = DB::table('laporan_dana')->where('status', '=', 'tolak')->get();
        $user = DB::table('users')->where('name', '=', $request->session()->get('nama'))->get();

        return response()->view('component.report.reject', [
            'dataLaporanDanaSetuju' => $laporanDanaSetuju,
            'judul' => 'Laporan Dana Ditolak',
            'all' => route('user index'),
            'inbox' => route('user inbox'),
            'pending' => route('user pending'),
            'reject' => route('user reject'),
            'pengguna' => $request->session()->get('user'),
            'add' => route('ajukan surat'),
        ]);
    }

    public function doCetak_PDF(Request $request)
    {
        $pdf = PDF::loadview('dana_pdf');
        // $pdf->setIsHtml5ParserEnabled(true);
        $pdf->setPaper('A4', 'landscape');
        // $pdf->set_base_path();
        $pdf->render();
        return $pdf->download('laporan-dana-pdf.pdf');
        // return $pdf->stream();


    }

    public function previewPDF(Request $request)
    {
        // dd( $request);
        $alasan = $request->input('alasan');
        $data = DB::table('request_postpone_agreement')->where('request_postpone_agreement.id', '=', $request->parent_id)->join('users', 'users.id', '=', 'request_postpone_agreement.name')->select('request_postpone_agreement.*', 'users.name')->get();
        $get_data_user = DB::table('users')->where('status','=', $request->session()->get('user'))->get();
        $cek_user = DB::table('detail_user')->where('id','=', $get_data_user[0]->id)->get();
        $tunggakan_50_persen = $data[0]->total_hutang / 2;
        return response()->view('dana_pdf', [

            'add' => route('ajukan surat'),
            'all' => route('user index'),
            'inbox' => route('user inbox'),
            'pending' => route('user pending'),
            'reject' => route('user reject'),

            "tunggakan_50_persen" => $tunggakan_50_persen,
            "total_hutang" => $data[0]->total_hutang,
            "nama_mahasiswa" => $data[0]->name,
            "fakultas_prodi_mahasiswa" => $data[0]->keterangan,
            "nim_mahasiswa" => $cek_user[0]->nim,
            "semester_ipk_mahasiswa" => $cek_user[0]->semester,
            "alamat_mahasiswa" => $cek_user[0]->alamat_rumah_mahasiswa,
            "telepon_rumah_mahasiswa" => $cek_user[0]->telepon_mahasiswa,
            "pekerjaan_jabatan_mahasiswa" => $cek_user[0]->pekerjaan_mahasiswa,
            "alamat_kantor_mahasiswa" => $cek_user[0]->alamat_kantor_mahasiswa,
            "nama_orang_tua_mahasiswa" => $cek_user[0]->nama_orang_tua,
            "alamat_orang_tua_mahasiswa" => $cek_user[0]->alamat_rumah_orang_tua,
            "telepon_rumah_orang_tua_mahasiswa" => $cek_user[0]->telepon_orang_tua,
            "pekerjaan_jabatan_orang_tua_mahasiswa" => $cek_user[0]->pekerjaan_orang_tua,
            "alamat_kantor_orang_tua_mahasiswa" => $cek_user[0]->alamat_kantor_orang_tua,
            "jumlah_cicilan" => $request->jumlah_cicilan,
            "alasan" => $alasan

        ]);
    }
    public function requestPostpone(Request $request)
    {
        $user = DB::table('users')->where('name', '=', $request->session()->get('nama'))->get();
        $jabatan = DB::table('users')->where('name', '=', $request->session()->get('nama'))->get();
        return response()->view('user.requestPostponeAgreement_v', [
            'judul' => 'Ajukan permintaan surat pernjanjian penundaan',
            'pengguna' => $user[0]->name,
            'jabatan' => $jabatan[0]->keterangan,
            'add' => route('ajukan surat'),
            'all' => route('user index'),
            'inbox' => route('user inbox'),
            'pending' => route('user pending'),
            'reject' => route('user reject'),
            'request' => route('meminta surat perjanjian penundaan')
        ]);
    }

    public function doRequestPostpone(Request $request)
    {
        // dd($request->session()->get('user'));
        $user = DB::table('users')->where('name', '=', $request->session()->get('nama'))->get();
        // dd($user);
        $berkas = $request->file("berkas");
        $id = uniqid();
        $berkas->storePubliclyAs('uploaded', $berkas->getClientOriginalName(), "public");
        DB::table('pengajuan_penundaan')->insert([
            "id" => $id,
            "name" => $user[0]->id,
            "tanggal" => date('Y-m-d H:i:s'),
            "berkas" => $berkas->getClientOriginalName(),
            "status" => "pending",
            "keterangan" => 'penundaan biaya',
            "nama_penyelenggara" => '',
            "judul_penyelenggara" => '',
            "lokasi_penyelenggara" => '',
            "tanggal_penyelenggara" => date('Y-m-d H:i:s'),
        ]);
        if (
            $this->pengajuanDana->ajukanSuratPenundaan([
                "id" => $id,
                "nama" => $user[0]->id,
                "tanggal" => date('Y-m-d H:i:s'),
                "berkas" => $berkas->getClientOriginalName(),
                "jenis_pengajuan" => 'rincian biaya',
                "status" => "pending",
                "disetujui" => "-",
                "diteruskan" => "-"
            ])
        ) {
            return redirect()->route('user index');
            # code...
        };

        return false;
    }

    public function requestPostponeAgree(Request $request)
    {
        // dd($request->parent_id);
        if ($request->parent_id == null || $request->parent_id == "") {
            return redirect()->route("user index");
        }
        $cektransaksi = DB::table('trx')->where('rinciantagihan_id', '=', $request->parent_id)->count();
        $user = DB::table('users')->where('name', '=', $request->session()->get('nama'))->get();
        $jabatan = DB::table('users')->where('name', '=', $request->session()->get('nama'))->get();
        return response()->view('user.requestPostponeAgreementAgree_v', [
            'judul' => 'Ajukan permintaan penundaan biaya kuliah',
            'pengguna' => $user[0]->name,
            'jabatan' => $jabatan[0]->keterangan,
            'add' => route('ajukan surat'),
            'all' => route('user index'),
            'inbox' => route('user inbox'),
            'pending' => route('user pending'),
            'reject' => route('user reject'),
            'request' => route('meminta surat perjanjian penundaan'),
            'cektransaksi' => $cektransaksi,
        ]);
    }

    public function doRequestPostponeAgree(Request $request)
    {
        // dd($request);
        $user = DB::table('users')->where('status', '=', $request->session()->get('user'))->get();
        $berkas = $request->file("berkas");
        $id = uniqid();
        $berkas->storePubliclyAs('uploaded', $berkas->getClientOriginalName(), "public");
        DB::table('pengajuan_penundaan')->insert([
            "id" => $id,
            "name" => $user[0]->id,
            "tanggal" => date('Y-m-d'),
            "berkas" => $berkas->getClientOriginalName(),
            "status" => "pending",
            "keterangan" => 'permintaan penundaan biaya',
            "nama_penyelenggara" => '',
            "judul_penyelenggara" => '',
            "lokasi_penyelenggara" => '',
            "tanggal_penyelenggara" => date('Y-m-d'),
        ]);
        DB::table('trx')->insert([
            'rinciantagihan_id' => $request->parent_id,
            'penundaan_id' => $id,
            'user_id' => $user[0]->id,
            'tanggal' => date('Y-m-d')
        ]);
        if (
            $this->pengajuanDana->ajukanSuratPenundaan([
                "id" => $id,
                "nama" => $user[0]->id,
                "tanggal" => date('Y-m-d'),
                "berkas" => $berkas->getClientOriginalName(),
                "jenis_pengajuan" => 'penundaan biaya',
                "status" => "pending",
                "disetujui" => "-",
                "diteruskan" => "-"
            ])
        ) {
            return redirect()->route('user index');
            # code...
        };

        return false;
    }

    public function editProfile(Request $request)
    {
        $user = DB::table('users')->where('name', '=', $request->session()->get('nama'))->get();
        $cicilan = DB::table('request_postpone_agreement')->where('id', '=', $request->parent_id)->get();
        // dd($cicilan);
        $data_user = DB::table('users')->where('status','=',$request->session()->get('user'))->get();
        $cek_detail_user = DB::table('detail_user')->where('id', '=', $data_user[0]->id)->get();
        return view('user.editProfile_v', [
            'judul' => 'Profil Mahasiswa',
            'add' => route('ajukan surat'),
            'pengguna' => $request->session()->get('nama'),
            'jabatan' => $user[0]->keterangan,
            'request' => route('ajukan surat'),
            'all' => route('user index'),
            'inbox' => route('user inbox'),
            'pending' => route('user pending'),
            'reject' => route('user reject'),
            'add' => route('ajukan surat'),
            'data_user' => $cek_detail_user
        ]);
    }

    public function doEditProfile(Request $request)
    {
        // dd($request->id);
        $data_user = DB::table('users')->where('status','=',$request->session()->get('user'))->get();
        $cek_detail_user = DB::table('detail_user')->where('id', '=', $data_user[0]->id)->count();

        if ($cek_detail_user > 0) {
            DB::table('detail_user')->where('id', '=', $data_user[0]->id)->update([
                "nim" => $request->nim_mahasiswa,
                "fakultas" => $request->fakultas,
                "semester" => $request->semester_ipk_mahasiswa,
                "alamat_rumah_mahasiswa" => $request->alamat_mahasiswa,
                "telepon_mahasiswa" => $request->telepon_rumah_mahasiswa,
                "pekerjaan_mahasiswa" => $request->pekerjaan_jabatan_mahasiswa,
                "alamat_kantor_mahasiswa" => $request->alamat_kantor_mahasiswa,
                "nama_orang_tua" => $request->nama_orang_tua_mahasiswa,
                "alamat_rumah_orang_tua" => $request->alamat_orang_tua_mahasiswa,
                "telepon_orang_tua" => $request->telepon_rumah_orang_tua_mahasiswa,
                "pekerjaan_orang_tua" => $request->pekerjaan_jabatan_orang_tua_mahasiswa,
                "alamat_kantor_orang_tua" => $request->alamat_orang_tua_mahasiswa,
            ]);
            return redirect()->route('editProfile');
        } else {
            DB::table('detail_user')->insert([
                "id" => $data_user[0]->id,
                "nim" => $request->nim_mahasiswa,
                "fakultas" => $request->fakultas,
                "semester" => $request->semester_ipk_mahasiswa,
                "alamat_rumah_mahasiswa" => $request->alamat_mahasiswa,
                "telepon_mahasiswa" => $request->telepon_rumah_mahasiswa,
                "pekerjaan_mahasiswa" => $request->pekerjaan_jabatan_mahasiswa,
                "alamat_kantor_mahasiswa" => $request->alamat_kantor_mahasiswa,
                "nama_orang_tua" => $request->nama_orang_tua_mahasiswa,
                "alamat_rumah_orang_tua" => $request->alamat_orang_tua_mahasiswa,
                "telepon_orang_tua" => $request->telepon_rumah_orang_tua_mahasiswa,
                "pekerjaan_orang_tua" => $request->pekerjaan_jabatan_orang_tua_mahasiswa,
                "alamat_kantor_orang_tua" => $request->alamat_orang_tua_mahasiswa,
            ]);
            return redirect()->route('editProfile');
        }
    }
}
