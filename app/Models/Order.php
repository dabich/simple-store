<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Stripe\Charge;
use Stripe\Stripe;

/**
 * @property integer quantity
 * @property Product[] products
 * @property OrderProducts[] items
 */
class Order extends Model
{
    use HasTimestamps;
    use SoftDeletes;
    use Notifiable;

    const STATUS_WAITING = 0;
    const STATUS_FAIL = 1;
    const STATUS_PAID = 2;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
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

    public function pay($stripeToken, $amount, $currency = 'usd')
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            if (!$stripeToken)
                throw new Exception("The Stripe Token was not generated correctly");

            $charge = Charge::create([
                "amount" => $amount * 100,
                "currency" => $currency,
                "card" => $stripeToken
            ]);

            return (object) [
                'status' => true,
                'message' => 'Success',
                'charge' => $charge
            ];
        }
        catch (Exception $e) {
            return (object) [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
