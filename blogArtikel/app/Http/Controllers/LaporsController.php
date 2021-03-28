<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lapor;
use App\Tanggapan;

class LaporsController extends Controller
{
    
    public function index()
    {
        $lapor = Lapor::paginate(10);
        return view('lapor.index', compact('lapor'));
    }

    public function create()
    {
        return view('lapor.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'tanggal' => 'required',
            'isi' => 'required',
            'file' => 'required',
            'lampiran' => 'required',

        ]);
        $file = $request->file;
        $new_file = time().$file->getClientOriginalName();

        $lapor = Lapor::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'tanggal' => $request->tanggal,
            'isi' => $request->isi,
            'file' => 'public/uploads/lapor/'.$new_file,
            'lampiran' => $request->lampiran
        ]);

        $file->move('public/uploads/lapor/', $new_file);
        return redirect()->back()->with('success','Data berhasil disimpan');
    }

    public function edit($id)
    {
        $lapor = Lapor::findorfail($id);
        return view('lapor.edit', compact('lapor'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'tanggal' => 'required',
            'isi' => 'required',
            'lampiran' => 'required',
        ]);

        $lapor = Lapor::findorfail($id);

        if($request->has('file')) {
            $file = $request->file;
            $new_file = time().$file->getClientOriginalName();
            $file->move('public/uploads/lapor/', $new_file);

            $lapor_data = [
                'nama' => $request->nama,
                'email' => $request->email,
                'tanggal' => $request->tanggal,
                'isi' => $request->isi,
                'file' => 'public/uploads/lapor/'.$new_file,
                'lampiran' => $request->lampiran
            ];
        }
        else{
            $lapor_data = [
                'nama' => $request->nama,
                'email' => $request->email,
                'tanggal' => $request->tanggal,
                'isi' => $request->isi,
                'lampiran' => $request->lampiran
            ];
        }

        $lapor->update($lapor_data);
        return redirect()->route('lapor.index')->with('success','Data berhasil di Edit');
    }
    
    public function tanggapans()
    {
        $tanggapan = Tanggapan::paginate(1);
        return view('lapor.tanggapan', compact('tanggapan'));
    }
}
