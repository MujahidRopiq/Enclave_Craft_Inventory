<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FurnitureFinishing extends Model
{
    use HasFactory;

    protected $table = 'furniture_finishing';

    protected $fillable = ['furniture_id', 'finishing_id'];
}
