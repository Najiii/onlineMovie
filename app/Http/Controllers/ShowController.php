<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ClearShows;
use App\Shows;
use App\Theatre;
use App\Movie;
use Carbon\Carbon;

class ShowController extends Controller
{
    public function Show()
    {
        $show = Shows::orderBy('id', 'asc')->get();

        return view('admin/shows', compact('show'));
    }
    
    public function addShow(Request $request)
    {
        $movies = Movie::all();
        $theatres = Theatre::all();
        
        return view('admin/addShow')->with('movies', $movies)->with('theatres', $theatres);
    }

    public function editShow(Request $request)
    {
        $movies = Movie::all();
        $theatres = Theatre::all();
        $show = Shows::where('shows.id', '=', $request->id)->first();

        return view('admin/editShow')->with('show', $show)->with('movies', $movies)->with('theatres', $theatres);
    }

    public function clearShow()
    {
        ClearShows::dispatchNow();

        return redirect()->back();
    }

    // Post //
    public function insertShow(Request $request)
    {
        $shows = Shows::all();

        $this->validate($request, [
            'date_time' => ['required', 'string'],
            'price' => ['required', 'numeric'],
        ]);

        $matchTheses = ['theatre_name' => $request->theatre_name, 'date_time' => $request->date_time, 'cinema' => $request->cinema];
        $checkIfShowExists = Shows::where($matchTheses)->get();

        if( isset($checkIfShowExists) && count($checkIfShowExists) > 0 )
        {
            return redirect()->to('admin/show/add')->withInput()->withErrors(array('cinema' => "There's already a movie which will be played in same cinema of this theatre."));
        }

        else
        {
            $show = new Shows();

            $show->movie_name = $request->movie_name;
            $show->theatre_name = $request->theatre_name;
            $show->date_time = $request->date_time;

            $totalCinema = Theatre::where(['theatre_name' => $request->theatre_name])->first();
            if( $request->cinema > $totalCinema["cinemas"] ) {
                return redirect()->to('admin/show/add')->withInput()->withErrors(array('cinema' => "This theatre have only " . $totalCinema["cinemas"] . " cinemas."));
            }

            $alreadyHaveMovie = Shows::where(['theatre_name' => $request->theatre_name, 'cinema' => $request->cinema])->first(); 
            if( $alreadyHaveMovie ) {
                return redirect()->to('admin/show/add')->withInput()->withErrors(array('cinema' => "You cant play two movies at same cinema of same theatre."));
            } else {
                $show->cinema = $request->cinema;
            }

            $show->price = $request->price;
            
            $show->save();

            return redirect(url('/admin/shows'));
        }
    }

    public function updateShow(Request $request)
    {
        $show = Shows::where('shows.id', '=', $request->id)->first();

        $this->validate($request, [
            'date_time' => ['required', 'string'],
        ]);

        
        $show->movie_name = $request->movie_name;
        $show->theatre_name = $request->theatre_name;
        
        if( $request->has('date_time') ) {
           if ( $request->date_time !== $show->date_time ) {
                $matchTheses = ['theatre_name' => $request->theatre_name, 'date_time' => $request->date_time, 'cinema' => $request->cinema];
                $checkIfShowExists = Shows::where($matchTheses)->get();
            
                if( isset($checkIfShowExists) && count($checkIfShowExists) > 0 ) {
                    return redirect()->to('admin/show/edit/' . $show->id)->withInput()->withErrors(array('date_time' => "There's already a movie with same date, time & theatre. Play this movie after few hours than current time."));
                } else {
                    $show->date_time = $request->date_time;
                }
            }
        }

        $totalCinema = Theatre::where(['theatre_name' => $request->theatre_name])->first();
        if( $request->cinema > $totalCinema["cinemas"] ) {
            return redirect()->to('admin/show/edit/' . $show->id)->withInput()->withErrors(array('cinema' => "This theatre have only " . $totalCinema["cinemas"] . " cinemas."));
        }

        if( $show->cinema == $request->cinema ) {
            $show->cinema = $request->cinema;
        } else {
            if( $show->cinema !== $request->cinema ) {
                $alreadyHaveMovie = Shows::where(['theatre_name' => $request->theatre_name, 'cinema' => $request->cinema])->first(); 
                
                if( $alreadyHaveMovie ) {
                    return redirect()->to('admin/show/edit/' . $show->id)->withInput()->withErrors(array('cinema' => "You cant play two movies at same cinema of same theatre."));
                } else {
                    $show->cinema = $request->cinema;
                }
            }
        }

        $show->price = $request->price;

        $show->save();

        return redirect(url('/admin/shows'));
    }

    public function deleteShow(Request $request)
    {
        $show = Shows::where('shows.id', '=' ,$request->id)->first();

        $show->delete();
        return redirect('admin/shows');
    }
}
