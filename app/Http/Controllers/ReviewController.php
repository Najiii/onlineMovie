<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reviews;

class ReviewController extends Controller
{
    public function addReview(Request $request)
    {
        $this->validate($request, [
            'movie_name' => ['required', 'string'],
            'user_name' => ['required', 'string'],
            'title' => ['required', 'string'],
            'review' => ['required', 'string', 'max:400'],
        ]);

        $review = new Reviews();

        $review->movie_name = $request->movie_name;
        $review->user_name = $request->user_name;
        $review->title = $request->title;
        $review->review = $request->review;
        $review->rating = $request->rating;

        $review->save();

        $notification = array(
            'message' => "It will be available once it's reviewed by an Administrator",
            'alert-type' => 'success'
        );

        return redirect(url('movie/' .  $request->movie_id))->with($notification);
    }

    public function Show()
    {
        $notApproved = ["reviewedByAdmin" => NULL];

        $reviews = Reviews::where($notApproved)->get();
    	return view('admin.review')->with('reviews', $reviews);
    }

    // Post //
    public function approve(Request $request)
    {
        $review = Reviews::where('reviews.id', '=', $request->id)->first();

        $review->reviewedByAdmin = 1;

        $review->save();

        $notification = array(
            'message' => "Review was approved!",
            'alert-type' => 'success'
        );

        return redirect(url('admin/review'))->with($notification);
    }

    public function discard(Request $request)
    {
        $review = Reviews::where('reviews.id', '=' , $request->id)->first();

        $review->delete();

        $notification = array(
            'message' => "Review was discard!",
            'alert-type' => 'warning'
        );

        return redirect(url('admin/review'))->with($notification);
    }
}
