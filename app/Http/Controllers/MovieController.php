<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Movie;
use App\Reviews;
use App\Shows;
use File;
use Image;

class MovieController extends Controller
{
    public function getYoutubeEmbedUrl($url)
    {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id; 
    }
    // GET METHOD //
    public function Show()
    {
        $movies = Movie::all();
    	return view('admin.movie')->with('movies', $movies);
    }

    public function addMovie()
    {
        return view('admin.addMovie');
    }

    public function editMovie(Request $request)
    {
        $movie = Movie::where('movies.id', '=', $request->id)->first();

        return view('admin.editMovie')->with('movie', $movie);
    }
    
    public function movie(Request $request)
    {
        $movie = Movie::where('movies.id', '=', $request->id)->first();
        $matchThese = ['movie_name' => $movie->title];
        $tickets = Shows::where($matchThese)->orderBy('id', 'asc')->get();

        $matchThese = ['movie_name' => $movie->title, 'reviewedByAdmin' => 1];
        $approvedReviews = Reviews::orderBy('id', 'desc')->where($matchThese)->get();

        $hasReviewed = null;
        $reviewed = false;

        if( auth()->user() )
        {
            $matchThese = ['movie_name' => $movie->title, 'user_name' => auth()->user()->name];
            $hasReviewed = Reviews::where($matchThese)->first();
        } 
        
        if($hasReviewed) 
        {
            $reviewed = true;
            return view('movie')->with('movie', $movie)->with('reviewed', $reviewed)->with('approvedReviews', $approvedReviews)->with('tickets', $tickets);
        } 
        
        else 
        {
            return view('movie')->with('movie', $movie)->with('reviewed', $reviewed)->with('approvedReviews', $approvedReviews)->with('tickets', $tickets);
        }
    }

    public function movies(Request $request)
    {
        $page = true;
        $genres = Movie::distinct()->get(['genre']);

        if ( $request->has('search') ) {
            $page = false;
            $matchThese = ['title', 'like', $request->search . '%'];
            $movies = DB::table('movies')
                ->where('title', 'like', $request->search . '%')
                ->orWhere('title', 'like', '%' . $request->search)
                ->get();
            return view('movies')->with('movies', $movies)->with('genres', $genres)->with('page', $page);
        } else {
            $movies = Movie::paginate(4);
            return view('movies')->with('movies', $movies)->with('genres', $genres)->with('page', $page);
        }
    }

    // POST METHOD //
    public function insertMovie(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string'],
            'description' => ['required', 'string', 'min: 5', 'max:600'],
            'director' => ['required', 'string'],
            'release' => ['required', 'string'],
            'genre' => ['required', 'string'],
            'language' => ['required', 'string'],
            'trailer_link' => ['required', 'string'],
            'poster' => 'required',
            'poster.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'picture_1' => 'required',
            'picture_1.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'picture_2' => 'required',
            'picture_2.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'picture_3' => 'required',
            'picture_3.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'picture_4' => 'required',
            'picture_4.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'picture_5' => 'required',
            'picture_5.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'picture_6' => 'required',
            'picture_6.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $movie = new Movie();

        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->director = $request->director;
        $movie->release = $request->release;
        $movie->genre = $request->genre;
        $movie->language = $request->language;
        $movie->trailer_link = $this->getYoutubeEmbedUrl($request->trailer_link);

        $poster = $request->file('poster');
        $poster_name = $poster->getClientOriginalName();
        $location = public_path('movieImages/' . $poster_name);
        Image::make($poster)->save($location);
        $movie->poster = $poster_name;

        $picture_1 = $request->file('picture_1');
        $pic1_name = $picture_1->getClientOriginalName();
        $location = public_path('movieImages/' . $pic1_name);
        Image::make($picture_1)->save($location);
        $movie->picture_1 = $pic1_name;

        $picture_2 = $request->file('picture_2');
        $pic2_name = $picture_2->getClientOriginalName();
        $location = public_path('movieImages/' . $pic2_name);
        Image::make($picture_2)->save($location);
        $movie->picture_2 = $pic2_name;

        $picture_3 = $request->file('picture_3');
        $pic3_name = $picture_3->getClientOriginalName();
        $location = public_path('movieImages/' . $pic3_name);
        Image::make($picture_3)->save($location);
        $movie->picture_3 = $pic3_name;

        $picture_4 = $request->file('picture_4');
        $pic4_name = $picture_4->getClientOriginalName();
        $location = public_path('movieImages/' . $pic4_name);
        Image::make($picture_4)->save($location);
        $movie->picture_4 = $pic4_name;

        $picture_5 = $request->file('picture_5');
        $pic5_name = $picture_5->getClientOriginalName();
        $location = public_path('movieImages/' . $pic5_name);
        Image::make($picture_5)->save($location);
        $movie->picture_5 = $pic5_name;

        $picture_6 = $request->file('picture_6');
        $pic6_name = $picture_6->getClientOriginalName();
        $location = public_path('movieImages/' . $pic6_name);
        Image::make($picture_6)->save($location);
        $movie->picture_6 = $pic6_name;

        $movie->save();

        return redirect(url('/admin/movie'));
    }

