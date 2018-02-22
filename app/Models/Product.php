<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int price
 */
class Product extends Model
{
    use SoftDeletes;
    use HasTimestamps;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'price'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function orders()
    {
        return $this->hasManyThrough(
            Order::class,
            OrderProducts::class,
            'product_id',
            'id'
        );
    }
}
