<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';

    protected $fillable = [
        'name',
        'perusahaan',
        'alamat',
        'telepon',
        'spesialisasi',
    ];

    protected $with = ['purchase_orders'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        });
    }

    // public function stock_ins()
    // {
    //     return $this->hasMany(StockIn::class);
    // }

    public function purchase_orders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
}
