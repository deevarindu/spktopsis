<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criterias = Criteria::all();
        return view('criteria.index', compact('criterias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('criteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
            'bobot' => 'required',
        ]);

        $criteria = new Criteria();
        $criteria->kode = $request->kode;
        $criteria->nama = $request->nama;
        $criteria->jenis = $request->jenis;
        $criteria->bobot = $request->bobot;
        $criteria->save();

        return redirect()->route('criteria.index')->with('success', 'Criteria created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $criteria = Criteria::findOrFail($id);
        return view('criteria.edit', compact('criteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'kode' => 'required',
                'nama' => 'required',
                'jenis' => 'required',
                'bobot' => 'required',
            ]);

            $criteria = Criteria::findOrFail($id);

            $criteria->update($request->all());
        } catch (\Throwable $th) {
            return redirect()->route('criteria.index')->with('error', 'Criteria not found.');
        }

        return redirect()->route('criteria.index')->with('success', 'Criteria updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $criteria = Criteria::findOrFail($id);
        $criteria->delete();

        return redirect()->route('criteria.index')->with('success', 'Criteria deleted successfully.');
    }
}
