<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maps;
use DB;

class MapsController extends Controller
{
    public function gmaps(){
        $lokasi = DB::table('lokasi')->get();
    	return view('template_backend.footer',compact('lokasi'));
    }

    public function index(){
        $lokasi = Maps::paginate(10);
        return view('admin.lokasi.index', compact('lokasi'));
    }

    public function create()
    {
        return view('admin.lokasi.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kota' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ]);

        $lokasi = Maps::create([
            'kota' => $request->kota,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);
        return redirect()->back()->with('success','Lokasi Berhasil Disimpan');
    }

    public function edit($id)
    {
        $lokasi = Maps::findorfail($id);
        return view('admin.lokasi.edit', compact('lokasi'));
    }

    public function update(Request $request, $id)
    {
        $validate = $this->validate($request, [
            'kota' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ]);

        $lokasi_data = [
            'kota' => $request->kota,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ];

        Maps::whereId($id)->update($lokasi_data);
        return redirect()->route('lokasi.index')->with('success','Lokasi Berhasil Di Edit');
    }

    public function destroy($id)
    {
        $lokasi = Maps::findorfail($id);
        $lokasi->delete();

        return redirect()->back()->with('success','Lokasi Berhasil di Hapus');  
    }
}
