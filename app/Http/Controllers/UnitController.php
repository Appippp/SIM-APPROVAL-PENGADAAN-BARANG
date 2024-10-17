<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::get();
        return view('pages.master-data.units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.master-data.units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_unit'=>'required|unique:unit',
        ]);

       Unit::create([
           'nama_unit' => $request->nama_unit
       ]);

       return redirect()->route('units.index')->with('success','Unit Created Successfully');
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
        $units = Unit::find($id);

        return view('pages.master-data.units.edit',compact('units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_unit'=>'required|unique:unit,nama_unit,'.$id
        ]);

        $units = Unit::find($id);

        $units->update([
            'nama_unit' => $request->nama_unit
        ]); 

        return redirect()->route('units.index')->with('success', 'Unit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $units = Unit::find($id);

        $units->delete();

        return redirect()->route('units.index')->with('success', 'Unit deleted successfully');
    }
}
