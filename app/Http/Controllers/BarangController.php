<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        //
        if ($request->ajax()) {
            $barangs = Barang::with(['satuan'])->get();
            return Datatables::of($barangs)
             ->addColumn('action', function($barang){
                return view('datatable._action', [
             'model'    => $barang,
             'form_url' => route('barangs.destroy', $barang->id),
             'edit_url' => route('barangs.edit', $barang->id),
             'confirm_message' => 'Yakin Mau menghapus ' . $barang->nama_barang . '?'
                    ]);
            })->make(true);
        }

         $html = $htmlBuilder
        ->addColumn(['data' => 'nama_barang', 'name'=>'nama_barang', 'title'=>'Nama barang'])
        ->addColumn(['data' => 'kode_barang', 'name'=>'kode_barang', 'title'=>'Kode barang'])
        ->addColumn(['data' => 'harga_barang', 'name'=>'harga_barang', 'title'=>'Harga'])
        ->addColumn(['data' => 'stok_barang', 'name'=>'stok_barang', 'title'=>'Stok barang'])
        ->addColumn(['data' => 'satuan.nama_satuan', 'name'=>'satuan.nama_satuan', 'title'=>'Satuan'])

       ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Pilihan', 'orderable'=>false, 'searchable'=>false]);
        
        return view('barangs.index')->with(compact('html'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
                return view('barangs.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, ['nama_barang' => 'required|unique:barangs']);
        $barang = Barang::create($request->only('nama_barang', 'kode_barang', 'harga_barang', 'stok_barang', 'satuan', 'sisa_barang'));
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"berhasil menyimpan $barang->nama"
            ]);
        return redirect()->route('barangs.index');
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
        $barang = Barang::find($id);
        return view('barangs.edit')->with(compact('barang'));
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
         $this->validate($request, ['nama_barang' => 'required|unique:barangs,nama_barang,'. $id]);
        $barang = Barang::find($id);
        $barang->update($request->only('nama_barang', 'kode_barang', 'harga_barang', 'stok_barang', 'satuan'));
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $barang->nama_barang"
            ]);
        return redirect()->route('barangs.index');
       
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
        if(!Barang::destroy($id)) 
        
            return redirect()->back();
        
        else{
        Session:: flash("flash_notification", [
            "level"=>"success",
            "message"=>"Barang berhasil dihapus"
            ]);
        return redirect()->route('barangs.index');
        }
    }
}