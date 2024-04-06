<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'Newsletter Subscriber',
            'data' => Newsletter::latest()->paginate(25)
        ];

        return view('dashboard.newsletter.index')->with(array_merge($this->data, $data));
    }
}
