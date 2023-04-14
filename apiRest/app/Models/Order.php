<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_client',
        'name_client',
        'addres_client',
        'cellphone_client'
    ];

    public function products() {
        return $this->belongsToMany(Product::class)
        ->withPivot(['stockRequired','pryce']);
    }
}
