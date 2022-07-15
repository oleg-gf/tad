<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'car_model',
        'year',
        'run',
        'mark_id',
        'generation_id',
        'color_id',
        'body_type_id',
        'engine_type_id',
        'gear_type_id',
        'transmission_id',
    ];

    public function mark()
    {
        return $this->belongsTo(Mark::class);
    }
    public function generation()
    {
        return $this->belongsTo(Generation::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function bodyType()
    {
        return $this->belongsTo(BodyType::class);
    }
    public function engineType()
    {
        return $this->belongsTo(EngineType::class);
    }
    public function gearType()
    {
        return $this->belongsTo(GearType::class);
    }
    public function transmission()
    {
        return $this->belongsTo(Transmission::class);
    }}
