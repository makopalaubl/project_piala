<?php

namespace App\Http\Controllers;

use App\Models\Accomplishment;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Requests\AccomplishmentRequest;

class AccomplishmentController extends Controller
{
    // Tampilkan semua prestasi
    public function index()
    {
        $accomplishments = Accomplishment::with('member')->latest()->get();
        $members = Member::all(); // ambil data anggota

        return view('pages.accomplishment', compact('accomplishments', 'members'));
    }
    
    // Tampilkan form tambah prestasi
    public function create()
    {
        $members = Member::all();
        return view('accomplishment.create', compact('members'));
    }

    // Simpan data baru
    public function store(AccomplishmentRequest $request)
    {
        
        Accomplishment::create($request->validated());
        return redirect()->route('accomplishment.index')->with('success', 'Accomplishment added successfully.');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $accomplishment = Accomplishment::findOrFail($id);
        $members = Member::all();
        return view('accomplishment.edit', compact('accomplishment', 'members'));
    }

    // Simpan perubahan
    public function update(AccomplishmentRequest $request, $id)
    {
        dd("kobra");
        $accomplishment = Accomplishment::findOrFail($id);
        $accomplishment->update($request->validated());
        return redirect()->route('accomplishment.index')->with('success', 'Accomplishment updated successfully.');
    }

    // Hapus prestasi
    public function destroy($id)
    {
        $accomplishment = Accomplishment::findOrFail($id);
        $accomplishment->delete();

        return redirect()->route('accomplishment.index')->with('success', 'Accomplishment deleted.');
    }
}
