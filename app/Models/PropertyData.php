<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyData extends Model
{
    use HasFactory, Filterable;
    protected $fillable = [
        'name',
        'price',
        'bedrooms',
        'bathrooms',
        'storeys',
        'garages'
    ];

    protected $casts = [
        'price' => 'integer',
        'bedrooms' => 'integer',
        'bathrooms' => 'integer',
        'storeys' => 'integer',
        'garages' => 'integer',
    ];

    public const SORT_FIELDS = [
        'id',
        'name',
    ];
    public const SORT_DEFAULT = [
        'sort_by' => 'id',
        'order_by' => 'asc',
        'per_page' => 10,
    ];
}
