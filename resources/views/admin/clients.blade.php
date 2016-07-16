@extends('layouts.newadmin')

@section('title')
    Client_List
@endsection

@section('content')
    <div class="col-sm-12 text-right"><a href="{{url('register')}}" class="btn btn-default">New Client</a></div>
    <hr>
    <table class="table table-striped">
        <tr>
            <th class="tc" width="5%"></th>
            <th>ID</th>
            <th>姓名</th>
            <th>邮箱</th>
            <th>状态</th>

        </tr>
        @foreach($users as $user)
            <tr>
                <td class="tc"><input name="id[]" value="" type="checkbox"></td>

                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>Active</td>
            </tr>
        @endforeach
    </table>
    {{ $users->links() }}

@endsection