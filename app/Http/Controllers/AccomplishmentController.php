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

    public function show($id)
    {
        $accomplishment = Accomplishment::with('member')->findOrFail($id);
        return response()->json($accomplishment);
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
        return response()->json(['success' => true]);
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
        $accomplishment = Accomplishment::findOrFail($id);
        $validated['awards'] = $request->input('awards'); // pastikan array awards ikut masuk

        $accomplishment->update($validated);

        return response()->json(['success' => true]);
    }

    // Hapus prestasi
    public function destroy($id)
    {
        $accomplishment = Accomplishment::findOrFail($id);
        $accomplishment->delete();

        return response()->json(['success' => true]);
    }

    public function publicView($id)
{
    $item = Accomplishment::with('member')->findOrFail($id);

    return view('pages.accomplishment.public', compact('item'));
}
}
