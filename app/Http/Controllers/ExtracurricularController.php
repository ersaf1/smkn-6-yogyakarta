<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $extracurriculars = Extracurricular::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('extracurriculars.index', compact('extracurriculars'));
    }

    public function show($slug)
    {
        $extracurricular = Extracurricular::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('extracurriculars.show', compact('extracurricular'));
    }
}
