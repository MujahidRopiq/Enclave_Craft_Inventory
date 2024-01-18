<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finishing extends Model
{
    use HasFactory;

    protected $table = 'finishing';

    protected $fillable = ['name'];

    protected $with = ['furnitures'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        });
    }

    public function furnitures()
    {
        return $this->belongsToMany(Furniture::class, 'furniture_finishing', 'furniture_id', 'finishing_id');
    }
}
