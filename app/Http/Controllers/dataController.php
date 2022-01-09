<?php

namespace App\Http\Controllers;
use App\Models\dataAdmin;

use Illuminate\Http\Request;

class dataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataKu = dataAdmin::all();
        // return $dataKu;
        return view('admin.data', compact('dataKu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate ([
            'nama' => 'required',
            'mentor' => 'required',
            'waktu' => 'required',
            'training' =>'required',
            'harga' =>'required',
        ]);
        dataAdmin::create($request->all());
        return redirect()->route('dataAdmin.index')->with('success', 'Data Berhasil Di Tambah');
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
        $data=dataAdmin::find($id);
        return view('admin.edit', compact('data'));

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
        $data=dataAdmin::find($id)->update([
            'nama' => $request->nama,
            'mentor' => $request->mentor,
            'waktu' => $request->waktu,
            'training' => $request->training,
            'harga' => $request->harga
        ]);
        return redirect()->route('dataAdmin.index')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dataAdmin::find($id)->delete();
        return redirect()->route('dataAdmin.index')->with('success', 'Data Berhasil Di Hapus');
    }
}
