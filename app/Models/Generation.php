<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'generation',
        'mark_id',
    ];

    public function carModels()
    {
        return $this->hasMany(CarModel::class);
    }
}
