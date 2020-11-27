<?php

// defining Namespace
namespace App\Http\Controllers\Guest;

// using Laravel Facades
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// using Carbon
use Carbon\Carbon;

// using Models
use App\Flat;
use App\Option;

class HomepageController extends Controller
{
     /**
     * Display the homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flats = Flat::inRandomOrder()->limit(10)->get();

        $datetime_now = Carbon::now();
        $sponsorhip_flats = Flat::whereHas('sponsorships', function ($query) use ($datetime_now) {
         $query->where('date_of_end', '>', $datetime_now);
        })->get();

        return view('guest.home', compact('flats'));
    }

     /**
     * Display the search page.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $options = Option::all();

        return view('guest.search', compact('options'));
    }
}