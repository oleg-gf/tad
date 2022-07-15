<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GearType extends Model
{
    use HasFactory;

    protected $fillable = [
        'gear_type',
    ];

    public function carModels()
    {
        return $this->hasMany(CarModel::class);
    }
}
