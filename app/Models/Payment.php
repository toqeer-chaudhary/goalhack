<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'payment_amount','payment_date',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function licence()
    {
        return $this->belongsTo(Licence::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Save Payment
    public function PaymentSave($license_id, $companyId  , $package)
    {
        $payment = new Payment();
        $payment['user_id'] = $companyId;
        $payment['package_id'] = $package['0']->id;
        $payment['licence_id'] = $license_id;
        $payment['payment_amount'] =$package['0']->package_amount;
        $payment->save();
        return true;
    }
}
