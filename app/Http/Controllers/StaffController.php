<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $data = DB::table('request_postpone_agreement')->get();
        // $data_pencairan = DB::table('trx')
        //     ->join('pencairan_dana', 'trx.pencairan_id', '=', 'pencairan_dana.id')
        //     ->select('pencairan_dana.*')->get();
        $data_laporan = DB::table('request_postpone_agreement')->join('users','users.id','=','request_postpone_agreement.name')->select('request_postpone_agreement.*','users.name')->get();
        $data_permintaan = DB::table('permintaan_pencairan_dana')->get();
        $data_pencairan = DB::table('pencairan_dana')->get();
        return view('tatausaha.index', [
            'judul' => 'Semua Surat',
            'all' => route('staff index'),
            'inbox' => route('staff inbox'),
            'pending' => route('staff pending'),
            'reject' => route('staff reject'),
            'pengajuan_dana' => $data,
            'pencairan_dana_all' => [],
            'laporan_dana' => $data_laporan,
            'data_permintaan' => $data_permintaan,

            'pengguna' => $request->session()->get('user'),
            'total' => [
                'semua' => DB::table('request_postpone_agreement')->count(),
                'setuju' => DB::table('request_postpone_agreement')->where('status', '=', 'setuju')->count(),
                'pending' => DB::table('request_postpone_agreement')->where('status', '=', 'pending')->count(),
                'tolak' => DB::table('request_postpone_agreement')->where('status', '=', 'tolak')->count(),
            ]
        ]);
    }

    public function inbox(Request $request)
    {
        $data_pencairan = DB::table('trx')
            ->join('pencairan_dana', 'trx.pencairan_id', '=', 'pencairan_dana.id')
            ->select('pencairan_dana.*')->get();
        $data_laporan = DB::table('request_postpone_agreement')->get();
        $data_permintaan = DB::table('permintaan_pencairan_dana')->get();
        $data_permintaan = DB::table('permintaan_pencairan_dana')->get();

        $data_pencairan = DB::table('pencairan_dana')->get();
        $user = $request->session()->get('user');
        $data = DB::table('pengajuan_dana_proses')->get();
        return view('tatausaha.approve', [
            'judul' => 'Surat Masuk',
            'pengguna' => $user,
            'all' => route('staff index'),
            'inbox' => route('staff inbox'),
            'pending' => route('staff pending'),
            'reject' => route('staff reject'),
            'pengajuan_dana' => $data,
            "pencairan_dana_all" => $data_pencairan,
            'laporan_dana' => $data_laporan,
            'data_permintaan' => $data_permintaan,
        ]);
    }


    public function pending(Request $request)
    {
        $user = $request->session()->get('user');
        $data = DB::table('pengajuan_dana_proses')->get();
        return view('tatausaha.pending', [
            'pengguna' => $user,
            'judul' => 'Surat Pending',
            'all' => route('staff index'),
            'inbox' => route('staff inbox'),
            'pending' => route('staff pending'),
            'reject' => route('staff reject'),
            'pengajuan_dana' => $data,
        ]);
    }

    public function reject(Request $request)
    {
        $user = $request->session()->get('user');
        $data = DB::table('pengajuan_dana_proses')->get();
        return view('tatausaha.reject', [
            'pengguna' => $user,
            'judul' => 'Surat Reject',
            'all' => route('staff index'),
            'inbox' => route('staff inbox'),
            'pending' => route('staff pending'),
            'reject' => route('staff reject'),
            'pengajuan_dana' => $data,
        ]);
    }

    public function preview(Request $request)
    {
        $param = $request->id;
        $data = DB::table('request_postpone_agreement')->join('users','users.id','=','request_postpone_agreement.name')->where('request_postpone_agreement.id', '=', $param)->select('request_postpone_agreement.*','users.name')->get();
        $user = $request->session()->get('user');
        // dd($data);
        switch ($data[0]->status) {
            case 'setuju':
                # code...
                $cek_trx = DB::table('trx')->where('penundaan_id','=',$request->id)->count();
                switch ($cek_trx) {
                    case '1':
                        # code...
                        return view('component.tu.preview_setuju_agree', [
                            'pengguna' => $user,
                            'judul' => 'Detail Surat',
                            'all' => route('staff index'),
                            'inbox' => route('staff inbox'),
                            'pending' => route('staff pending'),
                            'reject' => route('staff reject'),
                            'pdf' => $data[0]->id,
                            'add' => route('ajukan surat'),
                            'pengajuan_penundaan' => $data,
        
                        ]);
                        break;
                    case '0':
                        return view('component.tu.preview_setuju', [
                            'pengguna' => $user,
                            'judul' => 'Detail Surat',
                            'all' => route('staff index'),
                            'inbox' => route('staff inbox'),
                            'pending' => route('staff pending'),
                            'reject' => route('staff reject'),
                            'pdf' => $data[0]->id,
                            'add' => route('ajukan surat'),
                            'pengajuan_penundaan' => $data,
        
                        ]);
                        break;
                    default:
                        # code...
                        break;
                }
                
                break;
            case 'tolak':

                return view('component.tu.preview_tolak', [
                    'pengguna' => $user,
                    'judul' => 'Detail Surat',
                    'all' => route('staff index'),
                    'inbox' => route('staff inbox'),
                    'pending' => route('staff pending'),
                    'reject' => route('staff reject'),
                    'pdf' => $data[0]->id,
                    'add' => route('ajukan surat'),
                    'pengajuan_penundaan' => $data,

                ]);
                break;
            case 'pending':
                if ($data[0]->jenis_pengajuan == "penundaan biaya") {
                    # code...
                    return view('component.tu.preview_pending_agree', [
                        'pengguna' => $user,
                        'judul' => 'Detail Surat',
                        'all' => route('staff index'),
                        'inbox' => route('staff inbox'),
                        'pending' => route('staff pending'),
                        'reject' => route('staff reject'),
                        'pdf' => $data[0]->id,
                        'add' => route('ajukan surat'),
                        'pengajuan_dana' => $data,

                    ]);
                } else if ($data[0]->jenis_pengajuan == "rincian biaya")  {
                    return view('component.tu.preview_pending', [
                        'pengguna' => $user,
                        'judul' => 'Detail Surat',
                        'all' => route('staff index'),
                        'inbox' => route('staff inbox'),
                        'pending' => route('staff pending'),
                        'reject' => route('staff reject'),
                        'pdf' => $data[0]->id,
                        'add' => route('ajukan surat'),
                        'pengajuan_dana' => $data,

                    ]);
                }
                break;
            default:
                # code...
                break;
        }
        // if (DB::table('request_postpone_agreement')->where('id', '=', $param)->count() == 1) {
        //     # code...
        //     if (DB::table('laporan_dana')->where('id', '=', $param)->count() == 1) {
        //         $data = DB::table('request_postpone_agreement')->where('id', '=', $param)->get();

        //         $user = $request->session()->get('user');
        //         return view('component.tu.preview', [
        //             'pengguna' => $user,
        //             'judul' => 'Detail Surat',
        //             'all' => route('user index'),
        //             'inbox' => route('user inbox'),
        //             'pending' => route('user pending'),
        //             'reject' => route('user reject'),
        //             'pdf' => $data[0]->id,
        //             'add' => route('ajukan surat'),
        //             'pengajuan_dana' => $data,

        //         ]);
        //     } else {
        //         $data = DB::table('pengajuan_penundaan')->where('id', '=', $param)->get();
        //         // dd($data);
        //         $user = $request->session()->get('user');
        //         return view('component.tu.preview_pending', [
        //             'pengguna' => $user,
        //             'judul' => 'Detail Surat',
        //             'all' => route('user index'),
        //             'inbox' => route('user inbox'),
        //             'pending' => route('user pending'),
        //             'reject' => route('user reject'),
        //             'pdf' => $data[0]->id,
        //             'add' => route('ajukan surat'),
        //             'pengajuan_dana' => $data,

        //         ]);
        //     }
        // } else {
        //     $data = DB::table('pengajuan_dana_proses')->where('id', '=', $param)->get();
        //     $user = $request->session()->get('user');
        //     $data_detail = DB::table('pengajuan_dana')->where('id', '=', $param)->get();
        //     return view('component.tu.preview', [
        //         'pengguna' => $user,
        //         'judul' => 'Detail Surat',
        //         'all' => route('staff index'),
        //         'inbox' => route('staff inbox'),
        //         'pending' => route('staff pending'),
        //         'reject' => route('staff reject'),
        //         'pdf' => '',
        //         'data_detail' => $data_detail,
        //         'pengajuan_dana' => $data,

        //     ]);
        // }
    }


    public function proses(Request $request)
    {
        // dd($request);
        $user = $request->session()->get('user');
        $id = $request->id;

        if ($request->input('rbAction') == "ya") {
            DB::table('request_postpone_agreement')->where('id', '=', $id)->update([
                'status' => 'setuju',
                'cicilan' => '3',
                'keterangan' => $request->keterangan,
                'total_hutang' => $request->grand_total_debt,
                'disetujui' => 'TU'
            ]);
        } else if ($request->input('rbAction') == "tidak"){
            DB::table('request_postpone_agreement')->where('id', '=', $id)->update([
                'status' => 'tolak',
                'keterangan' => $request->keterangan
            ]);
        }

        $data_penundaan = DB::table('trx')->where('penundaan_id','=',$request->id)->count();
        if ($data_penundaan == "1") {
            # code...
            DB::table('request_postpone_agreement')->where('id','=',$request->id)->update([
                "diteruskan" => "TU",
                "status" => "setuju"
            ]);
            
        }
        // if ($user == "Wadek") {
        //     # code...

        //     DB::table('pengajuan_dana')->where('id', '=', $request->id)->update(
        //         [
        //             'status' => 'setuju',
        //         ]
        //     );
        //     DB::table('pengajuan_dana_proses')->where('id', '=', $request->id)->update(
        //         [
        //             'status' => 'setuju',
        //             'diteruskan' => $request->session()->get('user')
        //         ]
        //     );
        // } else if ($user == 'TU') {
        //     if (DB::table('request_postpone_agreement')->where([['id', '=', $request->id], ['disahkan', '=', 'Wadek']])->count() == 1) {
        //         # code...
        //         $data = DB::table('request_postpone_agreement')->where('id', '=', $request->id)->get();
        //         DB::table('expedisi')->insert([
        //             'id' => $request->id,
        //             'tanggal' => date('Y-m-d'),
        //             'user' => $data[0]->name,
        //             'berkas' => $data[0]->berkas,
        //             'keterangan' => $data[0]->keterangan,
        //         ]);
        //     }
        //     if (DB::table('pengajuan_dana_proses')->where('id', '=', $request->id)->count() == 1) {
        //         # code...
        //         if (DB::table('pengajuan_dana_proses')->where([['id', '=', $request->id], ['disetujui', '=', 'Wadek']])->count() == 1) {
        //             # code...
        //             DB::table('pengajuan_dana_proses')->where('id', '=', $request->id)->update(
        //                 ['dikonfirmasi' => 'TU']
        //             );
        //         } else if (DB::table('pengajuan_dana_proses')->where([['id', '=', $request->id]])->count() == 1) {
        //             # code... {
        //             DB::table('pengajuan_dana_proses')->where('id', '=', $request->id)->update(
        //                 ['diteruskan' => 'TU']
        //             );
        //         } else {
        //         }
        //     }
        //     if (DB::table('request_postpone_agreement')->where([['id', '=', $request->id], ['status', '=', 'setuju']])->count() == 1) {
        //         # code...
        //         DB::table('request_postpone_agreement')->where('id', '=', $request->id)->update(
        //             [
        //                 'dikonfirmasi' => "TU",
        //             ]
        //         );
        //     } else {
        //         DB::table('request_postpone_agreement')->where('id', '=', $request->id)->update(
        //             [
        //                 'diteruskan' => "TU",
        //             ]
        //         );
        //     }
        // }
        return redirect()->route('staff index');
    }
}
