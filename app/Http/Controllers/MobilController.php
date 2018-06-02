<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mobil;

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
        return view('mobil.index',compact('mobil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('mbl.create');
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
        'tahun' => 'required'
        'type' => 'required'
        
        ]);
        $mobil = new mobil;
        $mobil->nama = $request->nama;
        $mobil->plat_no= $request->plat_no;
        $mobil->kapasitas = $request->kapasitas;
        $mobil->harga = $request->harga;
        $mobil->jenis = $request->jenis;
        $mobil->warna = $request->warna;
        $mobil->tahun = $request->tahun;
        $mobil->type = $request->type;
        $mobil->save();
        session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"succes <b>$mobil->nama</b>"]);
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
        return view('mbl.edit',compact('mobil'));
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
            'type' => 'required'
        ]);
        
        $mobil = mobil::findOrFail($id);
        $mobil->nama = $request->nama;
        $mobil->plat_no= $request->plat_no;
        $mobil->kapasitas = $request->kapasitas;
        $mobil->harga = $request->harga;
        $mobil->jenis = $request->jenis;
        $mobil->warna = $request->warna;
        $mobil->tahun = $request->tahun;
        $mobil->type = $request->type;
        $mobil->save();
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
