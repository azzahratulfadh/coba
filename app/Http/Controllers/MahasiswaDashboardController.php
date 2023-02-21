<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use PDF;

class MahasiswaDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.mahasiswa.index',[
            'mahasiswas'=> Mahasiswa::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.mahasiswa.create',[
            'jurusans'=> Jurusan::all()
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
            'nim' => 'required|unique:mahasiswas|size:8',
            'nama' => 'required',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan_id' => 'required',
            'alamat' => 'required'

        ]);
        Mahasiswa::create($validatedData);
        return redirect('/mahasiswadashboard')->with('pesan','Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa,$id)
    {
        return view('dashboard.mahasiswa.edit',[
            'mahasiswas' => Mahasiswa::find($id),
            'jurusans' => Jurusan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa, $id)
    {
        $validatedData=$request->validate([
            'nim' => 'required',
            'nama' => 'required|min:3',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan_id' => 'required',
            'alamat' =>''
        ]);

        Mahasiswa::where('id',$id)
            ->update($validatedData);
            return redirect('/mahasiswadashboard')->with('pesan','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
     public function destroy(Mahasiswa $mahasiswa, $id)
    {
        Mahasiswa::destroy($id);
        return redirect('/mahasiswadashboard')->with('pesan','Data berhasil dihapus');
    }

    public function cetakmahasiswa()
    {
        $mahasiswa = Mahasiswa::select('*')
        ->get();
        $pdf = PDF::loadView('dashboard.mahasiswa.cetakmahasiswa',['mahasiswas' => $mahasiswa]);
        return $pdf->stream('Laporan-Data-Mahasiswa.pdf');
    }
}

