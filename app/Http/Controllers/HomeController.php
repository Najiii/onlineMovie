<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\User;
use App\Movie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        $movies = Movie::orderby('id', 'DESC')->get()->take(10);

    	return view('welcome')->with(compact('movies'));
    }

    // Get for User edit.
    public function userInfo(Request $request)
    {
        $matchThese = ['id' => $request->id];
        $user = User::where($matchThese)->first();

        return view('editUserProfile')->with('user', $user);
    }

    // Post for User update
    public function userUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                Rule::unique('users')->ignore($request->id),
            ],
            'phone_no' => [
                'required',
                Rule::unique('users')->ignore($request->id),
            ],
            'credit_card' => [
                'required',
                Rule::unique('users')->ignore($request->id),
            ],
        ]);


        $matchThese = ['id' => $request->id, 'email' => $request->email];
        $user = User::where($matchThese)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->credit_card = $request->credit_card;

        $user->save();

        $notification = array(
            'message' => "Profile was updated!",
            'alert-type' => 'success'
        );

        return redirect(url('/'))->with($notification);
    }
}
