<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingsPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'booking_id',
        'quantity',
        'target_amount',
        'monthly_target',
        'status',
        'refund_note',
        'refund_bank_name',
        'refund_bank_account',
        'refund_rejection_note',
        'refund_requested_at',
    ];

    protected $casts = [
        'refund_requested_at' => 'datetime',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function deposits() {
        return $this->hasMany(SavingsDeposit::class);
    }

    public function currentBalance() {
        return $this->deposits()->where('status', 'approved')->sum('amount');
    }

    public function progressPercentage() {
        if ($this->target_amount <= 0) return 0;
        return min(100, round(($this->currentBalance() / $this->target_amount) * 100));
    }

    public function estimatedMonths() {
        if ($this->monthly_target <= 0) return 0;
        return ceil($this->target_amount / $this->monthly_target);
    }

    public function remainingMonths() {
        if ($this->monthly_target <= 0) return 0;
        $remaining = $this->target_amount - $this->currentBalance();
        if ($remaining <= 0) return 0;
        return ceil($remaining / $this->monthly_target);
    }
}
