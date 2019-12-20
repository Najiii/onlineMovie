<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theatre;
use File;
use Image;

class TheatreController extends Controller
{
    public function Show()
    {
        if(auth()->guest())
        {
            return view('auth.login');
        }

        else if(auth()->user()->isAdmin == 0)
        {
            return view('welcome');
        }

        $theatres = Theatre::all();
    	return view('admin.theatre')->with('theatres', $theatres);
    }

    public function addTheatre()
    {
        if(auth()->guest())
        {
            return view('auth.login');
        }

        else if(auth()->user()->isAdmin == 0)
        {
            return view('welcome');
        }

        return view('admin.addTheatre');
    }

    public function editTheatre(Request $request)
    {
        if(auth()->guest())
        {
            return view('auth.login');
        }

        else if(auth()->user()->isAdmin == 0)
        {
            return view('welcome');
        }
        
        $theatre = Theatre::where('theatre.id', '=', $request->id)->first();

        return view('admin.editTheatre')->with('theatre', $theatre);
    }

    // POST METHOD //
    public function insertTheatre(Request $request)
    {
        $this->validate($request, [
            'theatre_name' => ['required', 'string'],
            'theatre_image' => 'required',
            'theatre_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => ['required', 'string', 'max:400'],
            'location' => ['required', 'string'],
            'contact_no' => ['required', 'string'],
            'cinemas' => ['required', 'string'],
        ]);

        $theatre = new Theatre();

        $theatre->theatre_name = $request->theatre_name;

        $theatre_image = $request->file('theatre_image');
        $theatre_name = $theatre_image->getClientOriginalName();
        $location = public_path('theatreImages/' . $theatre_name);
        Image::make($theatre_image)->save($location);
        $theatre->theatre_image = $theatre_name;

        $theatre->description = $request->description;
        $theatre->location = $request->location;
        $theatre->contact_no = $request->contact_no;
        $theatre->cinemas = $request->cinemas;

        $theatre->save();

        return redirect(url('/admin/theatre'));
    }

    public function updateTheatre(Request $request)
    {
        $theatre = Theatre::where('theatre.id', '=', $request->id)->first();

        $theatre->theatre_name = $request->theatre_name;

        if($request->hasFile('theatre_image')){
            $prevImage = "theatreImages/" . $theatre->poster;

            if(File::exists($prevImage)) {
                File::delete($prevImage);
            }
            
            $theatre_image = $request->file('theatre_image');
            $theatre_name = $theatre_image->getClientOriginalName();
            $location = public_path('theatreImages/' . $theatre_name);
            Image::make($theatre_image)->save($location);
            $theatre->theatre_image = $theatre_name;
        }

        $theatre->description = $request->description;
        $theatre->location = $request->location;
        $theatre->contact_no = $request->contact_no;
        $theatre->cinemas = $request->cinemas;
        
        $theatre->save();

        return redirect('admin/theatre');
    }

    public function deleteTheatre(Request $request)
    {
        $theatre = Theatre::where('theatre.id', '=' ,$request->id)->first();

        $prevImage = "theatreImages/" . $theatre->theatre_image;

        if(File::exists($prevImage)) {
            File::delete($prevImage);
        }

        $theatre->delete();
        return redirect('admin/theatre');
    }
}
