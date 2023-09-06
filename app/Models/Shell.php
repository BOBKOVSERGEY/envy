<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Concerns\SupportsDefaultModels;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\FlareClient\Concerns\UsesTime;

class Shell extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'name'
    ];

    public function configs(): HasMany
    {
        return $this->hasMany(
            related: ShellConfig::class,
            foreignKey: 'shell_id',
        );
    }
}
