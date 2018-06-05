<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mobil;
use App\galeri;
use Session;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil = mobil::all();
        return view('mbl.index',compact('mobil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mobil = mobil::all();
        $gl = galeri::all();
        return view('mbl.create',compact('mobil','gl'));
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
        'nama' => 'required',
        'plat_no' => 'required|unique:mobils',
        'kapasitas' => 'required',
        'harga' => 'required',
        'jenis' => 'required',
        'warna' => 'required',
        'tahun' => 'required',
        'type' => 'required',
        'id_galeri' => 'required'
        ]);
        $mobil = mobil::create($request->all());
        return redirect()->route('bil.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobil = mobil::findOrFail($id);
        return view('mbl.show',compact('mobil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobil = mobil::findOrFail($id);
        $gl = galeri::all();
        $selectedGaleri = mobil::findOrFail($id)->id_galeri;
        return view('mbl.edit',compact('mobil','gl','selectedGaleri'));
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
        $this->validate($request,[
            'nama' => 'required',
            'plat_no' => 'required',
            'kapasitas' => 'required',
            'harga'=> 'required',
            'jenis' => 'required',
            'warna' => 'required',
            'tahun' => 'required',
            'type' => 'required',
            'id_galeri' => 'required'
        ]);
        
        $mobil = mobil::find($id);
        $mobil->update($request->all());
        return redirect()->route('bil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil = mobil::findOrFail($id);
        $mobil->delete();
        return redirect()->route('bil.index');
    }
}
