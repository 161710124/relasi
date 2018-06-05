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
        $gl = galeri::create($request->except('foto'));
        if ($request->hasFile('foto')) {
        $uploaded_logo = $request->file('foto');
        $extension = $uploaded_logo->getClientOriginalExtension();
        $filename = md5(time()) . '.' . $extension;
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        $uploaded_logo->move($destinationPath, $filename);
        $gl->foto = $filename;
        $gl->save();
    }
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
        
        $gl = galeri::find($id);
        $gl -> update($request->all());
        // isi field gambar jika ada gambar yang diupload
        if ($request->hasFile('foto')) {
        // Mengambil file yang diupload
        $uploaded_logo = $request->file('foto');
        // mengambil extension file
        $extension = $uploaded_logo->getClientOriginalExtension();
        // membuat nama file random berikut extension
        $filename = md5(time()) . '.' . $extension;
        // menyimpan gambar ke folder public/img
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        $uploaded_logo->move($destinationPath, $filename);
        // mengisi field gambar di Galeri dengan filename yang baru dibuat
        $gl->foto = $filename;
        $gl->save();
    }
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
