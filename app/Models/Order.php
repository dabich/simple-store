<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer quantity
 * @property Product[] products
 * @property OrderProducts[] items
 */
class Order extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'user_name',
        'user_email',
        'address',
        'payment_status'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:00'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function products()
    {
        return $this->hasManyThrough(
            Product::class,
            OrderProducts::class,
            'product_id',
            'id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(OrderProducts::class);
    }

    /**
     * Get the sum of all products
     * @return float|int
     */
    public function sum()
    {
        $sum = 0;
        foreach ($this->items as $item) {
            $sum += $item->quantity * $item->product->price;
        }

        return $sum;
    }
}
