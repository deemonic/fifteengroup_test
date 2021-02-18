<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product',
        'price'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'price' => 'float'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'id');
    }
}
