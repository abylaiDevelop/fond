<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

interface Repository
{
    public function store(FormRequest $request);
    public function update(FormRequest $request, Model $model);
}
