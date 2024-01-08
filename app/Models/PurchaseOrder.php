<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $table = 'purchase_order';

    protected $fillable = [
        'supplier_id',
        'no_po',
        'tanggal_kirim',
        'pemesan',
    ];

    protected $with = ['stock_ins'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['supplier'] ?? false, function ($query, $supplier) {
            return $query->whereHas('supplier', function ($query) use ($supplier) {
                $query->where('name', $supplier);
            });
        });

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('no_po', 'like', '%' . $search . '%');
        });
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function stock_ins()
    {
        return $this->hasMany(StockIn::class);
    }
}
