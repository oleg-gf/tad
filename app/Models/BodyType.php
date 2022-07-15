<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodyType extends Model
{
    use HasFactory;

    protected $fillable = [
        'body_type',
    ];

    public function carModels()
    {
        return $this->hasMany(CarModel::class);
    }
}
