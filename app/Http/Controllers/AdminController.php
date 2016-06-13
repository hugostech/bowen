<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Booking_item;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function index(){
        $data = self::getBooking();
        return view('admin.index',compact('data'));

    }

    public function clientManage(){
        $users = User::all();
        return view('admin.client',compact('users'));

    }

    private function getBooking(){
        $data = array();
        $bookings = Booking::all();
        foreach($bookings as $booking){
            $client = $booking->client;
            $car = $booking->car;
            $services = $booking->services;
//            dd($service);
            $data[] = array(
                'booking'=>$booking,
                'client'=>$client,
                'car'=>$car,
                'services'=>$services
            );
        }
        return $data;
    }
}
