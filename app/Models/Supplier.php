<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $fillable = [
        'supplier_name',
        'supplier_description',
        'supplier_service',
        'supplier_address',
        'supplier_contact'
    ];
}
