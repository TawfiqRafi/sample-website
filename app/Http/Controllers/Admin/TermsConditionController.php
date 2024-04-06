<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TermsConditionController extends Controller
{
    public function index()
    {
        $page = Page::where(['type' => 'terms_condition'])->first();
        if ($page == false) {
            $page = [
                'type' => 'terms_condition',
            ];
            Page::insert($page);
            $page = Page::where(['type' => 'terms_condition'])->first();
        }

        $data = [
            'page_title' => 'Terms & Condition',
            'data' => $page
        ];

        return view('dashboard.terms-condition.index')->with(array_merge($this->data, $data));
    }

    public function store(Request $request)
    {
        $rules = [
            'content' => 'required',
        ];
        //validation
        $this->validate($request, $rules);

        $terms_condition = Page::where(['type' => 'terms_condition'])->first();
        $path = $terms_condition->image;
        if ($request->has('image')) {
            if (isset($terms_condition) && $terms_condition->image) {
                unlink($terms_condition->image);
            }
            $path = Helpers::file_upload($request,'image','page');
        }

        DB::table('pages')->updateOrInsert(['type' => 'terms_condition'], [
            'content' => $request->get('content'),
            'image' => $path,
        ]);

        return response()->json([
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Terms & Condition saved successfully',
            'redirect' => route('terms-condition.index')
        ]);
    }
}
