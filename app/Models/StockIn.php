<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    use HasFactory;

    protected $table = 'stock_in';

    protected $fillable = [
        'purchase_order_id',
        'furniture_id',
        'sku',
        'furniture_sku',
        'furniture_name',
        'furniture_price',
        'amount',
        'initial_stock',
        'final_stock',
        'total',
    ];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['purchase_order'] ?? false, function ($query, $purchase_order) {
            return $query->whereHas('purchase_order', function ($query) use ($purchase_order) {
                $query->where('no_po', $purchase_order);
            });
        });

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('furniture_name', 'like', '%' . $search . '%')->orWhere('furniture_sku', 'like', '%' . $search . '%');
        });
    }

    public function purchase_order()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }
}
