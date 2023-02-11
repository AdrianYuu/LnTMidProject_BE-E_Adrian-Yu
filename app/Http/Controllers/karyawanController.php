<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\karyawan;
use Session;

class karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $pencarian = $request->pencarian;

        if(strlen($pencarian)){
            $data = karyawan::where('nama', 'like', "%$pencarian%")->paginate(5);
        } else{
            $data = karyawan::orderBy('nama', 'asc')->paginate(5);
        }

        return view('index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('alamat', $request->alamat);
        Session::flash('umur', $request->umur);
        Session::flash('nomortelepon', $request->nomortelepon);

        $request->validate([
            'nama'=>'required|unique:karyawan|min:5|max:20',
            'alamat'=>'required|min:10|max:40',
            'umur'=>'required|gt:20',
            'nomortelepon'=>'required|min:9|max:12|',
        ], [
            'nama.required'=>'Nama harus diisi!',
            'nama.unique'=>'Nama yang diinput sudah ada di dalam database!',
            'alamat.required'=>'Alamat harus diisi!',
            'umur.required'=>'Umur harus diisi!',
            'nomortelepon.required'=>'Nomor Telepon harus diisi!',
        ]);
        
        $data = [
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'umur'=>$request->umur,
            'nomortelepon'=>$request->nomortelepon,
        ];

        karyawan::create($data);
        return redirect()->to('karyawan')->with('success', 'Data karyawan berhasil ditambahkan!');
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
        $data = karyawan::where('nama', $id)->first();
        return view('edit')->with('data', $data);
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
        $request->validate([
            'alamat'=>'required|min:10|max:40',
            'umur'=>'required|gt:20',
            'nomortelepon'=>'required|min:9|max:12|',
        ], [
            'alamat.required'=>'Alamat harus diisi!',
            'umur.required'=>'Umur harus diisi!',
            'nomortelepon.required'=>'Nomor Telepon harus diisi!',
        ]);
        
        $data = [
            'alamat'=>$request->alamat,
            'umur'=>$request->umur,
            'nomortelepon'=>$request->nomortelepon,
        ];

        karyawan::where('nama', $id)->update($data);
        return redirect()->to('karyawan')->with('success', 'Data karyawan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        karyawan::where('nama', $id)->delete();
        return redirect()->to('karyawan')->with('success', 'Data karyawan berhasil dihapus!');
    }

}
