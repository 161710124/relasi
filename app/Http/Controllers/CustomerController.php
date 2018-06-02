<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $custom = customer::all();
        return view('customer.index',compact('custom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('customer.create');
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
            'alamat' => 'required|unique:customer',
            'no_hp' => 'required'
        ]);
        $custom = new customer;
        $custom->nama = $request->nama;
        $custom->alamat= $request->alamat;
        $custom->no_hp = $request->no_hp;
        $custom->save();
        return redirect()->route('cstm.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $custom = customer::findOrFail($id);
        return view('customer.show',compact('custom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $custom = customer::findOrFail($id);
        return view('customer.edit',compact('custom'));
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
            'alamat' => 'required',
            'no_hp' => 'required|unique:customer'
        ]);
        
        $custom = customer::findOrFail($id);
        $custom->nama = $request->nama;
        $custom->alamat= $request->alamat;
        $custom->no_hp = $request->no_hp;
        $custom->save();
        return redirect()->route('cstm.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $custom = customer::findOrFail($id);
        $custom->delete();
        return redirect()->route('cstm.index');
    }
}
