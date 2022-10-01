<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class Utility extends Model
{
    // get Setting
    public static function settings()
    {
        $data = DB::table('settings')->where('created_by', '=', 1)->get();

        $settings = [
            "facebook" => "",
            "instagram" => "",
            "linkdin" => "",
            "whatsapp" => "",
            "twitter" => "",
            "company_name" => "",
            "company_address" => "",
            "company_city" => "",
            "company_state" => "",
            "company_zipcode" => "",
            "company_country" => "",
            "company_telephone" => "",
            "company_email" => "",
            "company_email_secondary" => "",
            
           
        ];
        
        foreach($data as $row)
        {   
        
            $settings[$row->name] = $row->value;
           
        }
        
        return $settings;
    }


    public static function settingsById()
    {
        $data = DB::table('settings')->where('created_by', '=', 1)->get();

        $settings = [
            "gdpr_cookie" => "",
            "cookie_text" => "",
            "footer_text" => "© 2020 Rajodiya Infotech",
            "footer_link_1" => "Support",
            "footer_value_1" => "#",
            "footer_link_2" => "Terms",
            "footer_value_2" => "#",
            "footer_link_3" => "Privacy",
            "footer_value_3" => "#",
            "default_language" => "en",
            "enable_landing" => "on",
            "enable_rtl" => "off",
            "invoice_prefix" => "#INV",
            "site_date_format" => "M j, Y",
            "site_time_format" => "g:i A",
            "site_currency" => "USD",
            "site_currency_symbol" => "$",
            "site_currency_symbol_position" => "pre",
            "company_name" => "",
            "company_address" => "",
            "company_city" => "",
            "company_state" => "",
            "company_zipcode" => "",
            "company_country" => "",
            "company_telephone" => "",
            "company_email" => "",
            "company_email_from_name" => "",
            "invoice_template" => "template1",
            "invoice_template" => "template1",
            "invoice_color" => "ffffff",
            'interval_time' =>"",
            "telegram_accestoken" => "",
            "telegram_chatid" => "",
            "header_text" => "",

            
           
        ];
        
        foreach($data as $row)
        {   
        
            $settings[$row->name] = $row->value;
           
        }
        return $settings;
    }
   


    public static function getValByName($key)
    {
        $setting = self::settings();

        if(!isset($setting[$key]) || empty($setting[$key]))
        {
            $setting[$key] = '';
        }

        return $setting[$key];
    }

   


}
