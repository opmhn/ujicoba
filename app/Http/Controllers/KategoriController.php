<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = kategori::all();
        return view('back.kategori.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
            'nama_kategori' => 'required',
       ]);
       $kategori=kategori::create([
        'nama_kategori'=>$request->nama_kategori,
        'slug'=>Str::slug($request->nama_kategori,)   
       ]);
       Alert:: success('BERHASIL','BERHASIL DISIMPAN');
       return redirect()->route('kategori.index');
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
         $kategori=kategori::find($id);
        return view('back.kategori.edit',compact('kategori'));
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
       $data = $request->all();
       $data ['slug']=Str::slug($request->nama_kategori);

       $kategori=kategori::findOrFail($id);
       $kategori->update($data);

       Alert:: info('BERHASIL','BERHASIL DIEDIT');
       return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori=kategori::find($id);

        $kategori->delete();
        Alert:: success('BERHASIL','BERHASIL DIHAPUS');
        return redirect()->route('kategori.index')->with(['BERHASIL'=>'DATA BERHASIL HAPUS']);
    }
}
