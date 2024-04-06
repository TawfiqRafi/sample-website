<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Message;
use App\Models\Newsletter;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {

        $data = [
            'page_title' => 'Home',
            'services' => Service::all(),
            'courses' => Course::all(),
            'about' => Page::where(['type' => 'about_us'])->first(),
            'home' => Page::where(['type' => 'home'])->first(),

        ];

        return view('frontend.index')->with(array_merge($this->data, $data));
    }

    public function privacy()
    {
        $page = Page::where(['type' => 'privacy_policy'])->first();
        $data = [
            'page_title' => 'Privacy & Policy',
            'data' => $page
        ];

        return view('frontend.privacy')->with(array_merge($this->data, $data));
    }
    public function terms()
    {
        $page = Page::where(['type' => 'terms_condition'])->first();
        $data = [
            'page_title' => 'Terms & Condition',
            'data' => $page
        ];

        return view('frontend.terms')->with(array_merge($this->data, $data));
    }
    public function about()
    {
        $page = Page::where(['type' => 'about_us'])->first();
        $data = [
            'page_title' => 'About Us',
            'data' => $page
        ];

        return view('frontend.about')->with(array_merge($this->data, $data));
    }
    public function services()
    {
        $data = [
            'page_title' => 'Services',
            'services' => Service::all()
        ];

        return view('frontend.services')->with(array_merge($this->data, $data));
    }
    public function serviceDetails($slug)
    {
        $data = [
            'page_title' => 'service Details',
            'service' => Service::where('slug',$slug)->first()
        ];

        return view('frontend.service-details')->with(array_merge($this->data, $data));
    }
    public function courses()
    {
        $data = [
            'page_title' => 'Courses',
            'courses' => Course::all()
        ];

        return view('frontend.courses')->with(array_merge($this->data, $data));
    }
    public function courseDetails($slug)
    {
        $data = [
            'page_title' => 'Course Details',
            'course' => Course::where('slug',$slug)->first()
        ];

        return view('frontend.course-details')->with(array_merge($this->data, $data));
    }
    public function contact()
    {
        $data = [
            'page_title' => 'Contact Us',
        ];

        return view('frontend.contact')->with(array_merge($this->data, $data));
    }

    public function contactStore(Request $request)
    {
        $message = new Message();
        $message->name = $request->get('name');
        $message->email = $request->get('email');
        $message->subject = $request->get('subject');
        $message->message = $request->get('message');


        if ($message->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Message sent successfully',
                'redirect' => route('contact')
            ]);
        }

        return response()->json([
            'type' => 'warning',
            'title' => 'Failed',
            'message' => 'Message failed to send'
        ]);
    }

    public function newsletterStore(Request $request)
    {
        $user = Newsletter::where('email',$request->email)->first();
        if($user){
            return response()->json([
                'type' => 'warning',
                'title' => 'Failed',
                'message' => 'Already Subscribed.'
            ]);
        }
        
        $message = new Newsletter();
        $message->email = $request->get('email');


        if ($message->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Subscribed Successfully',
            ]);
        }

        return response()->json([
            'type' => 'warning',
            'title' => 'Failed',
            'message' => 'Failed to subscribe'
        ]);
    }

    public function switch(Request $request, $locale)
    {
        session(['APP_LOCALE' => $locale]);
        return redirect()->back();
    }
}
