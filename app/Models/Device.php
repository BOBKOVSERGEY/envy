<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
      'name',
      'type',
      'os',
      'architecture',
      'identifier',
      'default',
      'user_id',
      'synced_at'
    ];

    protected $casts = [
      'default' => 'boolean',
      'synced_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(
          related: User::class,
          foreignKey: 'user_id'
        );
    }
}
