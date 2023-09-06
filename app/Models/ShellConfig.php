<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShellConfig extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
      'data',
      'device_id',
      'shell_id'
    ];

    protected $casts = [
        'data' => AsArrayObject::class,
    ];

    public function device(): BelongsTo
    {
        return $this->belongsTo(
            related: Device::class,
            foreignKey: 'device_id',
        );
    }

    public function shell(): BelongsTo
    {
        return $this->belongsTo(
            related: Shell::class,
            foreignKey: 'shell_id',
        );
    }
}
