<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::get();

        return view('pages.master-data.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.master-data.kategori.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori'=>'required|unique:kategori',
        ]);

       Kategori::create([
           'nama_kategori' => $request->nama_kategori
       ]);

       return redirect()->route('kategori.index')->with('success','Kategori Created Successfully');
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
        $kategori = Kategori::find($id);

        return view('pages.master-data.kategori.edit',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kategori'=>'required|unique:kategori,nama_kategori,'.$id
        ]);

        $kategori = Kategori::find($id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);


        return redirect()->route('kategori.index')->with('success','Kategori Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);


        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori deleted successfully');
    }
}
