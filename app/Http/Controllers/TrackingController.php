<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Manuscript;

class TrackingController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function track(Request $request)
    {
        $request->validate([
            'kode_penerbit' => 'required|string',
            'nomor_hp' => 'required|string',
        ]);

        $author = Author::with([
            'manuscripts.package',
            'manuscripts.isbn',
            'manuscripts.production',
            'manuscripts.shipment',
        ])
            ->where('publisher_code', $request->kode_penerbit)
            ->where('phone_number', $request->nomor_hp)
            ->first();

        if (! $author) {
            return back()->withErrors(['not_found' => 'Data tidak ditemukan. Pastikan kode penerbit dan nomor HP sudah benar.']);
        }

        return redirect()->route('tracking.detail', $author->id);
    }
    public function detail($id)
    {
        $author = Author::with([
            'manuscripts.package',
            'manuscripts.isbn',
            'manuscripts.production',
            'manuscripts.shipment',
        ])->findOrFail($id);

        return view('detail', compact('author'));
    }
}
