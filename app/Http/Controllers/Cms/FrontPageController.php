<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms\About;
use App\Models\Cms\Achievement;
use App\Models\Cms\Blog;
use App\Models\Cms\Gallery;
use App\Models\Cms\ProductandService;
use App\Models\Cms\Slider;
use App\Models\Cms\Team;
use App\Models\Cms\Testimonial;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
//    public function index(){
//        return view("front.v2.front");
//    }

    public function front(){
        $galleries= Gallery::all();
        $sliders = Slider::all();
        $services=ProductandService::all();
        $blogs=Blog::all();
        $teams=Team::all();
        $testimonials=Testimonial::all();
        $abouts=About::all();
        $achievements=Achievement::all();

        return view("front.v2.front", compact('galleries',"sliders","blogs","services","teams","testimonials","abouts",'achievements'));
    }










}
