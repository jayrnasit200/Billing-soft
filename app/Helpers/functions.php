<?php
		if (!function_exists('referral_code_generate')) {
		    function referral_code_generate($length_of_string)
		    {
		        $str_result = '0123456789abcdefghijklmnopqrstuvwxyz';
		        return substr(str_shuffle($str_result), 0, $length_of_string);
		    }
		}
		
		if (!function_exists('get_all_brand')) {
		    function get_all_brand()
		    {
		        return DB::table('brand')->select('id','name')->get();
		    }
		}
		
		
?>