    public function updateMovie(Request $request)
    {
        $movie = Movie::where('movies.id','=',$request->id)->first();

        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->director = $request->director;
        $movie->release = $request->release;
        $movie->genre = $request->genre;
        $movie->language = $request->language;
        $movie->trailer_link = $request->trailer_link;

        if($request->hasFile('poster')){
            $prevImage = "movieImages/" . $movie->poster;

            if(File::exists($prevImage)) {
                File::delete($prevImage);
            }
            
            $poster = $request->file('poster');
            $poster_name = $poster->getClientOriginalName();
            $location = public_path('movieImages/' . $poster_name);
            Image::make($poster)->save($location);
            $movie->poster = $poster_name;
        }

        if($request->hasFile('picture_1')){
            $prevImage = "movieImages/" . $movie->picture_1;

            if(File::exists($prevImage)) {
                File::delete($prevImage);
            }

            $picture_1 = $request->file('picture_1');
            $pic1_name = $picture_1->getClientOriginalName();
            $location = public_path('movieImages/' . $pic1_name);
            Image::make($picture_1)->save($location);
            $movie->picture_1 = $pic1_name;
        }

        if($request->hasFile('picture_2')){
            $prevImage = "movieImages/" . $movie->picture_2;

            if(File::exists($prevImage)) {
                File::delete($prevImage);
            }

            $picture_2 = $request->file('picture_2');
            $pic2_name = $picture_2->getClientOriginalName();
            $location = public_path('movieImages/' . $pic2_name);
            Image::make($picture_2)->save($location);
            $movie->picture_2 = $pic2_name;
        }

        if($request->hasFile('picture_3')){
            $prevImage = "movieImages/" . $movie->picture_3;

            if(File::exists($prevImage)) {
                File::delete($prevImage);
            }

            $picture_3 = $request->file('picture_3');
            $pic3_name = $picture_3->getClientOriginalName();
            $location = public_path('movieImages/' . $pic3_name);
            Image::make($picture_3)->save($location);
            $movie->picture_3 = $pic3_name;
        }

        if($request->hasFile('picture_4')){
            $prevImage = "movieImages/" . $movie->picture_4;

            if(File::exists($prevImage)) {
                File::delete($prevImage);
            }

            $picture_4 = $request->file('picture_4');
            $pic4_name = $picture_4->getClientOriginalName();
            $location = public_path('movieImages/' . $pic4_name);
            Image::make($picture_4)->save($location);
            $movie->picture_4 = $pic4_name;
        }

        if($request->hasFile('picture_5')){
            $prevImage = "movieImages/" . $movie->picture_5;

            if(File::exists($prevImage)) {
                File::delete($prevImage);
            }

            $picture_5 = $request->file('picture_5');
            $pic5_name = $picture_5->getClientOriginalName();
            $location = public_path('movieImages/' . $pic5_name);
            Image::make($picture_5)->save($location);
            $movie->picture_5 = $pic5_name;
        }

        if($request->hasFile('picture_6')){
            $prevImage = "movieImages/" . $movie->picture_6;

            if(File::exists($prevImage)) {
                File::delete($prevImage);
            }

            $picture_6 = $request->file('picture_6');
            $pic6_name = $picture_6->getClientOriginalName();
            $location = public_path('movieImages/' . $pic6_name);
            Image::make($picture_6)->save($location);
            $movie->picture_6 = $pic6_name;
        }

        $movie->save();

        return redirect('admin/movie');
    }

    public function deleteMovie(Request $request)
    {
        $movie = Movie::where('movies.id', '=' ,$request->id)->first();

        $pictures = array("poster", "picture_1", "picture_2", "picture_3", "picture_4", "picture_5", "picture_6");

        foreach( $pictures as $picture )
        {
            $prevImage = "movieImages/" . $movie->$picture;

            if(File::exists($prevImage)) {
                File::delete($prevImage);
            }
        }

        $movie->delete();
        return redirect('admin/movie');
    }
}