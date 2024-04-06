<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class courseController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'course List',
            'courses' => Course::all()
        ];

        return view('dashboard.course.index')->with(array_merge($this->data, $data));
    }

    public function create()
    {
        $data = [
            'page_title' => 'Create new course',
        ];

        return view('dashboard.course.create')->with(array_merge($this->data, $data));
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

        $course = new Course();
        $course->title = $request->get('title');
        $course->short_description = $request->get('short_description');
        $course->description = $request->get('description');
        if ($request->has('image')) {
            $path = Helpers::file_upload($request,'image','course');
        }
        $course->image = $path;


        if ($course->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success',
                'message' => 'course saved successfully',
                'redirect' => route('course.list')
            ]);
        }

        return response()->json([
            'type' => 'warning',
            'title' => 'Failed',
            'message' => 'course failed to save'
        ]);
    }

    public function edit($slug)
    {
        $data = [
            'page_title' => 'Update course',
            'course' => Course::where('slug',$slug)->first()
        ];

        return view('dashboard.course.edit')->with(array_merge($this->data, $data));
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

        $course = Course::where('slug',$slug)->first();
        $course->title = $request->get('title');
        $course->short_description = $request->get('short_description');
        $course->description = $request->get('description');
        if ($request->has('image')) {
            if (isset($course) && $course->image) {
                unlink($course->image);
            }
            $path = Helpers::file_upload($request,'image','course');
            $course->image = $path;
        }


        if ($course->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success',
                'message' => 'course updated successfully',
                'redirect' => route('course.list')
            ]);
        }

        return response()->json([
            'type' => 'warning',
            'title' => 'Failed',
            'message' => 'course failed to update'
        ]);
    }

    public function destroy($slug)
    {
        $course = Course::where('slug',$slug)->first();
        if($course->delete()){
            return response()->json([
                'type' => 'success',
                'title' => 'Deleted',
                'message' => 'course has been deleted',
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed',
            'message' => 'Failed to delete course',
        ]);

    }
}
