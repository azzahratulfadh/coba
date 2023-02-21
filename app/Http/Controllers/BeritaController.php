<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('berita.index',[
            'beritas' => Berita::latest()->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.create',[
            'kategoris' => Kategori::All()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'title'=>'required',
            'kategori_id'=>'required',
            'file_upload'=>'nullable|image|mimes:png,jpeg',
            'body'=>'required'
        ]);
        if($request->hasFile('file_upload')){
            $namaFile='img_'.time().'_'.$request->file_upload->getClientOriginalName();
            $request->file_upload->move('images',$namaFile);
        }
        else{
            $namaFile='';
        }
        $validatedData['file_upload']=$namaFile;
        $validatedData['user_id']=auth()->user()->id;
        $validatedData['excerpt']=Str::limit(strip_tags($request->body),100);
        Berita::create($validatedData);
        return redirect('/berita')->with('pesan','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita, $id)
    {
        return view('berita.show',[
            'berita' => Berita::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $berita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        //
    }
}
