<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\CompetencyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('home');

Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/galeri-foto', [GalleryController::class, 'index'])->name('gallery.index');

Route::get('/guru-karyawan', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/guru-karyawan/{id}', [TeacherController::class, 'show'])->name('teachers.show');

Route::get('/kompetensi-keahlian', [CompetencyController::class, 'index'])->name('competencies.index');
Route::get('/kompetensi-keahlian/{slug}', [CompetencyController::class, 'show'])->name('competencies.show');

Route::get('/prestasi', [AchievementController::class, 'index'])->name('achievements.index');

Route::get('/ekstrakulikuler', [ExtracurricularController::class, 'index'])->name('extracurriculars.index');
Route::get('/ekstrakulikuler/{slug}', [ExtracurricularController::class, 'show'])->name('extracurriculars.show');

Route::get('/video', [VideoController::class, 'index'])->name('videos.index');

Route::get('/download', [DownloadController::class, 'index'])->name('downloads.index');
Route::get('/download/{download}', [DownloadController::class, 'download'])->name('downloads.download');

Route::get('/hubungi-kami', [ContactController::class, 'index'])->name('contact.index');
Route::post('/hubungi-kami', [ContactController::class, 'store'])->name('contact.store');

Route::get('/{slug}', [PageController::class, 'show'])->name('pages.show');
