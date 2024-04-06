<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function index()
    {
        $page = Page::where(['type' => 'about_us'])->first();
        if ($page == false) {
            $page = [
                'type' => 'about_us',
            ];
            Page::insert($page);
            $page = Page::where(['type' => 'about_us'])->first();
        }

        $data = [
            'page_title' => 'About Us',
            'data' => $page
        ];

        return view('dashboard.about-us.index')->with(array_merge($this->data, $data));
    }

    public function store(Request $request)
    {
        $rules = [
            'content' => 'required',
        ];
        //validation
        $this->validate($request, $rules);

        $about_us = Page::where(['type' => 'about_us'])->first();
        $path = $about_us->image;
        if ($request->has('image')) {
            if (isset($about_us) && $about_us->image) {
                unlink($about_us->image);
            }
            $path = Helpers::file_upload($request,'image','page');
        }

        DB::table('pages')->updateOrInsert(['type' => 'about_us'], [
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'image' => $path,
        ]);

        return response()->json([
            'type' => 'success',
            'title' => 'Success',
            'message' => 'About Us saved successfully',
            'redirect' => route('about-us.index')
        ]);
    }
}
