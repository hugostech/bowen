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
        {!! Form::open(['url'=>'confirmService']) !!}
        <div class="col-md-8">
            <h3>请确认能的订单</h3>
        </div>


        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>车辆信息</th>
                    <th>服务内容</th>
                    <th>预定时间</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$car->plate}}</td>
                    <td>
                        @foreach($services as $service)
                            {{$service->content}}<br>
                        @endforeach
                    </td>
                    <td>
                        @if($status==true)
                            <label class="text-success">{{$besttime}}</label>
                        @else
                            <label class="text-danger">{{$besttime}}</label>
                            <p>您选择的时间已经别预定,这是系统安排的最优时间</p>
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
        </div>





        <div class="col-md-8 ">
            <br>
            <button type="submit" class="btn-block btn-primary btn">Confirm</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>