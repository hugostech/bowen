

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>管理员中心</title>
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/css/main.css"/>
    <script type="text/javascript" src="{{url('/')}}/admin/js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <!--<div class="topbar-inner clearfix">-->
    <div class="topbar-logo-wrap clearfix">
        <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">管理员中心</a></h1>
    </div>
</div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="{{url('clientmanage')}}"><i class="icon-font">&#xe008;</i>客户管理</a></li>
                        <li><a href="administer-公告发布.html"><i class="icon-font">&#xe005;</i>公告发布</a></li>
                        <li><a href="{{url('management')}}"><i class="icon-font">&#xe006;</i>订单查询</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="{{url('addservice')}}"><i class="icon-font">&#xe017;</i>Service Management</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    @yield('content')
    <!--/main-->
</div>
</body>
</html>