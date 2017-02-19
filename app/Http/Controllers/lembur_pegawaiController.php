<?php

namespace App\Http\Controllers;
use App\lembur_pegawaiModel;
use App\pegawaiModel;
use Request;

class lembur_pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lembur_pegawai=lembur_pegawaiModel::all();
        return view('lembur_pegawai.index',compact('lembur_pegawai'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {   $pegawai=pegawaiModel::all();
        $lembur_pegawai=lembur_pegawaiModel::all();
        return view('lembur_pegawai.create',compact('lembur_pegawai','pegawai'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $lembur_pegawai=Request::all();
        lembur_pegawaiModel::create($lembur_pegawai);
        return redirect('lemburpegawai');
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
    public function edit($id)
    {
        //
        $lembur_pegawai=lembur_pegawaiModel::all();
        return view('lembur_pegawai.edit',compact('lembur_pegawai'));
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
        //
        $Update=Request::all();
        $lembur_pegawai=lembur_pegawaiModel::find($id);
        $lembur_pegawai->update($Update);
        return redirect('lembur_pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        lembur_pegawaiModel::find($id)->delete();
        return redirect('lembur_pegawai');
    }
}