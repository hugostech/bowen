<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        <label>{{$user->name}}</label><br>
        {{$user->phone}}<br>
        {{$user->email}} <label><small style="color: green">Unactived</small></label><br>
        <hr>
        <ul class="list-group">
            {{--<a href="#" class="list-group-item active">My parkage</a>--}}
            {{--<a href="#" class="list-group-item">Chinese Address</a>--}}
            {{--<a href="#" class="list-group-item">Your address book</a>--}}
            {{--<a href="#" class="list-group-item">Finance Detail</a>--}}
            {{--<a href="#" class="list-group-item">Account Setting</a>--}}
            @foreach($cars as $car)
                <a href="#" class="list-group-item">{!! $car->make.' '.strtoupper($car->model).' <small style="color:red">'.$car->plate.'</small>' !!}</a>
            @endforeach
        </ul>
        <hr>
        <h4>Booking</h4>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Booking Id</th>
                <th>Time</th>
                {{--<th>Content</th>--}}
                <th>Status</th>

            </tr>
            </thead>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{$booking->id}}</td>
                    <td>{{$booking->bookingday}}</td>
                    <td>{{$booking->status}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>