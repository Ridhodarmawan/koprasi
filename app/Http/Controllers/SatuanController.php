<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Satuan;
use Illuminate\Support\Facades\Session;

class SatuanController extends Controller
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
            $satuans = Satuan::select(['id', 'nama_satuan']);
            return Datatables::of($satuans)
            ->addColumn('action', function($satuan) {
                return view('datatable._action', [
                    'model'    => $satuan,
                        'form_url' => route('satuans.destroy', $satuan->id),
                        'edit_url' => route('satuans.edit', $satuan->id),
                        'confirm_message' => 'Yakin mau mengapus ' . $satuan->nama_satuan . '?'
                    ]);
            })->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data' => 'nama_satuan', 'name' => 'nama_satuan', 'title' =>'Nama Satuan'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'pilihan', 'orderable'=>false, 'searchable'=>false]);
        return view('satuans.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('satuans.create');
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
         $this->validate($request, ['nama_satuan' => 'required|unique:satuans']);
        $satuans = Satuan::create($request->only('nama_satuan'));
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"berhasil menyimpan $satuans->nama_satuan"
            ]);
        return redirect()->route('satuans.index');
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
        $satuan = Satuan::find($id);
        return view('satuans.edit')->with(compact('satuan'));
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
        $this->validate($request, ['nama_satuan' => 'required|unique:satuans,nama_satuan,', $id]);
        $satuan = Satuan::find($id);
        $satuan->update($request->only('nama_satuan'));
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $satuan->nama_satuan"
            ]);
        return redirect()->route('satuans.index');

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
        Satuan::destroy($id);
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Satuan berhasil di hapus"
            ]);
        return redirect()->route('satuans.index');
    }
}
