<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasHotel;
use App\Models\Kamar;
use App\Models\FasilitasKamar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fasilitashotels = FasilitasHotel::count();
        $kamars = Kamar::count();
        $fasilitaskamars = FasilitasKamar::count();
        return view('admin.dashboard',compact(['fasilitashotels','kamars','fasilitaskamars']));
       
    }
}
