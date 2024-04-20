<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'product List',
            'products' => Product::all()
        ];

        return view('dashboard.product.index')->with(array_merge($this->data, $data));
    }

    public function create()
    {
        $data = [
            'page_title' => 'Create new product',
        ];

        return view('dashboard.product.create')->with(array_merge($this->data, $data));
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'required',
        ];
        //validation
        $this->validate($request, $rules);

        $product = new Product();
        $product->title = $request->get('title');
        $product->short_description = $request->get('short_description');
        $product->description = $request->get('description');
        if ($request->has('image')) {
            $path = Helpers::file_upload($request,'image','product');
        }
        $product->image = $path;


        if ($product->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success',
                'message' => 'product saved successfully',
                'redirect' => route('product.list')
            ]);
        }

        return response()->json([
            'type' => 'warning',
            'title' => 'Failed',
            'message' => 'product failed to save'
        ]);
    }

    public function edit($slug)
    {
        $data = [
            'page_title' => 'Update product',
            'product' => Product::where('slug',$slug)->first()
        ];

        return view('dashboard.product.edit')->with(array_merge($this->data, $data));
    }

    public function update(Request $request, $slug)
    {
        $rules = [
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ];
        //validation
        $this->validate($request, $rules);

        $product = Product::where('slug',$slug)->first();
        $product->title = $request->get('title');
        $product->short_description = $request->get('short_description');
        $product->description = $request->get('description');
        if ($request->has('image')) {
            if (isset($product) && $product->image) {
                unlink($product->image);
            }
            $path = Helpers::file_upload($request,'image','product');
            $product->image = $path;
        }


        if ($product->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success',
                'message' => 'product updated successfully',
                'redirect' => route('product.list')
            ]);
        }

        return response()->json([
            'type' => 'warning',
            'title' => 'Failed',
            'message' => 'product failed to update'
        ]);
    }

    public function destroy($slug)
    {
        $product = Product::where('slug',$slug)->first();
        if($product->delete()){
            return response()->json([
                'type' => 'success',
                'title' => 'Deleted',
                'message' => 'product has been deleted',
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed',
            'message' => 'Failed to delete product',
        ]);

    }
}
