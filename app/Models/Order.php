<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];


//    ------------------------- order verification ---------------------

    public static function order_verification($id)
    {
        $order = Order::where('cattle_id', $id)->where('status', 'Processing')->orWhere('status', 'Complete')->count();

        if($order > 0){
            return 1;
        }else{
            return 0;
        }
    }


//    ------------------------- order verification ---------------------

}
