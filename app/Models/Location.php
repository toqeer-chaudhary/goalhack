<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;
class Location extends Model
{
    protected $fillable = [
        'user_id','ip_address','country_code', 'country_name','region_name','city_name',
        'zip_code','post_code','latitude','longitude','time_zone','address',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function GoalData()
    {
        return $this->belongsTo(GoalData::class);
    }

    public function storeLocation($geo, $request)
    {
        $user = Auth::user();
        $location = new Location;
        $ipLocation = $geo->getCity($request->ip());
        $location['user_id'] = $user->id;
        $location['goaldatas_id'] = $request->changed_goal_data_id;
        $location['ip_address'] = $ipLocation->getIpAddress();
        $location['country_code'] = $ipLocation->getCountryCode();
        $location['country_name'] = $ipLocation->getCountryName();
        $location['region_name'] = $ipLocation->getRegionName();
        $location['city_name'] = $ipLocation->getCityName();
        $location['zip_code'] = $ipLocation->getZipCode();
        $location['post_code'] = $ipLocation->getPostCode();
        $location['latitude'] = $ipLocation->getLatitude();
        $location['longitude'] = $ipLocation->getLongitude();
        $location['time_zone'] = $ipLocation->getTimeZone();
        $location['address'] = $ipLocation->getAddressString();
        $location->save();
    }
    public function showLoginUserLocation($geo,$request)
    {
        $ipLocation = $geo->getCity($request->ip());
        $zipcode = $ipLocation->getZipCode();
        $address = $ipLocation->getAddressString();
        $city = $ipLocation->getCityName();
        $country = $ipLocation->getCountryName();
        $ip = $ipLocation->getIpAddress();
        $location[] = "";
        //dd($location);
        array_push($location, $address);
        array_push($location, $city);
        array_push($location, $country);
        array_push($location, $zipcode);
        array_push($location, $ip);
        return $location;
    }
}
