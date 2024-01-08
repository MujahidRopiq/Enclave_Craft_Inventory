<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOut extends Model
{
    use HasFactory;

    protected $table = 'stock_out';

    protected $fillable = [
        'invoice_id',
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

        $query->when($filters['invoice'] ?? false, function ($query, $invoice) {
            return $query->whereHas('invoice', function ($query) use ($invoice) {
                $query->where('no_invoice', $invoice);
            });
        });

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('furniture_name', 'like', '%' . $search . '%')->orWhere('furniture_sku', 'like', '%' . $search . '%');
        });
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
