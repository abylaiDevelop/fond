<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        "img_path",
        "title",
        "body",
        "about_id",
    ];

    public function about() {
        return $this->belongsTo(About::class);
    }
}
