<?php

namespace App\Http\Controllers;

use App\Models\TopUp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TerimaTopup;
use App\Http\Requests\StoreTopUpRequest;
use App\Http\Requests\UpdateTopUpRequest;
use App\Mail\Topup as MailTopup;

class TopUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $keyword = $request->cari;
            $TopUp = TopUp::Where('tanggal', 'LIKE', '%' . $keyword . '%')->
            where('status', 'menunggu')->latest()->paginate(10);
            return view('TopUp.index', compact('TopUp'));

            $TopUp->appends(['cari' => $keyword]);


            return view('TopUp.index', compact('TopUp'));
        }

        $TopUp = TopUp::where('status', 'menunggu')->latest()->paginate(10);
        return view('TopUp.index', compact('TopUp'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTopUpRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
       //
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TopUp  $topUp
     * @return \Illuminate\Http\Response
     */
    public function show(TopUp $topUp)
    {
        dd('succes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TopUp  $topUp
     * @return \Illuminate\Http\Response
     */
    public function edit(TopUp $topUp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTopUpRequest  $request
     * @param  \App\Models\TopUp  $topUp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TopUp $topUp, $id)
    {
        $topup = TopUp::find($id);
        $user = $topup->user;
        $this->validate($request, [
            'saldo' => 'required|numeric',
        ], [
            'saldo.required' => 'Saldo tidak boleh kosong',
            'saldo.numeric' => 'Saldo hanya boleh angka',
        ]);
        $saldoLama = $user->saldo;

        $saldoBaru = $request->saldo;

        $saldoAkhir = $saldoLama + $saldoBaru;

        $user->saldo = $saldoAkhir;
        $user->save();

        $topup->update([
            'status' => $request->status
        ]);

        // $emailData = [
        //     'topup' => $topup,
        //     'user' => $user
        // ];
        $saldo = ['saldo'=> $request->saldo, 'total_saldo'=>$user->saldo, 'name'=>$user->name];
        Mail::to($user->email)->send(new TerimaTopup($saldo));

        return redirect()->back()->with('success', 'Berhasil menerima top up');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TopUp  $topUp
     * @return \Illuminate\Http\Response
     */

    public function tolaktopup (){
        dd('succes');
    }

    public function destroy(Request $request, $topUp)
    {
      //
    }
}
