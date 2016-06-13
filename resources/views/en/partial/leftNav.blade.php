<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        <label>{{$user->name}}</label><br>
        {{$user->phone}}<br>
        {{$user->email}} <label><small style="color: red">Actived</small></label><br>
        <hr>
        <ul class="list-group">
            <li class="list-group-item active">My parkage</li>
            <li class="list-group-item">Chinese Address</li>
            <li class="list-group-item">Your address book</li>
            <li class="list-group-item">Finance Detail</li>
        </ul>
    </div>
</div>