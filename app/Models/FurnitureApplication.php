<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FurnitureApplication extends Model
{
    use HasFactory;

    protected $table = 'furniture_application';

    protected $fillable = ['furniture_id', 'application_id'];
}
