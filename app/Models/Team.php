<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        "first_name",
        "second_name",
        "patron_name",
        "position",
        "whatsapp",
        "telegram",
        "phone",
        "img_path",
    ];
}
