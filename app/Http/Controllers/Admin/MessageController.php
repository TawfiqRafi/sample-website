<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'Contact Messages',
            'data' => Message::latest()->paginate(25)
        ];

        return view('dashboard.message.index')->with(array_merge($this->data, $data));
    }
}
