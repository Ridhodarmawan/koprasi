<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Penjualan;
use App\Barang;
use Illuminate\Support\Facades\Session;

class PenjualanController extends Controller
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
            $penjualans = Penjualan::with(['barang', 'anggota'])->get();
            return Datatables::of($penjualans)
            ->addColumn('action', function($penjualan){
                return view('datatable._action', [
                        'model'    => $penjualan,
                        'form_url' => route('penjualans.destroy', $penjualan->id),
                        'edit_url' => route('penjualans.edit', $penjualan->id),
                        'confirm_message' => 'Yakin mau mengapus ' . $penjualan->nama_pelanggan . '?'
                        ]);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'nama_pelanggan', 'name'=>'nama_pelanggan', 'title'=>'Pelanggan'])

        ->addColumn(['data' => 'barang.nama_barang', 'name'=>'barang.nama_barang', 'title'=>'Barang'])

        ->addColumn(['data' => 'tanggal', 'name'=>'tanggal', 'title'=>'Tanggal'])

        ->addColumn(['data' => 'barang.harga_barang', 'name'=>'barang.harga_barang', 'title'=>'Harga Barang'])

        ->addColumn(['data' => 'jumlah_beli', 'name'=>'jumlah_beli', 'title'=>'Jumlah beli'])

        ->addColumn(['data' => 'sub_total', 'name'=>'sub_total', 'title'=>'Sub total'])

        ->addColumn(['data' => 'anggota.nama', 'name'=>'anggota.nama', 'title'=>' Petugas'])

        ->addColumn(['data' => 'action', 'name'=>'action','title'=>'Pilihan', 'orderable'=>false, 'searchable'=>false]);

        return view('penjualans.index')->with(compact('html'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

        return view('penjualans.create');

    }

    public function ajax(Request $request)
    {
        if ($request-> ajax()) {
            # code...
            $id_barang = $request->barang;
            $barang = Barang::find($id_barang);

            return $barang->harga_barang;

        }
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
        $this->validate($request, [
        'nama_pelanggan'   =>'required|max:255',
        'id_barang'  =>'required|exists:barangs,id',
        'tanggal'  =>'required|max:255',
        'harga_barang'  =>'required|max:255',
        'jumlah_beli'   =>  'required|max:255',
        'sub_total'   =>  'required|max:255',
        'id_petugas'  =>'required|exists:anggotas,id',
        ]);

        $penjualan = Penjualan::create($request->only('nama_pelanggan', 'id_barang', 'tanggal', 'harga_barang', 'jumlah_beli', 'sub_total', 'id_petugas'));

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"berhasil menyimpan $penjualan->nama_pelanggan"
            ]);
        return redirect()->route('penjualans.index');


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
        $penjualan = Penjualan::find($id);
        return view('penjualans.edit')->with(compact('penjualan'));
        
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
        $this->validate($request, [
        'nama_pelanggan'   =>'required|max:255',
        'id_barang'  =>'required|exists:barangs,id',
        'tanggal'  =>'required|max:255',
        'harga_barang'  =>'required|max:255',
        'jumlah_beli'   =>  'required|max:255',
        'sub_total'   =>  'required|max:255',
        'id_petugas'  =>'required|exists:anggotas,id',
        ]);

        $penjualan =Penjualan::find($id);
        $penjualan->update($request->only('nama_pelanggan', 'id_barang', 'tanggal', 'harga_barang', 'jumlah_beli', 'sub_total', 'id_petugas'));

                Session::flash("flash_notification",[
                "level" => "success",
                "message"=>"Berhasil menyimpan $penjualan->nama_pelanggan"
                    ]);
                 return redirect()->route('penjualans.index');
            }

     public function stok(Request $request)
    {
        if ($request-> ajax()) {
            # code...
            $id_barang = $request->stok;
            $barang = Barang::find($id_barang);

            return $barang->stok_barang;

        }
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
        $penjualan = Penjualan::find($id);

        $penjualan->delete();

        Session::flash("flash_notification", [
            "level"=>"succes",
            "message"=>"Penjualan berhasil dihapus"
            ]);
        return redirect()->route('penjualans.index');

    }
}

