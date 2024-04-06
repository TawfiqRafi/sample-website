<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'Service List',
            'services' => Service::all()
        ];

        return view('dashboard.service.index')->with(array_merge($this->data, $data));
    }

    public function create()
    {
        $data = [
            'page_title' => 'Create new service',
        ];

        return view('dashboard.service.create')->with(array_merge($this->data, $data));
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

        $service = new Service();
        $service->title = $request->get('title');
        $service->short_description = $request->get('short_description');
        $service->description = $request->get('description');
        if ($request->has('image')) {
            $path = Helpers::file_upload($request,'image','service');
        }
        $service->image = $path;


        if ($service->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Service saved successfully',
                'redirect' => route('service.list')
            ]);
        }

        return response()->json([
            'type' => 'warning',
            'title' => 'Failed',
            'message' => 'Service failed to save'
        ]);
    }

    public function edit($slug)
    {
        $data = [
            'page_title' => 'Update service',
            'service' => Service::where('slug',$slug)->first()
        ];

        return view('dashboard.service.edit')->with(array_merge($this->data, $data));
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

        $service = Service::where('slug',$slug)->first();
        $service->title = $request->get('title');
        $service->short_description = $request->get('short_description');
        $service->description = $request->get('description');
        if ($request->has('image')) {
            if (isset($service) && $service->image) {
                unlink($service->image);
            }
            $path = Helpers::file_upload($request,'image','service');
            $service->image = $path;
        }


        if ($service->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Service updated successfully',
                'redirect' => route('service.list')
            ]);
        }

        return response()->json([
            'type' => 'warning',
            'title' => 'Failed',
            'message' => 'Service failed to update'
        ]);
    }

    public function destroy($slug)
    {
        $service = Service::where('slug',$slug)->first();
        if($service->delete()){
            return response()->json([
                'type' => 'success',
                'title' => 'Deleted',
                'message' => 'Service has been deleted',
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed',
            'message' => 'Failed to delete service',
        ]);

    }
}
