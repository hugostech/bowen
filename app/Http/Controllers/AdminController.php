<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Booking_item;
use App\User;
use App\Service;
use Illuminate\Http\Request;

use App\Http\Requests;


class AdminController extends Controller
{
    public $numArray;
    public function __construct()
    {
        $this->numArray = self::getNum();
    }

    public function index(){
        $bookings = Booking::paginate(9);
        $data = self::getBooking($bookings);
        $nums = $this->numArray;
        return view('admin.booking',compact('data','bookings','nums'));

    }

    public function service_edit(Request $request){
        $service = Service::find($request->input('id'));
        $service->content = $request->input('content');
        $service->type = $request->input('type');
        $service->labour = $request->input('labour');
        $service->save();
        return redirect('servicemanage');
    }

    public function clientManage(){
        $users = User::paginate(9);
        $nums = $this->numArray;
        return view('admin.clients',compact('users','nums'));

    }
    public function serviceManage(){
        $services = Service::paginate(9);
        $nums = $this->numArray;
        return view('admin.services',compact('services','nums'));

    }
    public function delservice($id){
        Service::destroy($id);
        return redirect('servicemanage');
    }
    public function addService(){
        return view('admin.servicelist');

    }

    private function getBooking($bookings){
        $data = array();

        foreach($bookings as $booking){
            $client = $booking->client;
            $car = $booking->car;
            $services = $booking->services;
            $data[] = array(
                'booking'=>$booking,
                'client'=>$client,
                'car'=>$car,
                'services'=>$services

            );
        }
        return $data;
    }
    private function getNum(){
        $clientNum = count(User::all());
        $bookingNum = count(Booking::all());
        $serviceNum = count(\App\Service::all());
        return array(
            'user'=>$clientNum,
            'booking'=>$bookingNum,
            'service'=>$serviceNum
        );
    }
}
