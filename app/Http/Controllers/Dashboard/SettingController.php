<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $settings = Setting::first();
        return view("Dashboard.settings.index" , compact("settings"));
    }
    public function store(Request $request ){
        // Create Data

        $setting = Setting::first();

        if($setting) {
            //update
            $setting->update([
                "site_name" => $request->site_name ,
                "site_desc" => $request->site_desc,
                "site_logo" => $request->site_logo ,
                "site_cover" => $request->site_cover,
                "site_icon" => $request->site_icon,
                "sales_programAndService_phone1" => $request->sales_programAndService_phone1,
                "sales_programAndService_phone2" => $request->sales_programAndService_phone2,
                "sales_marketingService_phone1" => $request->sales_marketingService_phone1,
                "sales_marketingService_phone2" => $request->sales_marketingService_phone2,
                "sales_it_phone1" => $request->sales_it_phone1,
                "sales_it_phone2" => $request->sales_it_phone2,
                "technical_programAndService_phone1" => $request->technical_programAndService_phone1,
                "technical_programAndService_phone2" => $request->technical_programAndService_phone2,
                "technical_marketingService_phone1" => $request->technical_marketingService_phone1,
                "technical_marketingService_phone2" => $request->technical_marketingService_phone2,
                "technical_it_phone1" => $request->technical_it_phone1,
                "technical_it_phone2" => $request->technical_it_phone2,
                "manager_phone1" => $request->manager_phone1,
                "manager_phone2" => $request->manager_phone2,
                "whatsapp" => $request->whatsapp,
                "facebook" => $request->facebook,
                "twitter" => $request->twitter,
                "instagram" => $request->instagram,
                "youtube" => $request->youtube,
                "telegram" => $request->telegram,
                "linkedIn" => $request->linkedIn,
                "github" => $request->github,
                "link1" => $request->link1,
                "link2" => $request->link2,
                "link3" => $request->link3,
                "addressAr" => $request->addressAr,
                "addressEn" => $request->addressEn,
                "email" => $request->email
            ]);
        }else{
            // create
                 Setting::create([
                "site_name" => $request->site_name ,
                "site_desc" => $request->site_desc,
                "site_logo" => $request->site_logo ,
                "site_cover" => $request->site_cover,
                "site_icon" => $request->site_icon,
                "sales_programAndService_phone1" => $request->sales_programAndService_phone1,
                "sales_programAndService_phone2" => $request->sales_programAndService_phone2,
                "sales_marketingService_phone1" => $request->sales_marketingService_phone1,
                "sales_marketingService_phone2" => $request->sales_marketingService_phone2,
                "sales_it_phone1" => $request->sales_it_phone1,
                "sales_it_phone2" => $request->sales_it_phone2,
                "technical_programAndService_phone1" => $request->technical_programAndService_phone1,
                "technical_programAndService_phone2" => $request->technical_programAndService_phone2,
                "technical_marketingService_phone1" => $request->technical_marketingService_phone1,
                "technical_marketingService_phone2" => $request->technical_marketingService_phone2,
                "technical_it_phone1" => $request->technical_it_phone1,
                "technical_it_phone2" => $request->technical_it_phone2,
                "manager_phone1" => $request->manager_phone1,
                "manager_phone2" => $request->manager_phone2,
                "whatsapp" => $request->whatsapp,
                "facebook" => $request->facebook,
                "twitter" => $request->twitter,
                "instagram" => $request->instagram,
                "youtube" => $request->youtube,
                "telegram" => $request->telegram,
                "linkedIn" => $request->linkedIn,
                "github" => $request->github,
                "link1" => $request->link1,
                "link2" => $request->link2,
                "link3" => $request->link3,
                "addressAr" => $request->addressAr,
                "addressEn" => $request->addressEn,
                "email" => $request->email,
            ]);

            return redirect()->back();
        }
    }
}
