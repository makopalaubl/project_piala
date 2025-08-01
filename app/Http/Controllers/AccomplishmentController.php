<?php

namespace App\Http\Controllers;

use App\Models\Accomplishment;
use App\Models\Member;
use Illuminate\Http\Request;

class AccomplishmentController extends Controller
{
    // Tampilkan semua prestasi
    public function index()
    {
        $accomplishments = Accomplishment::with('member')->latest()->get();
        return view('pages.accomplishment', compact('accomplishments'));
    }

    // Tampilkan form tambah prestasi
    public function create()
    {
        $members = Member::all();
        return view('accomplishment.create', compact('members'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'member_id'   => 'required|exists:members,id',
            'event_name'  => 'required|string|max:255',
            'year'        => 'required|integer',
            'month'       => 'required|string',
            'day'         => 'required|integer',
            'level'       => 'nullable|string',
            'class'       => 'nullable|string',
            'organizer'   => 'nullable|string',
            'athlete'     => 'nullable|string',
            'rank'        => 'nullable|string',
            'condition'   => 'nullable|string',
            'notes'       => 'nullable|string',
            'awards'      => 'nullable|array',
        ]);

        Accomplishment::create([
            'member_id'   => $request->member_id,
            'event_name'  => $request->event_name,
            'year'        => $request->year,
            'month'       => $request->month,
            'day'         => $request->day,
            'level'       => $request->level,
            'class'       => $request->class,
            'organizer'   => $request->organizer,
            'athlete'     => $request->athlete,
            'rank'        => $request->rank,
            'condition'   => $request->condition,
            'notes'       => $request->notes,
            'awards'      => $request->awards,
        ]);

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
    public function update(Request $request, $id)
    {
        $request->validate([
            'member_id'   => 'required|exists:members,id',
            'event_name'  => 'required|string|max:255',
            'year'        => 'required|integer',
            'month'       => 'required|string',
            'day'         => 'required|integer',
            'level'       => 'nullable|string',
            'class'       => 'nullable|string',
            'organizer'   => 'nullable|string',
            'athlete'     => 'nullable|string',
            'rank'        => 'nullable|string',
            'condition'   => 'nullable|string',
            'notes'       => 'nullable|string',
            'awards'      => 'nullable|array',
        ]);

        $accomplishment = Accomplishment::findOrFail($id);
        $accomplishment->update($request->all());

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