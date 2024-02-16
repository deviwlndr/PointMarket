<?php

namespace App\Http\Controllers;

use App\Models\MisiTambahan;
use App\Models\Slides;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index()
    {
        //$slides = Slides::all();
        $misitambahans = MisiTambahan::paginate(10); 

        return view('misitambahan.index', compact('misitambahans'));
    }

    public function create()
    {
        return view('slides.create');
    }

    public function store(Request $request)
    {
        Slides::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect('/slides')->with('success', 'Slide berhasil ditambahkan.');
    }

}
