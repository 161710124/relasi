<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BokingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = boking::all();
        return view('booked.index',compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('booked.create');
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
            'tanggal_boking' => 'required|unique:bokings',
            'id_customer' => 'required|',
            'id_mobil' => 'required'
        ]);
        $book = new boking;
        $book->tanggal_boking = $request->tanggal_boking;
        $book->id_customer= $request->id_customer;
        $book->id_mobil = $request->id_mobil;
        $book->save();
        return redirect()->route('bkg.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = boking::findOrFail($id);
        return view('booked.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = boking::findOrFail($id);
        return view('booked.edit',compact('book'));
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
            'tanggal_boking' => 'required',
            'id_customer' => 'required',
            'id_mobil' => 'required|unique:customer'
        ]);
        
        $book = boking::findOrFail($id);
        $book->tanggal_boking = $request->tanggal_boking;
        $book->id_customer= $request->id_customer;
        $book->id_mobil = $request->id_mobil;
        $book->save();
        return redirect()->route('bkg.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = boking::findOrFail($id);
        $book->delete();
        return redirect()->route('bkg.index');
    }
}
