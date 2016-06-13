<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Booking_item;
use App\Car;
use App\Http\Requests;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $lg;


    public function __construct()
    {
        $this->middleware('auth');
        $this->lg = 'en';

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $rightContent = 'en.partial.rightPanel';


        return self::commonInfo($rightContent);
    }

    /*
     * Save the service id in session*/

    private function commonInfo($rightContent)
    {

        $user = Auth::user();

        $cars = $user->cars;

        if(!Session::has('car')){
            Session::put('car',$cars[0]->id);
        }

        $bookings = $user->bookings;

        $services = Service::paginate(10);

        return view($this->lg . '.index', compact('user', 'cars', 'services', 'rightContent','bookings'));

    }

    public function serviceTemSave(Request $request)
    {
        $services = json_encode($request->input('services'));
        Session::put('services', $services);


        $rightContent = 'en.partial.rightPanel2';


        return self::commonInfo($rightContent);

    }

    public function serviceTimeArrange(Request $request)
    {
        $start = self::timeParse($request->input('arrangetime'));

        $date = self::dateParse($request->input('arrangetime'));

        $labour = self::labourCount(Session::get('services'));

        $bookedtime = self::bookedTime($date);

        if ($start > 52) {
            $stict = false;
        } else {
            $stict = true;
        }
        $besttime = self::pickupBestTime($start, $labour, $bookedtime, $stict);

        $status = $start == $besttime;

        Session::put('start', $besttime);
        Session::put('labour', $labour);
        Session::put('status', $status);
        Session::put('bookingday', $date);

        $serviceId = json_decode(Session::get('services'));
        $services = array();

        foreach ($serviceId as $id) {
            $services[] = Service::find($id);
        }

        $besttime = $date.' '.self::timeRetrive($besttime);
        $rightContent = 'en.partial.rightPanel3';

        $user = Auth::user();

        $cars = $user->cars;

        $car = Car::find(Session::get('car'));

        $bookings = $user->bookings;


        return view($this->lg . '.index', compact('user', 'cars', 'status', 'rightContent', 'besttime', 'services','car','bookings'));
    }

    public function confirmService(Request $request){
        $booking = new Booking();
        $booking->start=Session::get('start');
        $booking->labour=Session::get('labour');
        $booking->bookingday=Session::get('bookingday');
        $booking->client_id=Auth::user()->id;
        $booking->car_id=Session::get('car');
        $booking->save();

        $services = json_decode(Session::get('services'));
        foreach($services as $service_id){
            $book_item = new Booking_item();
            $book_item->booking_id=$booking->id;
            $book_item->service_id=$service_id;
            $book_item->save();

        }
        return redirect('dashboard');

    }
    private function timeParse($time)
    {
//        dd(ceil(Carbon::parse($time)->minute / 15) + (Carbon::parse($time)->hour) * 4);
        return ceil(Carbon::parse($time)->minute / 15) + (Carbon::parse($time)->hour) * 4;
    }

    private function dateParse($time)
    {
        return Carbon::parse($time)->toDateString();
    }

    private function labourCount($services)
    {
        $services = json_decode($services);
        $tem = 0;
        foreach ($services as $id) {
            $service = Service::find($id);
            if ($service->type == 1) {
                if ($service->labour * 1 > $tem) $tem = $service->labour;
            } else {
                return 1;
            }
        }
        return $tem;

    }

    private function bookedTime($date)
    {
        $bookings = Booking::where('bookingday', $date)->get();
        $bookedtime = array();
        foreach ($bookings as $booking) {
            $labour = $booking->labour;
            $start = $booking->start;
            $bookedtime[] = $start;

            while ($labour > 0) {
                $bookedtime[] = $start + 1;
                $labour--;
            }
        }
        return $bookedtime;
    }

    private function pickupBestTime($start, $labour, $bookedtime, $strict = true)
    {


        if (self::compareArrangeTime($start, $labour, $bookedtime)) {
            return $start;
        } else {
            if ($strict) {
                $start++;
            } else {
                $start--;
            }

            self::pickupBestTime($start, $labour, $bookedtime, $strict);

        }
    }

    private function compareArrangeTime($start, $labour, $bookedtime)
    {

        if (in_array($start, $bookedtime, true)) {
            return false;
        } else {
            while ($labour > 0) {
                $start++;
                if (in_array($start, $bookedtime, true)) {
                    return false;
                }
                $labour--;
            }
        }
        return true;

    }

    private function timeRetrive($time)
    {
        $hour = sprintf("%02d",intval($time / 4));
        $min = sprintf("%02d",$time % 4 * 15);
        return $hour.':'.$min;
    }
}
