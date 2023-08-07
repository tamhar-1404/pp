<?php

namespace App\Http\Controllers;

use App\Models\ProfileGuru;
use App\Models\Guru_admin;
use App\Models\Siswa;
use App\Http\Requests\StoreProfileGuruRequest;
use App\Http\Requests\UpdateProfileGuruRequest;
use App\Models\User;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::where('sekolah' , Auth()->user()->sekolah)->get();
        $id_guru = Guru_admin::where('name', Auth()->user()->name)->first()->id;
        $guru = Guru_admin::where('name' , Auth()->user()->name)->get();
        return view('profileguru.index' , compact('guru' , 'siswa', 'id_guru'));
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
     * @param  \App\Http\Requests\StoreProfileGuruRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileGuruRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileGuru  $profileGuru
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileGuru $profileGuru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileGuru  $profileGuru
     * @return \Illuminate\Http\Response
     */
    public function edit($profileGuru)
    {
        $guru = Guru_admin::where('id', $profileGuru)->get();
        $profil_guru = Guru_admin::find($profileGuru);
        return view('profileguru.editprofile', compact('guru', 'profil_guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileGuruRequest  $request
     * @param  \App\Models\ProfileGuru  $profileGuru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $profileGuru)
    {
        if ($request->has('image')) {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg',
                'email' => 'required|email|unique:users,email,' . Auth::user()->id,
                'no' => 'required|min:11|max:12',
                'alamat' => 'required',
            ]);
            $file = $request->file('image');
            $fileName = $file->hashName();
            if (Storage::exists('public/guru_image/' . $fileName)) {
                Storage::delete('public/guru_image/' . $fileName);
            }
            $file->storeAs('public/guru_image/', $fileName);
            if (Auth::user()->email != $request->email) {
                User::where('name', Auth::user()->name)->update([
                    'email' => $request->email,
                ]);
            }
            Guru_admin::where('name', Auth::user()->name)->update([
                'email' => $request->email,
                'alamat' => $request->alamat,
                'no' => $request->no,
                'image' => $fileName,
            ]);
            return redirect()->route('profileguru.index')->with('success', 'Berhasil memperbarui profil');
        }
        else {
            $request->validate([
                'email' => 'required|email|unique:users,email,' . Auth::user()->id,
                'no' => 'required|min:11|max:12',
                'alamat' => 'required',
            ]);
            Guru_admin::where('name', Auth::user()->name)->update([
                'email' => $request->email,
                'alamat' => $request->alamat,
                'no' => $request->no,
            ]);
            if (Auth::user()->email != $request->email) {
                $user_id = Auth::user()->id;
                User::find($user_id)->update([
                    'email' => $request->email,
                ]);
            }

            return redirect()->route('profileguru.index')->with('success', 'Berhasil memperbarui profil');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileGuru  $profileGuru
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileGuru $profileGuru)
    {
        //
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'old_password' => 'required|min:6',
            'password' => 'required|min:6|confirmed',
        ], [
            'old_password.required' => 'Password lama tidak boleh kosong',
            'old_password.min' => 'Password minimal 6',
            'password.min' => 'Password minimal 6',
        ]);
        $user_id = auth()->user()->id;
        if (Hash::check($request->old_password, User::find($user_id)->password)) {
            User::find($user_id)->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('profileguru.index')->with('success', 'Berhasil mengganti password');
        } else {
            return back()->with('error', 'Password salah');
        }
    }
}
