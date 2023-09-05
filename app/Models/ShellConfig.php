<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShellConfig extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
      'data',
      'device_id',
      'shell_id'
    ];
}
