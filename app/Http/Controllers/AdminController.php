<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shows;
use App\User;
use App\Reservation;
use App\Reviews;
use App\Movie;

class AdminController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function admin()
    { 
        $m = Movie::get()->count();
        $u = User::get()->count();
        $s = Shows::get()->count();
        $r = Reviews::get()->count();

        return view('admin.dashboard', compact('m', 'u', 's', 'r'));
    }
}
