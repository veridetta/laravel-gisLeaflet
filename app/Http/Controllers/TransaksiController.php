<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Place;
use App\Transaksi;
use PDF;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::orderBy('id', 'asc');
        return view('transaksi.index', [
            'transaksis' => $transaksi->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.create',[
            'place'=> Place::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama_customer' => 'required',
            'place_name' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'tgl' => 'required',
            'status' => 'required'

        ]);
        Transaksi::create($validatedData);


        // $this->validate($request, [
        //     'kode' => 'required',
        //     'nama_customer' => 'required',
        //     'place_name' => 'required',
        //     'tgl' => 'required',
        //     'status' => 'required'
        // ]);
        // Transaksi::create([
        //     'kode' => $request->kode,
    	// 	'nama_customer' => $request->nama_customer,
        //     'place_name' => $request->place_name,
        //     'tgl' => $request->tgl,
        //     'status' => $request->status
    	// ]);
        return redirect('/transaksi')->with('success', 'Data berhasil ditambahkan');
        
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
        $transaksi = Transaksi::where('id', $id)->findOrFail($id);
        $transaksi->delete();
        return view('transaksi.edit', [
            'transaksi' =>$transaksi,
            'place' => Place::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required',
            'nama_customer' => 'required',
            'place_name' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'tgl' => 'required',
            'status' => 'required'
        ]);
        Transaksi::create([
            'kode' => $request->kode,
    		'nama_customer' => $request->nama_customer,
            'place_name' => $request->place_name,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'tgl' => $request->tgl,
            'status' => $request->status
    	]);
        return redirect('/transaksi')->with('success', 'Data berhasil diupdate');

    }

    public function print()
    {
        $transaksi = Transaksi::all();
    
        $pdf = PDF::loadview('print',['transaksi'=>$transaksi]);
        return $pdf->stream();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::where('id', $id)->findOrFail($id);
        $transaksi->delete();
        return redirect('/transaksi')->with('success-message', 'Data telah dihapus');
    }
}