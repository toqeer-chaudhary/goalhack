<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class Licence extends Model
{
    protected $fillable = [
        'licence_key',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function createLicense()
    {
        $user = Auth::user();
        $user_com = $user->company_id;
        $license = auth()->user()->company->licence;
        if (auth()->user()->company->licence == null)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $key = '';
            for ($i = 0; $i < 60; $i++) {
                $key .= $characters[mt_rand(0, strlen($characters) - 1)];
            }
            $license = new Licence();
            $license['company_id'] = $user_com;
            $license['licence_key'] = $key;
            $license['isExpire'] = 1;
            $license->save();
            return $license['licence_key'];
        }
        else
        {
            $license->isExpire = 1;
            $license->update();
            return $license->licence_key;
        }
    }
    public function saveLicense($key, $companyId)
    {
        $license = new Licence();
        $license['company_id'] = $companyId;
        $license['licence_key'] = $key;
        $license->save();
        return $license['company_id'];
    }
    public function changeIsExpire($id)
    {
        //$license = auth()->user()->company->licence;
        $license = self::all()->where("company_id","",$id);
        $li = $license[0];
        $li->isExpire = 0;
        $li->update();
        return true;

    }
}
