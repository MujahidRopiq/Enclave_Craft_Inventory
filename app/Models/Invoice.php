<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoice';

    protected $fillable = [
        'no_invoice',
        'consignee',
        'detail_consignee',
        'no_po_buyer',
        'port_of_loading',
        'port_of_destination',
        'terms_and_conditions',
        // 'deadline',
        'qty',
        'price',
        'total',
        'status',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query
                ->whereHas('furniture', function ($query) use ($search) {
                    $query
                        ->where('name', 'like', '%' . $search . '%')
                        ->orWhere('sku', 'like', '%' . $search . '%');
                })
                ->orwhere('no_invoice', 'like', '%' . $search . '%')
                ->orwhere('consignee', 'like', '%' . $search . '%');
        });

        $query->when($filters['status'] ?? false, function ($query, $status) {
            return $query
                ->where('status', $status);
        });
    }

    public function invoice_furnitures()
    {
        return $this->hasMany(InvoiceFurniture::class);
    }
}
