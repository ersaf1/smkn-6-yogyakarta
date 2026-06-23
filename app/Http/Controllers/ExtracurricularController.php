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
}
