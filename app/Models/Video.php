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
        'title', 'slug', 'description', 'video_url',
        'thumbnail', 'order', 'is_active'
    ];

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

    public function getEmbedUrlAttribute()
    {
        $url = $this->video_url;
        if (str_contains($url, 'youtube.com/watch')) {
            parse_str(parse_url($url, PHP_URL_QUERY), $params);
            return 'https://www.youtube.com/embed/' . ($params['v'] ?? '');
        }
        if (str_contains($url, 'youtu.be/')) {
            $id = str_replace('youtu.be/', '', parse_url($url, PHP_URL_PATH));
            return 'https://www.youtube.com/embed/' . $id;
        }
        return $url;
    }
}
