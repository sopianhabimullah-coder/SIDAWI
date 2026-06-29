<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use Illuminate\Http\Request;
use App\Exports\KeluargaExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
    
        
        $query = Keluarga::with('rt');
    
        if ($user->isRt()) {
            $query->where('rt_id', $user->rt_id);
        } elseif ($user->isRw()) {
            $query->whereHas('rt', function($q) use ($user) {
                $q->where('nomor_rw', $user->nomor_rw);
            });
        }

        
    
        // Filter pencarian
        if ($request->search) {
            $query->where('nama_kepala_keluarga', 'like', '%' . $request->search . '%');
        }
    
        // Filter kategori
        if ($request->filter) {
            $query->where($request->filter, '>', 0);
        }
    
        $keluargas = $query->get();
        $rts = \App\Models\Rt::all();
    
        return view('keluarga.index', compact('keluargas', 'rts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $rts = \App\Models\Rt::all();
    return view('keluarga.create', compact('rts'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Keluarga::create($request->all());
    return redirect()->route('keluarga.index')
    ->with('success', 'Data keluarga berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keluarga $keluarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
        {
    $keluarga = Keluarga::findOrFail($id);
    $rts = \App\Models\Rt::all();
    return view('keluarga.edit', compact('keluarga', 'rts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $keluarga = Keluarga::findOrFail($id);
    $keluarga->update($request->all());
    return redirect()->route('keluarga.index')
    ->with('success', 'Data keluarga berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        Keluarga::findOrFail($id)->delete();
    return redirect()->route('keluarga.index')
    ->with('danger', 'Data keluarga berhasil dihapus!');
    }

    // Export Excel
    public function exportExcel()
    {
        return Excel::download(new KeluargaExport, 'data-keluarga.xlsx');
    }

    //Export PDF
    public function exportPdf()
    {
        $keluargas = Keluarga::all();
        $pdf = Pdf::loadView('keluarga.pdf', compact('keluargas'))
                  ->setPaper('a3', 'landscape');
        return $pdf->download('data-keluarga.pdf');
    }

    // Cetak (preview di browser)
    public function cetak()
    {
        $keluargas = Keluarga::all();
        $pdf = Pdf::loadView('keluarga.pdf', compact('keluargas'))
                  ->setPaper('a3', 'landscape');
        return $pdf->stream('data-keluarga.pdf');
    }

    // Export PDF per keluarga
    public function exportPdfDetail(String $id)
    {
    $keluarga = Keluarga::findOrFail($id);
    $pdf = Pdf::loadView('keluarga.pdf_detail', compact('keluarga'))
              ->setPaper('a4', 'portrait');
    return $pdf->download('keluarga-' . $keluarga->nama_kepala_keluarga . '.pdf');
    }

    // Cetak per keluarga
    public function cetakDetail(String $id)
    {
    $keluarga = Keluarga::findOrFail($id);
    $pdf = Pdf::loadView('keluarga.pdf_detail', compact('keluarga'))
              ->setPaper('a4', 'portrait');
    return $pdf->stream('keluarga-' . $keluarga->nama_kepala_keluarga . '.pdf');
    }   
}
