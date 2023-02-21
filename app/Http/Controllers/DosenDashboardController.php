<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class DosenDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.dosen.index',[
            'dosens' => Dosen::latest()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.dosen.create',[
            'jurusans' => Jurusan::All()
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
        $validateData=$request->validate([
            'nip' => 'required|unique:dosens|size:10',
            'nama' => 'required',
            'jurusan_id' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'alamat' => 'required'
        ]);
        Dosen::create($validateData);
        return redirect('/dosendashboard')->with('pesan','Data berhasil ditambahkan');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen, $id)
    {
        return view('dashboard.dosen.edit',[
            'dosens'=> Dosen::find($id),
            'jurusans' => Jurusan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen, $id)
    {
        $validateData=$request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jurusan_id' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'alamat' => 'required'
        ]);
        Dosen::where('id',$id)->update($validateData);
         return redirect('/dosendashboard')->with('pesan','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen, $id)
    {
        Dosen::destroy($id);
        return redirect('/dosendashboard')->with('pesan','Data berhasil dihapus');
    }
}
