<?php

namespace App\Models;

use App\Models\Farm_management\Animal_information;
use App\Models\Farm_management\FeedingAndNutrition;
use App\Models\Farm_management\financial\BudgetingAndForecasting;
use App\Models\Farm_management\financial\Expense;
use App\Models\Farm_management\financial\IncomeAndSell;
use App\Models\Farm_management\ReproductionAndBreeding;
use Carbon\Carbon;
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

    public function insurance_claimed()
    {
        return $this->hasMany(InsuranceClaim::class);
    }


//    -------------------- Farm Management --------------------

    public function farm()
    {
        return $this->hasMany(Firm::class);

    }

//    -------------------- Farm Management --------------------

//    -------------------- cattle registration verification report --------------------

    public function cattle_registration_verification_report()
    {
        return $this->hasMany(CattleRegReport::class);
    }


//    -------------------- cattle registration verification report --------------------

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


//    --------------------- relation between user and permission table ---------------------

    public function permission()
    {
        return $this->hasOne(Permission::class);
    }

//    --------------------- relation between user and permission table ---------------------

//    --------------------- farmer will be request for insurance ---------------------

    public function farmer_req_for_ins()
    {
        return $this->hasOne(InsuranceRequest::class);
    }

    public function cattle_reg_report()
    {
        return $this->hasMany(CattleRegReport::class);
    }

//    --------------------- farmer will be request for insurance ---------------------

//    --------------------- Farm management : Animal Health ---------------------

    public function animal_health()
    {
        return $this->hasMany(Animal_information::class);

    }

//    --------------------- Farm management : Animal Health ---------------------

//    --------------------- Farm management : Feeding and nutrition ---------------------

    public function feeding_and_nutrition()
    {
        return $this->hasMany(FeedingAndNutrition::class);

    }

//    --------------------- Farm management : Feeding and nutrition ---------------------

//    --------------------- Farm management : Reproduction and Breeding ---------------------

    public function reproduction_and_breeding()
    {
        return $this->hasMany(ReproductionAndBreeding::class);

    }

//    --------------------- Farm management : Reproduction and Breeding ---------------------

//    --------------------- Farm management : expenses ---------------------

    public function expense()
    {
        return $this->hasMany(Expense::class);

    }

//    --------------------- Farm management : expenses ---------------------

//    --------------------- Farm management : Income and sells ---------------------

    public function income_and_sells()
    {
        return $this->hasMany(IncomeAndSell::class);
    }


//    --------------------- Farm management : Income and sells ---------------------

//    --------------------- Farm management : Budget and forecasting ---------------------

    public function budget_and_forecasting()
    {
        return $this->hasMany(BudgetingAndForecasting::class);
    }


//    --------------------- Farm management : Budget and forecasting ---------------------


}
