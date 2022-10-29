<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('back.karyawan.index',[
            'User'=> $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user= User::all();
        return view('back.karyawan.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'profil'=>$request->file('profil')->store('profil'),
            'level'=>$request->level,
        ]);
    return redirect()->route('karyawan.index')->with(['BERHASIL'=>'DATA BERHASIL DISIMPAN']);
    //     $this->validate($request,[
    //         'name' => 'required||min:3',
    //         'email' => 'required|email:dns',
    //         'password'=>'required',
    //    ]);

    //    $data= $request->all();
      
    //    $data['profil'] = $request->file('profil')->store('profil');
    //    User::create($data );
    //    return redirect()->route('karyawan.index')->with(['BERHASIL'=>'DATA BERHASIL DISIMPAN']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
       
        return view('back.karyawan.edit',[
            'User'=>$user,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (empty($request->file('profil'))) {
            $user = User :: find($id);
            $user->update([
            'name' => $request->name,
            'email' => $request->emali,
            'password' => Hash::make($user['password']),
            'level' => $request->level,
            ]);
            return redirect()->route('karyawan.index')->with(['BERHASIL'=>'DATA BERHASIL DIUPDATE']);
        }else{
            $user = User :: find($id);
            Storage::delete([$user->profil]);
            $user->update([
            'name' => $request->name,
            'email' => $request->emali,
            'password' => $request->password,
            'level' => $request->level,
            'profil' => $request->file('profil')->store('profil'),
            ]);
            return redirect()->route('karyawan.index')->with(['BERHASIL'=>'DATA BERHASIL DIUPDATE']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=user::find($id);
        Storage::delete($user->profil);
        $user->delete();
        return redirect()->route('karyawan.index')->with(['BERHASIL'=>'DATA BERHASIL HAPUS']);
    }
}
