<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('alternative.index', [
            'alternatives' => \App\Models\Alternative::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alternative.create', [
            'criterias' => \App\Models\Criteria::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'c1' => 'required',
                'c2' => 'required',
                'c3' => 'required',
                'c4' => 'required',
                'c5' => 'required',
                'c6' => 'required',
                'c7' => 'required',
                'c8' => 'required',
                'c9' => 'required',
                'c10' => 'required',
            ]);

            $alternative = new Alternative();

            $alternative->nama = $request->nama;
            $alternative->c1 = $request->c1;
            $alternative->c2 = $request->c2;
            $alternative->c3 = $request->c3;
            $alternative->c4 = $request->c4;
            $alternative->c5 = $request->c5;
            $alternative->c6 = $request->c6;
            $alternative->c7 = $request->c7;
            $alternative->c8 = $request->c8;
            $alternative->c9 = $request->c9;
            $alternative->c10 = $request->c10;

            $alternative->save();
        } catch (\Throwable $th) {
            return redirect()->route('alternative.index')->with('error', 'Alternative not found.');
        }

        return redirect()->route('alternative.index')->with('success', 'Alternative created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('alternative.edit', [
            'alternative' => \App\Models\Alternative::findOrFail($id),
            'criterias' => \App\Models\Criteria::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'c1' => 'required',
                'c2' => 'required',
                'c3' => 'required',
                'c4' => 'required',
                'c5' => 'required',
                'c6' => 'required',
            ]);

            $alternative = Alternative::findOrFail($id);

            $alternative->update($request->all());
        } catch (\Throwable $th) {
            return redirect()->route('alternative.index')->with('error', 'Alternative not found.');
        }

        return redirect()->route('alternative.index')->with('success', 'Alternative updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alternative $alternative)
    {
      $id = $alternative->id;
      Alternative::destroy($id);

      return redirect()->route('alternative.index')->with('success', 'Alternative deleted successfully.');
    }
}
