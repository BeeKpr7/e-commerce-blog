<?php

namespace App\Models;

use App\Models\Sku;
use App\Models\User;
use App\Models\Coupon;
use App\Models\Address;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected array $fillable = [
        'user_id',
        'address_id',
        'coupon_id',
        'payment_id',
        'status',
        'total',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    public function skus()
    {
        return $this->belongsToMany(Sku::class)->withPivot('quantity');
    }
}
