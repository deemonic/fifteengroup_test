<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_number',
        'contact_id',
        'order_total'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'order_total' => 'float'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    /**
     * @return int
     */
    public function generateOrderNumber()
    {
        return $order_number = mt_rand();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lineItem()
    {
        return $this->hasMany(LineItem::class, 'order_number');
    }

}
