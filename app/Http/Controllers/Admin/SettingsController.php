<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Policy;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showSettings ()
    {
        $settings = Settings::first();
        return view('admin.settings.show-general-settings', compact('settings'));
    }

    public function updateSettings (Request $request)
    {
        $settings = Settings::first();

        $settings->address = $request->address;
        $settings->phone = $request->phone;
        $settings->email = $request->email;
        $settings->facebook = $request->facebook;
        $settings->twitter = $request->twitter;
        $settings->instagram = $request->instagram;
        $settings->youtube = $request->youtube;
        
        if(isset($request->logo)){

            if($settings->logo && file_exists('admin/settings/'.$settings->logo)){
                unlink('admin/settings/'.$settings->logo);
            }

            $logoName = rand().'-logo.'.$request->logo->extension(); //8767898-logo.png
            $request->logo->move('admin/settings/', $logoName);

            $settings->logo = $logoName;

        }

        if(isset($request->hero_banner)){

            if($settings->hero_banner && file_exists('admin/settings/'.$settings->hero_banner)){
                unlink('admin/settings/'.$settings->hero_banner);
            }

            $heroBannerName = rand().'-hero.'.$request->hero_banner->extension(); //8767898-hero.png
            $request->hero_banner->move('admin/settings/', $heroBannerName);

            $settings->hero_banner = $heroBannerName;

        }

        if(isset($request->top_banner1)){

            if($settings->top_banner1 && file_exists('admin/settings/'.$settings->top_banner1)){
                unlink('admin/settings/'.$settings->top_banner1);
            }

            $topBanner1 = rand().'-topone.'.$request->top_banner1->extension(); //8767898-topone.png
            $request->top_banner1->move('admin/settings/', $topBanner1);

            $settings->top_banner1 = $topBanner1;

        }

        if(isset($request->top_banner2)){

            if($settings->top_banner2 && file_exists('admin/settings/'.$settings->top_banner2)){
                unlink('admin/settings/'.$settings->top_banner2);
            }

            $topBanner2 = rand().'-topone.'.$request->top_banner2->extension(); //8767898-topone.png
            $request->top_banner2->move('admin/settings/', $topBanner2);

            $settings->top_banner2 = $topBanner2;

        }

        if(isset($request->top_banner3)){

            if($settings->top_banner3 && file_exists('admin/settings/'.$settings->top_banner3)){
                unlink('admin/settings/'.$settings->top_banner3);
            }

            $topBanner3 = rand().'-topone.'.$request->top_banner3->extension(); //8767898-topone.png
            $request->top_banner3->move('admin/settings/', $topBanner3);

            $settings->top_banner3 = $topBanner3;

        }

        $settings->save();
        toastr()->success('Settings Updated Successfully!');
        return redirect()->back();
    }

    public function showPolicies ()
    {
        $policies = Policy::first();
        return view('admin.settings.show-policies', compact('policies'));
    }

    public function updatePolicies (Request $request)
    {
        $policies = Policy::first();

        $policies->about_us = $request->about_us;
        $policies->return_process = $request->return_process;
        $policies->privacy_policy = $request->privacy_policy;
        $policies->terms_conditions = $request->terms_conditions;
        $policies->refund_policy = $request->refund_policy;
        $policies->payment_policy = $request->payment_policy;

        $policies->save();
        toastr()->success('Policy Updated Successfully!');
        return redirect()->back();
    }

    // Contact Messages...
    public function showContacts ()
    {
        $contacts = ContactMessage::paginate(20);
        return view('admin.settings.show-contacts', compact('contacts'));
    }

    public function deleteContact ($id)
    {
        $contact = ContactMessage::find($id);
        $contact->delete();

        toastr()->success('Contact Message Deleted Successfully!');
        return redirect()->back();
    }
}
