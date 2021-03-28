<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Lapor;
use App\Tanggapan;
use App\User;
use App\Exports\LaporExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


class LaporController extends Controller
{
    public function tampil_lapor(){
        $lapor = Lapor::paginate(10);
        return view('admin.lapor.index', compact('lapor'));
    }

    public function destroy($id)
    {
        $lapor = Lapor::findorfail($id);
        $lapor->delete();

        return redirect()->back()->with('success','Data Berhasil di Hapus (Cek list trashed)');
    }

    public function tampil_delete()
    {
        $lapor = Lapor::onlyTrashed()->paginate(10);
        return view('admin.lapor.delete', compact('lapor'));
    }

    public function restore($id)
    {
        $lapor = Lapor::withTrashed()->where('id', $id)->first();
        $lapor->restore();

        return redirect()->back()->with('success','Data berhasil di restore (Silahkan cek di list laporan)');
    }

    public function kill($id)
    {
        $lapor = Lapor::withTrashed()->where('id', $id)->first();
        $lapor->forceDelete();

        return redirect()->back()->with('success','Data berhasil di hapus');
    }

    public function export_excel()
	{
		return Excel::download(new LaporExport, 'laporan.xlsx');
	}

    public function cetak_pdf()
    {
    	$lapor = Lapor::all();
 
    	$pdf = PDF::loadview('admin.lapor.lapor_pdf',['lapor'=>$lapor]);
    	return $pdf->stream('laporan-pengaduan-pdf');
    }

    public function tanggap()
    {
        return view('admin.lapor.tanggap');
    }

    public function store_tanggap(Request $request){
        $this->validate($request, [
            'nama_pelapor' => 'required',
            'email_pelapor' => 'required',
            'tanggal' => 'required',
            'isi_tanggapan' => 'required',
        ]);
        $tanggapan = Tanggapan::create([
            'nama_pelapor' => $request->nama_pelapor,
            'email_pelapor' => $request->email_pelapor,
            'tanggal' => $request->tanggal,
            'isi_tanggapan' => $request->isi_tanggapan,
            'id_petugas' => Auth()->user()->id
        ]);
        return redirect()->back()->with('success','Tanggapan berhasil dikirim');
    }
}
