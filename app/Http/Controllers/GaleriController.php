<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\galeri;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gl = galeri::all();
        return view('gal.index',compact('gl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('gal.create');
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
            'foto' => 'required'
        ]);
        $gl = new galeri;
        $gl->nama = $request->nama;
        $gl->foto= $request->foto;
        $gl->save();
        return redirect()->route('glr.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gl = galeri::findOrFail($id);
        return view('gal.show',compact('gl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gl = galeri::findOrFail($id);
        return view('gal.edit',compact('gl'));
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
            'foto' => 'required'
        ]);
        
        $gl = galeri::findOrFail($id);
        $gl->nama = $request->nama;
        $gl->foto= $request->foto;
        $gl->save();
        return redirect()->route('glr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gl = galeri::findOrFail($id);
        $gl->delete();
        return redirect()->route('glr.index');
    }
}
