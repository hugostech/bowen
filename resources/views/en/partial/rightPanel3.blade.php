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
        {!! Form::open(['url'=>'services2']) !!}
        <div class="col-md-8">
            <h3>请选择合适的时间</h3>
        </div>


            <div class="col-sm-8" style="height:130px;">
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker11'>
                        <input type='text' class="form-control" name="arrangetime"/>
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar">
                </span>
            </span>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#datetimepicker11').datetimepicker({
                        daysOfWeekDisabled: [0, 6]
                    });
                });
            </script>




        <div class="col-md-8 ">
            <br>
            <button type="submit" class="btn-block btn-primary btn">Next</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>