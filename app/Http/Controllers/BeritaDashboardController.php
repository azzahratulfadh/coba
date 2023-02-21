<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.berita.index',[
            'beritas' => Berita::latest()->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.berita.create',[
            'kategoris' => Kategori::all()
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
        //
        $validatedData = $request->validate([
            'title' => 'required',
            'file_upload' => 'nullable|image',
            'kategori_id' => 'required',
            'body' => 'required',


        ]);
        if ($request->hasFile('file_upload')){
            $namaFile='img_'.time().'_'.$request->file_upload->getClientOriginalName();
            $request->file_upload->move('img', $namaFile);
        }
        else {
            $namaFile='';
        }
        $validatedData['file_upload']=$namaFile;
        $validatedData['excerpt']=Str::limit(strip_tags($request->body),2);
        $validatedData['user_id']=1;
        Berita::create($validatedData);
        return redirect('/beritadashboard')->with('pesan','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(berita $berita, $id)
    {
        //
        return view('dashboard.berita.edit',[
            'kategoris' => Kategori::all(),
            'beritas' => Berita::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, berita $berita, $id)
    {
        $validatedData=$request->validate([
            'title'=>'required',
            'body'=>'required',
            'kategori_id'=>'required',
            'file_upload'=>'nullable|image|mimes:png,jpg'

        ]);
        if ($request->hasFile('file_upload')) {
            $namaFile='img_'.time().'_'.$request->file_upload->getClientOriginalName();
            $request->file_upload->move('images',$namaFile);
        }
        else{
            $namaFile='';
        }

        $validatedData['file_upload']=$namaFile;
        $validatedData['user_id']=auth()->user()->id;
        $validatedData['excerpt']=Str::limit(strip_tags($request->body),100);
        Berita::where('id',$id)->update($validatedData);
        return redirect('/beritadashboard')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(berita $berita, $id)
    {
        Berita::destroy($id);
        return redirect('/beritadashboard')->with('pesan','Data berhasil dihapus');
    }
}
