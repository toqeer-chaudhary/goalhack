<?php

namespace App\Models;

use App\Mail\BlockAndUnblockMail;
use App\Models\Location;
use App\Mail\UserAssignment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Mail;
use Laravel\Cashier\Billable;
use DB;
class User extends Authenticatable
{
    use Notifiable;
    use Billable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','last_name','company_id', 'email','password','designation','level_id',
        'country','province','city','address','contact' ,'verify_token','image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function visions()
    {
        return $this->belongsToMany(Vision::class)
            ->withPivot("manager_id")->withTimestamps();
    }
    public function strategies()
    {
        return $this->belongsToMany(Strategy::class)
            ->withPivot("manager_id")->withTimestamps();
    }
    public function kpis()
    {
        return $this->belongsToMany(Kpi::class)
            ->withPivot("manager_id")->withTimestamps();
    }
    public function goal()
    {
        return $this->belongsToMany(Goal::class)
            ->withPivot("manager_id")->withTimestamps();
    }
    public function goalDatas()
    {
        return $this->hasMany(GoalData::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
    
    //get user by id
    public function getUserByEmail($email)
    {
        $user = DB::table('users')->where('email', $email)->get();
        return $user;
    }

//    public function isExist($Email)
//    {
//        // checking whether the name already exist or not
//         $result=$this::all()->where("email","=",$Email)->count();
//        return $result;
//    }

    public function showAllUsers()
    {
        return self::all();
    }

    // for storing in User table (user_id)
    public static function assignUsers($assignedUserIds,$loggedInUser,$functionality,$originalFunctionality)
    {
      // finding the manager to send his email and his name while sending email
        $manager = self::find($loggedInUser);
        // converting string to array format because attach accepts second parameter as array
        $managerId["manager_id"] = $loggedInUser;
        foreach ($assignedUserIds as $assignedUserId)
        {
            // this condition will check if the user is already assigned against a particular strategy
            if ($functionality->users()->wherePivot("user_id","=",$assignedUserId)->count() > 0)
            {
                continue;
            }
            else {
                // attaching user to strategy
                $functionality->users()->attach($assignedUserId, $managerId);
                // finding the user to send his email and his name while sending email
                // $originalFunctionality maybe vision,strategy,kpi, goal
                $user = self::find($assignedUserId);
                Mail::send(new UserAssignment($user->name,$user->email,$originalFunctionality,
                    $functionality->name,$manager->name,$manager->email));
            }
        }
    }

    // fetching all users where user_id = $creatorId
    public static function fetchAllUsersByUser_id($creatorId)
    {
       return self::all()->where("user_id","=",$creatorId);
    }

    public static function updateAssignUsers($reAssignedUsersIds,$loggedInUser,$functionality)
    {
        // creating an array in the required fromat do not understand just return it and see the result in network
        foreach ($reAssignedUsersIds as $reAssignedUsersIds)
//             ?????? wow amazing that solve the issue
        $reAssignedUsersIdsWithManagerId [$reAssignedUsersIds] = [
            "manager_id"=> $loggedInUser,
        ];
//        return $reAssignedUsersIdsWithManagerId;
        $functionality->users()->sync($reAssignedUsersIdsWithManagerId);
    }

    //    block and block the user
        public function blockUser($userId)
        {
            $user = self::find($userId);
            $user->status = 0;
            $user->is_blocked = Auth()->id(); // manager id
            $user->update();
        }

        //    block and unblock the user
        public function unblockUser($userId)
        {
            $user = self::find($userId);
            // getting the manager
            $manager = self::find($user->is_blocked);
            $user->status = 1;
            $user->is_blocked = null; // manager id
            $user->update();
            Mail::send(new BlockAndUnblockMail($user->name,$user->email,
                "Your account is unblocked please work hard and work smart"
                ,$manager->name,$manager->email,"You Are Un Blocked"));
        }
        public function changeCustomer($id)
        {
            $user = $this::find($id);
            $user->stripe_id = null;
            $user->update();
            return true;
        }
}
