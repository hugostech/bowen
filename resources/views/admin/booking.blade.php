@extends('layouts.newadmin')

@section('title')
    Booking_List
@endsection

@section('content')
    <table class="table table-striped">
        <tr>
            <th class="tc" width="5%"></th>
            <th>ID</th>
            <th>用户名</th>
            <th>车辆信息</th>
            <th>服务内容</th>
            <th>订单时间</th>
            <th>状态</th>
        </tr>
        @foreach($data as $item)
            <tr>
                <td class="tc"><input name="id[]" value="" type="checkbox"></td>
                <td>{{$item['booking']->id}}</td> <!--标签ID-->
                <td><a target="_blank" href="#">{{$item['client']->name}}</a> <!--课程名称-->
                </td>
                <td>{{$item['car']->plate}}</td> <!--购买者用户名-->
                <td>@foreach($item['services'] as $service)
                        {{$service->content}}<br>
                    @endforeach
                </td> <!--销售者用户名-->
                <td>{{$item['booking']->bookingday}}</td>
                <td>{{$item['booking']->status}}</td>
            </tr>
        @endforeach
    </table>
    {{$bookings->links()}}
@endsection