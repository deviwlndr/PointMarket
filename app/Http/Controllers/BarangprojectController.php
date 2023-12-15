<?php

namespace App\Http\Controllers;

use App\Models\Barangproject;
use Illuminate\Http\Request;

class BarangprojectController extends Controller
{
    // Controller
    public function project()
    {
        $barangproject = Barangproject::all();
        return view('barangproject.project', compact('barangproject'));
    }


    public function create(){
        return view('barangproject.create');
    }

    public function store(Request $request)
    {
        //dd($request->except(['_token','submit']));
       Barangproject::create($request->except(['_token','submit']));
       return redirect('/barangproject');
    }

    public function edit($id)
    {
        $barangproject = Barangproject::find($id);
        return view('barangproject.edit',compact(['barangproject']));
    }

    public function update($id, Request $request) 
    {
        $barangproject = Barangproject::find($id);
        $barangproject->update($request->except(['_token','submit']));
        return redirect('/barangproject');
    }

    public function destroy($id)
    {
        $barangproject = Barangproject::find($id);
        $barangproject->delete();
        return redirect('/barangproject');
    }
}