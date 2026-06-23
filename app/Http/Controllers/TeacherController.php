<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('teachers.index', compact('teachers'));
    }

    public function show($id)
    {
        $teacher = Teacher::where('id', $id)
            ->where('is_active', true)
            ->firstOrFail();

        return view('teachers.show', compact('teacher'));
    }
}
