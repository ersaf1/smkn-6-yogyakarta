<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('downloads.index', compact('downloads'));
    }

    public function download(Download $download)
    {
        $download->increment('download_count');

        return response()->download(storage_path('app/public/' . $download->file));
    }
}
