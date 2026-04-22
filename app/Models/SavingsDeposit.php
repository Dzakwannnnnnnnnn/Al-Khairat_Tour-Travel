<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavingsDeposit extends Model
{
    protected $fillable = [
        'savings_plan_id',
        'amount',
        'proof_path',
        'status',
        'note',
    ];

    public function plan() {
        return $this->belongsTo(SavingsPlan::class, 'savings_plan_id');
    }
}
