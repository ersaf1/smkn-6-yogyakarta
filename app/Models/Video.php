<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Video extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'description', 'section', 'video_file',
        'thumbnail', 'order', 'is_active'
    ];

    public function scopeVideos($query)
    {
        return $query->where('section', 'video');
    }

    public function scopeBanners($query)
    {
        return $query->where('section', 'banner');
    }

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        if (empty($this->attributes['slug'])) {
            $this->attributes['slug'] = Str::slug($value);
        }
    }

    public function getVideoUrlAttribute()
    {
        return $this->video_file ? asset('storage/' . $this->video_file) : null;
    }
}
