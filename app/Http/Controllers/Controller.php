<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SiteSettings;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $data = [];

    public function __construct()
    {
        $this->data = [
            'page_title' => 'Mx-Coding',
            'page_header' => 'Mx-Coding',
            'product_footers' => Product::latest()->limit(5)->get(),
            'settings' => SiteSettings::first(),
        ];
    }
}
