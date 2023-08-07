<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Mail\IzinBerakhir;
use App\Mail\DataizinEmail;
use App\Mail\tolakdataEmail;
use App\Models\ApprovalIzin;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\TerimaizinEmail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreApprovalIzinRequest;
use App\Http\Requests\UpdateApprovalIzinRequest;
use Illuminate\Support\Facades\Storage;



class ApprovalIzinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request)
     {
        if(auth()->user()->role == 'Admin'){
            $today = date('Y-m-d');
            ApprovalIzin::whereDate('sampai', '<=', $today)->update(['status' => 'terimaabsen', 'status2' => '']);

            $menunggu = ApprovalIzin::where('status', 'menunggu')->get();
            $terima = ApprovalIzin::where('status2', 'izin')->get();

            if ($request->has('cari')) {
                $keyword = $request->cari;
                $aprovals = ApprovalIzin::where('nama', 'LIKE', '%' . $keyword . '%')->orWhere('sekolah', 'LIKE', '%' . $keyword . '%')->paginate(10);
                return view('approvalizin.index', compact('menunggu', 'terima', 'aprovals'));
            }

            $aprovals = ApprovalIzin::latest()->paginate(10);
            return view('approvalizin.index', compact('menunggu', 'terima', 'aprovals'));

        }
        else{
            return redirect()->back();
        }
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ApprovalIzin $izin)
    {

        return view('approvalizin.content');
    }

    /**
     * Store a newly created resource in Storage.
     *
     * @param  \App\Http\Requests\StoreApprovalIzinRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ApprovalIzin $approvalIzin)
    {
        $this->validate($request, [
            'dari' => 'required|date|after_or_equal:today',
            'sampai' => 'required|date|after:today',
            'keterangan' => 'required',
            'deskripsi' => 'required',
            'bukti' => 'required|image|mimes:jpeg,jpg,png'
        ]);
        if($request-> dari > $request->sampai ){
            return redirect()->back()->with('error', 'tanggal izin tidak valid');
        }
        $image = $request->file('bukti');
        $image->storeAs('public/bukti_izin', $image->hashName());
        $nama = Auth::user()->name;
        $dari = $request->dari;
        $tanggal_dari = Carbon::parse($dari)->format('Y-m-d');
        $data = ApprovalIzin::where('nama', $nama)->where('tanggal', $dari)->exists();
        if ($data) {
            return redirect()->back()->with('error', 'Anda sudah memiliki izin pada tanggal ini');
        }
        $image = $request->file('bukti');
        $image->storeAs('public/bukti_izin', $image->hashName());

        $user = Auth::user();
        ApprovalIzin::create([
            'nama' => $user->name,
            'sekolah' => $user->sekolah,
            'foto' => $user->Siswa->foto_siswa,
            'email' => $user->email,
            'dari' => $request->dari,
            'sampai' => $request->sampai,
            'keterangan' => $request->keterangan,
            'deskripsi' => $request->deskripsi,
            'status' => 'menunggu',
            'status2' => 'menunggu',
            'bukti' => $image->hashName(),
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'jam' => Carbon::now()->format('H:i'),
        ]);

        return redirect()->route('absensi_siswa.index')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ApprovalIzin  $approvalIzin
     * @return \Illuminate\Http\Response
     */
    public function tolak(Request $request, $id)
    {
         //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ApprovalIzin  $approvalIzin
     * @return \Illuminate\Http\Response
     */
    public function edit(ApprovalIzin $approval)
    {
        //
    }

    /**
     * Update the specified resource in Storage.
     *
     * @param  \App\Http\Requests\UpdateApprovalIzinRequest  $request
     * @param  \App\Models\ApprovalIzin  $approvalIzin
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id, ApprovalIzin $approvalIzin)
    {
        $cek = $request->keterangan;
        $email = $request->input('email');
        $alasan = $request->input('alasan');
        if ($cek == 'terima') {
            $izin = ApprovalIzin::findOrFail($id);
            if ($izin->status === 'menunggu') {
                $izin->status = 'terimaabsen';
                $izin->status2 = 'izin';
                $izin->save();
            }
            if ($izin->dari === Carbon::today()->toDateString()) {
                $izinDari = Carbon::tomorrow();
            } else {
                $izinDari = Carbon::parse($izin->dari);
            }
            $izinSampai = Carbon::parse($izin->sampai);
            $tanggalMulai = $izinDari;
            $tanggalBerakhir = $izinSampai;
            while ($tanggalMulai <= $tanggalBerakhir) {
                $existingRecord = ApprovalIzin::where([
                    'nama' => $izin->nama,
                    'sekolah' => $izin->sekolah,
                    'email' => $izin->email,
                    'dari' =>  $tanggalMulai->toDateString(),
                ])->first();
                if (!$existingRecord) {
                    ApprovalIzin::create([
                        'nama' => $izin->nama,
                        'sekolah' => $izin->sekolah,
                        'email' => $izin->email,
                        'dari' =>  $tanggalMulai->toDateString(),
                        'sampai' => $izin->sampai,
                        'keterangan' => $izin->keterangan,
                        'bukti' => $izin->bukti,
                        'deskripsi' => $izin->deskripsi,
                        'tanggal' => $tanggalMulai->toDateString(),
                        'jam' => $request->filled('jam') ? $request->jam : now()->format('H:i'),
                        'status' => $izin->status,
                        'status2' => $izin->status2,
                    ]);
                }
                $tanggalMulai->addDay();
            }
        }
        if ($cek == 'tolak') {
            $izin = ApprovalIzin::findOrFail($id);
            $mailData = [
                'content' => 'Absensi Anda telah ditolak dengan alasan: ' . $alasan,
            ];
            Mail::to($email)->send(new tolakdataEmail($mailData));
            $izin->delete();
            return back()->with("success", "Berhasil menolak izin");
        }
         return redirect()->route('approvalizin.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /**
     * Remove the specified resource from Storage.
     *
     * @param  \App\Models\ApprovalIzin  $approvalIzin
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApprovalIzin $approvalIzin)
    {
        //
    }

    public function absen_siswa_pdf(){
        set_time_limit(0);
        $data = ApprovalIzin::where('nama',Auth::user()->name)->get();
        $pdf = Pdf::loadView('desain_pdf.absensi', ['data' => $data]);
        return $pdf->download('absensi.pdf');
    }
    public function izin_update(Request $request) {
        // dd($request->all());
        if ($request->has('bukti')) {
            $bukti_lama = ApprovalIzin::where('nama', $request->nama)->first()->bukti;
            if (file_exists(asset('bukti_izin' . $bukti_lama))) {
                unlink(asset('bukti_izin' . $bukti_lama));
            }
            $image = $request->file('bukti');
            $iname = $image->hashName();
            $image->storeAs('public/bukti_izin', $iname);
            ApprovalIzin::where('nama', $request->nama)->where('keterangan', 'izin')->update([
                'deskripsi' => $request->deskripsi,
                'bukti' => $iname,
            ]);
            return back()->with(['success' => 'Berhasil mengedit izin']);
        } else {
            ApprovalIzin::where('nama', $request->nama)->where('keterangan', 'izin')->update([
                'deskripsi' => $request->deskripsi,
            ]);
            return back()->with(['success' => 'Berhasil mengedit izin']);
        }
    }
}
