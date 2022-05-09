<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainSlider extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "preview_text",
        "youtube",
        "instagram",
        "facebook",
    ];
}
