<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;

class CheckSelProductlRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value )
    {
        echo "<pre>";
        // print_r(request()->all());
        foreach(request()->productName as $x => $val){
            $pro_qt=DB::table('product')->where('id', $val)->first();
            if($pro_qt->quantity < request()->quantity[$x]){
                return false;
            }
        }
        // return false;
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'product as out of stock. place check product stock.';
    }
}
