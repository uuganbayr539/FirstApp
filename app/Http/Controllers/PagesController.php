<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function index(){
        $title= 'Манай дэлгүүрээр зочлоорой';
        // return view('pages.index', compact('title'));
        return view('pages.index')-> with('title',$title);
    }
    public function about(){
        $title= 'Бидний тухай';
        return view('pages.About')-> with('title',$title);
    }
    // public function services(){
    //     $data = array(
    //         'title'=>'Холбоо барих',
    //         'services' =>['Facebook','Twitter','Instagram']
    //     );
    //     return view('pages.Services')-> with($data);
    // }
    public function services()
    {
        $data = array(
            'title' => 'Холбоо барих',
            'socialLinks' => [
                'facebook' => 'https://www.facebook.com/yourfacebookpage',
                'twitter' => 'https://twitter.com/yourtwitterprofile',
                'instagram' => 'https://www.instagram.com/yourinstagrampage',
                'discord' => 'https://discordapp.com/yourdiscordpage',
                'youtube' => 'https://www.youtube.com/youryoutubepage',
            ]
        );
        return view('pages.Services')->with($data);
    }

    public function main()
    {
        return view('pages.main');
    }

    public function admin()
    {
        return view('admin.admin');
    }
}
