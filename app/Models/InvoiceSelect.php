<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceSelect extends Model
{
    use HasFactory;

    protected $table = 'invoice_select';

    protected $fillable = [
        'furniture_id',
    ];

    public function furniture()
    {
        return $this->belongsTo(Furniture::class);
    }
}
