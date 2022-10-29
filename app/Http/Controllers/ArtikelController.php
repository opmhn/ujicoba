<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\kategori;
use App\Models\Wilayah;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = artikel::all();
        $Wilayah = Wilayah::all();
        return view('back.artikel.index',[
            'artikel'=> $artikel,
            'wilayah' => $Wilayah,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        $Wilayah = Wilayah::all();
        return view('back.artikel.create',compact('kategori','Wilayah'));
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
            'judul' => 'required',
       ]);

       $data= $request->all();
       $data['slug']=Str::slug($request->judul) ;
       $data['user_id']  = Auth::id();
       $data['views']  = 0;
       $data['gambar_artikel'] = $request->file('gambar_artikel')->store('artikel');
       artikel::create($data );
       return redirect()->route('artikel.index')->with(['BERHASIL'=>'DATA BERHASIL DISIMPAN']);
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
        $artikel=artikel::find($id);
        $kategori =kategori::all();
        $Wilayah = Wilayah::all();
        return view('back.artikel.edit',[
            'artikel'=>$artikel,
            'Wilayah'=>$Wilayah,
            'kategori'=>$kategori
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
    //     $this->validate($request,[
    //         'judul' => 'required',
    //    ]);
        if (empty($request->file('gambar_artikel'))) {
            $artikel = artikel :: find($id);
            $artikel->update([
            'judul' => $request->judul,
            'body' => $request->body,
            'slug'=> Str::slug($request->judul),
            'kategori_id' => $request->kategori_id,
            'wilayah_id' => $request->wilayah_id,
            'is_active' => $request->is_active,
            'user_id' => Auth::id(),
            ]);
            return redirect()->route('artikel.index')->with(['BERHASIL'=>'DATA BERHASIL DIUPDATE']);
        }else{
            $artikel = artikel :: find($id);
            Storage::delete([$artikel->gambar_artikel]);
            $artikel->update([
                'judul' => $request->judul,
                'body' => $request->body,
            'slug'=> Str::slug($request->judul),
            'kategori_id' => $request->kategori_id,
            'wilayah_id' => $request->wilayah_id,
            'is_active' => $request->is_active,
            'user_id' => Auth::id(),
            'gambar_artikel' => $request->file('gambar_artikel')->store('artikel'),
            ]);
            return redirect()->route('artikel.index')->with(['BERHASIL'=>'DATA BERHASIL DIUPDATE']);
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
        $artikel=artikel::find($id);
        Storage::delete($artikel->gambar_artikel);
        $artikel->delete();
        return redirect()->route('artikel.index')->with(['BERHASIL'=>'DATA BERHASIL HAPUS']);
    }
}
