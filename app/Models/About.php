<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "body",
        "img_path",
    ];

    public function service() {
        return $this->hasMany(Service::class,"about_id");
    }
}
