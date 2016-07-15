@extends('layouts.admin')

@section('content')
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html" color="#white">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">订单查询</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="#" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">unconfirm</option>
                                    <option value="19">canceled</option>
                                    <option value="19">completed</option>
                                    <option value="19">confirmed</option>

                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
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
                    <div class="list-page"> 2 条 1/1 页</div>
                </div>
            </form>
        </div>
    </div>

@endsection