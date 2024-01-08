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
        'no_po_buyer',
        'port_of_loading',
        'port_of_destination',
        'terms_and_conditions',
    ];

    protected $with = ['stock_outs'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('no_invoice', 'like', '%' . $search . '%');
        });
    }

    public function stock_outs()
    {
        return $this->hasMany(StockOut::class);
    }
}
