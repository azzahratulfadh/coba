<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use PDF;

class JurusanDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.jurusan.index',[
            'jurusans'=>Jurusan::latest()->paginate(8)

        
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.jurusan.create');
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
            'nama' => 'required'
        ]);
         Jurusan::create($validatedData);
         return redirect('/jurusandashboard')->with('pesan','Data Berhasil Diinputkan');
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
    public function edit(jurusan $jurusan, $id)
    {
        return view('dashboard.jurusan.edit',[
            'jurusans' =>Jurusan::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jurusan $jurusan, $id)
    {
         $validatedData=$request->validate([
            'nama' => 'required'
        ]);
          Jurusan::where('id',$id)->update($validatedData);
         return redirect('/jurusandashboard')->with('pesan','Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(jurusan $jurusan, $id)
    {
        Jurusan::destroy($id);
        return redirect('/jurusandashboard')->with('pesan','Data Berhasil Dihapus');
    }

    public function cetakjurusan()
    {
        $jurusan = Jurusan::select('*')
        ->get();
        $pdf = PDF::loadView('dashboard.jurusan.cetakjurusan',['jurusans' => $jurusan]);
        return $pdf->stream('Laporan-Data-Jurusan.pdf');
    }
}