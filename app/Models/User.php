<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
//    protected $fillable = [
//        'name',
//        'email',
//        'password',
//        'phone'
//    ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasMany(Profile::class);
    }

    public function farmerProfile()
    {
        return $this->hasMany(FarmerProfile::class);
    }

    public function cattleRegister()
    {
        return $this->hasMany(CattleRegistration::class);
    }

    public function companyPolicy()
    {
        return $this->hasMany(CompanyPolicy::class);
    }

    public function companyPackage()
    {
        return $this->hasMany(Package::class);
    }

    public function insuranceHistory()
    {
        return $this->hasMany(Order::class);
    }

    public static function calculateTotalCost($cost, $rate, $discount, $vat)
    {
        if ($cost == null || $rate == null || $discount == null || $vat == null) {
            return 0;
        } else {

            $total_ctl = ($cost * $rate / 100);
            $total_off = ($total_ctl * $discount / 100);
            $total_main = ($total_off * $vat / 100);
            return $total_main + $total_off;
        }
        return 0;
    }


    public static function addYearsAndMonths($input)
    {
        // Split the input into years and months based on the decimal point
        list($years, $months) = explode('.', $input);

        // Create a Carbon instance with the current date
        $date = Carbon::now();

        // Add the years and months to the date
        $date->addYears($years);
        $date->addMonths($months);

        return $date;
    }


}
