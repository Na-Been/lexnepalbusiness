<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Userfeedback;
use Illuminate\Http\Request;
use Modules\About\Entities\About;
use Modules\Blog\Entities\Blog;
use Modules\Cases\Entities\Cases;
use Modules\Cases\Entities\Category;
use Modules\Offers\Entities\Offer;
use Modules\Performance\Entities\Performance;
use Modules\Services\Entities\Service;
use Modules\Slider\Entities\Slider;
use Modules\Team\Entities\Team;
use Modules\Testimony\Entities\Testimony;

class HomeController extends Controller
{
    public function index()
    {
        $about = About::latest()->first();
        $services = Service::latest()->take(6)->get();
        $slider = Slider::where('section', 'Home Page')->first();
        $cases = Cases::latest()->take(8)->get();
        $teams = Team::latest()->take(4)->get();
        $testimonies = Testimony::latest()->take(2)->get();
        $blogs = Blog::latest()->take(3)->get();
        $offer = Offer::latest()->first();
        $performances = Performance::latest()->take(3)->get();
        return view('frontend.home', compact('performances', 'blogs', 'offer', 'testimonies', 'teams', 'cases', 'slider', 'services', 'about'));
    }

    public function about()
    {
        $abouts = About::latest()->get();
        $services = Service::latest()->take(3)->get();
        $slider = Slider::where('section', 'About Page')->first();
        return view('frontend.about', compact('abouts', 'slider', 'services'));
    }

    public function service()
    {
        $services = Service::latest()->get();
        $slider = Slider::where('section', 'Service Page')->first();
        return view('frontend.service', compact('services', 'slider'));
    }

    public function case()
    {
        $categories = Category::all();
        $cases = Cases::all();
        $slider = Slider::where('section', 'Case Study Page')->first();
        return view('frontend.case', compact('cases', 'categories', 'slider'));
    }

    public function blog()
    {
        $slider = Slider::where('section', 'Blog Page')->first();
        $blogs = Blog::latest()->get();
        $services = Service::latest()->take(3)->get();
        return view('frontend.blog', compact('services', 'blogs', 'slider'));
    }

    public function contact()
    {
        $slider = Slider::where('section', 'Contact Page')->first();
        return view('frontend.contact', compact('slider'));
    }

    public function blogDetails($slug)
    {
        $findBlog = Blog::where('slug', $slug)->first();
        $slider = Slider::where('section', 'Blog Page')->first();
        $services = Service::latest()->take(3)->get();
        return view('frontend.blogDetails', compact('services', 'slider', 'findBlog'));
    }

    public function serviceDetails($slug)
    {
        $findService = Service::where('slug', $slug)->first();
        $slider = Slider::where('section', 'Service Page')->first();
        $blogs = Blog::latest()->take(3)->get();
        return view('frontend.serviceDetails', compact('slider', 'findService', 'blogs'));
    }

    public function caseDetails($slug)
    {
        $findCase = Cases::where('slug', $slug)->first();
        $slider = Slider::where('section', 'Case Study Page')->first();
        $cases = Cases::latest()->take(3)->get();
        return view('frontend.caseDetails', compact('slider', 'findCase', 'cases'));
    }

    public function aboutDetails($slug)
    {
        $findAbout = About::where('slug', $slug)->first();
        $slider = Slider::where('section', 'About Page')->first();
        $services = Service::latest()->take(3)->get();
        return view('frontend.aboutDetails', compact('slider', 'findAbout', 'services'));
    }

    public function casesAsCategory($slug)
    {
        $findCategory = Category::where('slug', $slug)->first();
        $cases = Cases::where('category_id', $findCategory->id)->get();
        $categories = Category::all();
        $slider = Slider::where('section', 'Case Study Page')->first();
        return view('frontend.case', compact('cases', 'categories', 'slider'));
    }

    public function userFeedback(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'project_date' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        try {
            Userfeedback::create($validateData);
            return back()->with('success', 'Thanks For Your Appointment. We Will Contact You Soon');
        } catch (\Exception $e) {
            return back()->with('failed', 'Appointment. Cannot Be Created');
        }
    }
}

