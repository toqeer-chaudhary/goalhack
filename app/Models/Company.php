<?php

namespace App\Models;
use DB;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class Company extends Authenticatable
{

    use Notifiable;
    use Billable;

    protected $fillable = [
        'name', 'email','address','contact' ,'website', 'city', 'province', 'country','password','verify_token',
    ];

    public function levels()
    {
        return $this->hasMany(Level::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function visions()
    {
        return $this->hasMany(Vision::class);
    }
    public function licence()
    {
        return $this->hasOne(Licence::class);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //get user by id
    public function getCompanyByEmail($email)
    {
        $company = DB::table('companies')->where('email', $email)->get();

        return $company;
    }

    //store company info
    public function storeCompanyDetails($comapnyDetail)
    {
        return $this::create($comapnyDetail);
    }
}
