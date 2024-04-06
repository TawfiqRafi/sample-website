<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSettings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SiteSettingsController extends Controller
{
    public function index()
    {
        $settings = SiteSettings::first();
        if ($settings == false) {
            $settings = [
                'type' => 'site_settings',
            ];
            SiteSettings::insert($settings);
            $settings = SiteSettings::first();
        }

        $data = [
            'page_title' => 'Site Settings',
            'data' => $settings
        ];

        return view('dashboard.settings.index')->with(array_merge($this->data, $data));
    }

    public function store(Request $request)
    {
        $site_settings = SiteSettings::where(['type' => 'site_settings'])->first();
        $path = $site_settings->logo;
        $site_settings = SiteSettings::where(['type' => 'site_settings'])->first();
        $path2 = $site_settings->logo_scroll;
        if ($request->has('logo')) {
            if (isset($site_settings) && $site_settings->logo) {
                unlink($site_settings->logo);
            }
            $path = Helpers::file_upload($request,'logo','site_settings');
        }
        if ($request->has('logo_scroll')) {
            if (isset($site_settings) && $site_settings->logo_scroll) {
                unlink($site_settings->logo_scroll);
            }
            $path2 = Helpers::file_upload($request,'logo_scroll','site_settings');
        }

        DB::table('site_settings')->updateOrInsert(['type' => 'site_settings'], [
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'facebook' => $request->get('facebook'),
            'instagram' => $request->get('instagram'),
            'twitter' => $request->get('twitter'),
            'linkedin' => $request->get('linkedin'),
            'youtube' => $request->get('youtube'),
            'footer_text' => $request->get('footer_text'),
            'footer_link' => $request->get('footer_link'),
            'logo' => $path,
            'logo_scroll' => $path2,
        ]);

        return response()->json([
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Site settings saved successfully',
            'redirect' => route('settings.index')
        ]);
    }
}
