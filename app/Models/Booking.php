<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'booking_code',
        'group_code',
        'booking_seat',
        'total_price',
        'status',
        'full_name',
        'birth_place',
        'birth_date',
        'address',
        'nik',
        'orderer_phone',
        'orderer_email',
        'room_variant',
        'voucher_code',
        'notes',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function product() {
        return $this->belongsTo(Product::class);
    }
    public function payment() {
        return $this->hasOne(Payment::class)->latestOfMany();
    }
    public function payments() {
        return $this->hasMany(Payment::class);
    }
}
