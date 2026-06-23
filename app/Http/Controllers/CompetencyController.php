<?php

namespace App\Http\Controllers;

use App\Models\Competency;
use Illuminate\Http\Request;

class CompetencyController extends Controller
{
    public function index()
    {
        $competencies = Competency::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('competencies.index', compact('competencies'));
    }

    public function show($slug)
    {
        $competency = Competency::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('competencies.show', compact('competency'));
    }
}
