<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Gallery;
use App\VisiMisi;
use App\Service;
use App\Cooperation;
use App\WorkProgram;
use App\StructureOrganization;
use App\Welcome;
use App\Overview;

class PagesController extends Controller
{
    public function home()
    {
        $newsNews = News::orderBy('updated_at', 'desc')->limit(3)->get();
        $galleries = Gallery::where('type', 'image')->orderBy('updated_at', 'desc')->limit(3)->get();
        $welcome = Welcome::first();
        $overview = Overview::first();

    	return view('pages.home', compact('newsNews', 'galleries', 'welcome', 'overview'));
    }
    public function profile()
    {
    	return view('pages.profile');
    }
    public function galleryPhoto()
    {
        $galleries = Gallery::where('type', 'image')->orderBy('updated_at', 'desc')->paginate(5);

    	return view('pages.gallery-photo', compact('galleries'));
    }
    public function galleryVideo()
    {
        $galleries = Gallery::where('type', 'video')->orderBy('updated_at', 'desc')->paginate(5);

        return view('pages.gallery-video', compact('galleries'));
    }
    public function news(Request $request)
    {
        $keyword = $request->get('search');
        if ($keyword == null) {
            $news = News::orderBy('updated_at', 'desc')->where('publish_status', 1)->paginate(5);
            $oldNews = News::orderBy('updated_at', 'asc')->where('publish_status', 1)->limit(5)->get(); 
            return view('pages.news', compact('news', 'oldNews'));
        } else {
            $news = News::search($keyword)->orderBy('updated_at', 'DESC')->paginate(5);
            $oldNews = News::orderBy('updated_at', 'asc')->where('publish_status', 1)->limit(5)->get(); 
            return view('pages.search-news', compact('news', 'oldNews'));
        } 
    }
    public function workProgram()
    {
        $cooperations = Cooperation::all();
        $workPrograms = WorkProgram::all();

    	return view('pages.work-program', compact('cooperations', 'workPrograms'));
    }
    public function service()
    {
        $services = Service::all();

    	return view('pages.service', compact('services'));
    }
    public function visiMisi() 
    {
        $visiMisi = VisiMisi::first();

        return view('pages.profile.visi-misi', compact('visiMisi'));
    }
    public function structureOrganization()
    {
        $structures = StructureOrganization::all();

        return view('pages.profile.structure-organization', compact('structures'));
    }
    public function showProfile($id) 
    {
        $profile = StructureOrganization::where('id', $id)->first();

        return view('pages.profile.show-profile', compact('profile'));
    }
}
