<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrewPackage extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
      'name',
      'description',
      'meta'
    ];

    protected $casts = [
        'meta' => AsArrayObject::class,
    ];
}
