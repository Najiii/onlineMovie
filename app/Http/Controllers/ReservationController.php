<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Shows;
use App\User;
use App\Movie;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookedMovie;

class ReservationController extends Controller
{
    public function info(Request $request)
    {
        $matchThese = ['id' => $request->id];
        $show = Shows::where($matchThese)->first();

        $matchThese = 
        [
            'show_movie_name' => $show->movie_name,
            'show_theatre_name' => $show->theatre_name,
            'show_date_time' => $show->date_time,
            'show_cinema' => $show->cinema
        ];
        $takenSeats = Reservation::where($matchThese)->orderBy('id', 'DESC')->get();
        $takenSeatNumbers = $takenSeats->pluck('seat')->toArray();

        $matchThese = 
        [
            'owner' => auth()->user()->name,
            'show_movie_name' => $show->movie_name,
            'show_theatre_name' => $show->theatre_name,
            'show_date_time' => $show->date_time,
            'show_cinema' => $show->cinema
        ];
        $hasUserBookedMovie = Reservation::where($matchThese)->get();
        if ( isset($hasUserBookedMovie) && count($hasUserBookedMovie) > 0 ) {
            $notification = array(
                'message' => "You've already booked this show!",
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        } else {
            return view('shows')->with('show', $show)->with('takenSeatNumbers', $takenSeatNumbers);
        }
    }

    // Post //
    public function reserveSeats(Request $request)
    {
        $seat = $request->seats;
        $seatsFromRequest = explode(',', $seat);

        $u = User::where(['email' => auth()->user()->email])->first();
        $u->hasBookedMovie = 1;

        for ($i = 0; $i < count($seatsFromRequest); $i++) { 
            $reservation = new Reservation();

            $reservation->owner = $request->owner;
            $reservation->total_seats = $request->total_seats;
            $reservation->show_id = $request->show_id;
            $reservation->show_movie_name = $request->show_movie_name;
            $reservation->show_theatre_name = $request->show_theatre_name;
            $reservation->show_date_time = $request->show_date_time;
            $reservation->show_cinema = $request->show_cinema;
            $reservation->seat = $seatsFromRequest[$i];  
            $reservation->total = $request->show_price;

            $reservation->save();
        }

        Mail::to($u->email)->send(new BookedMovie());

        $notification = array(
            'message' => "Booked movie! Check email!",
            'alert-type' => 'success'
        );

        $movie = Movie::where('title', '=', $request->show_movie_name)->get();
        return redirect(url('movie/' . $movie[0]["id"]))->with($notification);
    }
}
