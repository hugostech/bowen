@extends('layouts.newadmin')

@section('title')
    Service_List
@endsection

@section('content')
    <div class="col-sm-12 text-right">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
            New Service
        </button>
    </div>
    <hr>
    <table class="table table-striped">
        <tr>
            <th class="tc" width="5%"></th>
            <th>ID</th>
            <th class="col-sm-4">Content</th>
            <th>Type</th>
            <th class="col-sm-2">labour(15 mins as 1 labour)</th>
            <th></th>

        </tr>
        @foreach($services as $service)
            <tr>
                <td class="tc"><input name="id[]" value="{{$service->id}}" type="checkbox"></td>

                {!! Form::open(['url'=>'service_edit']) !!}
                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                <td class="col-sm-1">{{$service->id}}
                    <input type="hidden" name="id" value="{{$service->id}}">
                </td>
                <td><input type="text" name="content" value="{{$service->content}}" class="form-control"> </td>
                <td>
                    <select name="type" class="form-control">
                        <option value="1" selected>Meantime</option>
                        <option value="2" {{$service->type==2?'selected':""}}>Drop-off</option>
                    </select>
                </td>
                <td><input type="number" name="labour" class="form-control" value="{{$service->labour}}"></td>
                <td>
                    <a href="{{url('delservice',[$service->id])}}" class="btn btn-danger">Del</a>
                    <input type="submit" name="edit" value="Edit" class="btn btn-primary">
                </td>
                {!! Form::close() !!}
            </tr>
        @endforeach
    </table>
    {{ $services->links() }}


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">New Service</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>'add_service']) !!}

                    <div class="form-group ">
                        {!! Form::label('service_content','Content',['sy-only']) !!}
                        {!! Form::text('service_content',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group ">
                        {!! Form::label('service_content','Type',['form-control']) !!}
                        {!! Form::input('','service_content',null,['class'=>'form-control']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection