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

		if (!function_exists('get_all_gst')) {
		    function get_all_gst()
		    {
		        return DB::table('gst')->select('id','name','valu')->get();
		    }
		}

		if (!function_exists('current_date_time')) {
		    function current_date_time()
		    {
		        return date("Y-m-d")." ". date("h:i:s");
		    }
		}
		if (!function_exists('get_all_products')) {
		    function get_all_products()
		    {
		        return DB::table('product')->where('ststus', 'available')->select('id','name','quantity','MRP','rate','GST')->get();
		    }
		}
		
		if (!function_exists('get_all_sellr_Client')) {
		    function get_all_sellr_Client()
		    {
		        return DB::table('sell_client')->select('id','client_name','client_gst_no','client_Contact','client_address')->get();
		    }
		}
		if (!function_exists('sys_config_all')) {
		    function sys_config_all()
		    {
		        $config_data = DB::table('system_config')->get()->all();
		        $result = [];
		        foreach ($config_data as $val) {
		            $result[$val->option] = $val->value;
		        }
		        return $result;
		    }
		}

		if (!function_exists('sys_config')) {
		    function sys_config($option)
		    {
		        $value =DB::table('system_config')->select('value')
		            ->where('option', '=', $option)
		            ->get()
		            ->first()->value;
		        return $value;
		    }
		}
		
?>
