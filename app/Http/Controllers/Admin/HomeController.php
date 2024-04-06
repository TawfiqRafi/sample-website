<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $page = Page::where(['type' => 'home'])->first();
        if ($page == false) {
            $page = [
                'type' => 'home',
            ];
            Page::insert($page);
            $page = Page::where(['type' => 'home'])->first();
        }

        $data = [
            'page_title' => 'Home',
            'data' => $page
        ];

        return view('dashboard.home.index')->with(array_merge($this->data, $data));
    }

    public function store(Request $request)
    {
        $rules = [
            'content' => 'required',
        ];
        //validation
        $this->validate($request, $rules);
        $home = Page::where(['type' => 'home'])->first();
        $path = $home->image;
        if ($request->has('image')) {
            if (isset($home) && $home->image) {
                unlink($home->image);
            }
            $path = Helpers::file_upload($request,'image','page');
        }

        DB::table('pages')->updateOrInsert(['type' => 'home'], [
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'image' => $path,
        ]);

        return response()->json([
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Home saved successfully',
            'redirect' => route('home.index')
        ]);
    }
}
