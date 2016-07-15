<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Server History</h3>
    </div>
    <div class="panel-body">
        There is no service record
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Booking Panell</h3>
    </div>
    <div class="panel-body">
        {!! Form::open(['url'=>'services']) !!}
        <div class="col-sm-8">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search service">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
            </div>
        </div>
        <div class="col-sm-12" style="color: #5bc0de">
            <div class="col-sm-3" style="color: black"><h4>Suggested Service</h4></div>
            <div class="col-sm-9"><hr></div>
            <div class="col-sm-12">
                <label><input type="checkbox"> Full Service</label><br>
                <label><input type="checkbox"> Replace typr</label><br>
                <label><input type="checkbox"> Battary Check</label>
            </div>



        </div>
        <div class="col-md-12">
            
            <div class="col-sm-3"><h4>All Service</h4></div>
            <div class="col-sm-9"><hr></div>
            <div class="col-sm-12">
                @foreach($services as $service)
                <label class="text-capitalize"><input type="checkbox" name="services[]" value="{{$service->id}}"> {{$service->content}} </label><br>
                @endforeach
            </div>
            {!! $services->render() !!}

        </div>

        <div class="col-sm-8 ">
            <br>
            <button type="submit" class="btn-block btn-primary btn">Next</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>