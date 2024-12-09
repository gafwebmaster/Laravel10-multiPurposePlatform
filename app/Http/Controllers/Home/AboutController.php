<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutPage;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AboutPage()
    {
        $aboutpage = AboutPage::find(1);
        return view('admin.about_page.about_page_all', compact('aboutpage'));
    }

    public function UpdateAbout(Request $request)
    {
        $about_id = $request->id;

        if ($request->file('about_image')) {
            $imageSource = $request->file('about_image');
            $name_gen = hexdec(uniqid()) . '.' . $imageSource->getClientOriginalExtension();

            $save_url = $name_gen;

            $file = $request->file('about_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/home_about'), $filename);

            AboutPage::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,                
                'about_image' => 'upload/home_about/'.$save_url
            ]);

            $notification = [
                'message' => 'About page Updated with Image successfully',
                'alert-type' => 'success'
            ];


            return redirect()->back()->with($notification);
        } else {
            AboutPage::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,   
            ]);

            $notification = [
                'message' => 'About page Updated without image successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function HomeAbout(){        
        $aboutpage = AboutPage::find(1);        
        return view ('frontend.about_page', compact('aboutpage'));
    }

    public function AboutMultiImage(){
        return view ('admin.about_page');
    }
}
