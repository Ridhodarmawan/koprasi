<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class AnggotaController extends Controller
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
            $anggotas = Anggota::select(['id', 'nama', 'alamat', 'email', 'jabatan']);
            return Datatables::of($anggotas)
            ->addColumn('action', function($anggota){
                return view('datatable._action', [
             'model'    => $anggota,
             'form_url' => route('anggotas.destroy', $anggota->id),
             'edit_url' => route('anggotas.edit', $anggota->id),
             'confirm_message' => 'Yakin Mau menghapus ' . $anggota->nama . '?'
                    ]);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'nama', 'name'=>'nama', 'title'=>'Nama'])
        ->addColumn(['data' => 'alamat', 'name'=>'alamat', 'title'=>'Alamat'])
        ->addColumn(['data' => 'email', 'name'=>'email', 'title'=>'Email'])
        ->addColumn(['data' => 'jabatan', 'name'=>'jabatan', 'title'=>'Jabatan'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Pilihan', 'orderable'=>false, 'searchable'=>false]);
        
        return view('anggotas.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('anggotas.create');
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
        $this->validate($request, ['nama' => 'required|unique:anggotas',
                                    'alamat' => 'required|max:255',   
                                    'email' => 'required|unique:anggotas',
                                    'jabatan' => 'required|max:255']);
        $anggota = Anggota::create($request->only('nama', 'alamat', 'email', 'jabatan'));
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"berhasil menyimpan $anggota->nama"
            ]);
        return redirect()->route('anggotas.index');
    
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
        $anggota = Anggota::find($id);
        return view('anggotas.edit')->with(compact('anggota'));
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
        $this->validate($request, ['nama', 'alamat', 'email', 'jabatan' => 'required|unique:anggotas,nama,'. $id]);
        $anggota = Anggota::find($id);
        $anggota->update($request->only('nama', 'alamat', 'email', 'jabatan'));
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $anggota->nama"
            ]);
        return redirect()->route('anggotas.index');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       if(!Anggota::destroy($id)) 
        
            return redirect()->back();
        
        else{
        Session:: flash("flash_notification", [
            "level"=>"success",
            "message"=>"Anggota berhasil dihapus"
            ]);
        return redirect()->route('anggotas.index');
        }
    }
}