<?php $cate = App\Models\Cate::select("id","parent_id","name","slug")->get()->toArray(); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Jackie Do" />
    <link rel="stylesheet" type="text/css" href="{!! asset('public/assets/qt64_front_end/templates/css/style.css') !!}" />
    <script type="text/javascript" src="{!! asset('public/assets/qt64_front_end/templates/scripts/jquery-1.10.2.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/assets/qt64_front_end/templates/scripts/myscript.js') !!}"></script>
    <title>@yield('title')</title>
</head>
<body>
    <div id="layout">
        <div id="top">
            Banner
        </div><!-- End Top -->
        <div id="topmenu">
            <ul>
                <li><a href="{{ URL::to('/') }}">Trang chủ</li>
                <?php echo subMenu($cate); ?>
            </ul>
        </div>


        <div id="content">
            <div id="left">
                <div id="leftmenu">
                    <h1>
                        Menu Chính
                    </h1>
                    <ul>
                        <li><a href="{!! URL::to('/') !!}">Trang Chủ</a></li>
                        <?php echo subMenu($cate); ?>
                    </ul>
                </div><!-- End leftmenu -->
                <div id="login">
                    <h1>
                        Đăng Nhập
                    </h1>
                    <div class="content">
                        <div id="login_msg"></div>
                        <form name="fLogin" id="fLogin" action="login.php" method="post">
                            Username:<br />
                            <input type="text" name="txtUser" id="txtUser" class="textbox" /><br />
                            Password: <br />
                            <input type="password" name="txtPass" id="txtPass" class="textbox" /><br />
                            <input type="submit" name="btnLogin" id="btnLogin" value="Đăng nhập" />
                        </form>
                    </div>
                </div>
            </div><!-- End Left -->
            <div id="main">
                @yield('content')         
            </div><!-- End Main -->
            <div class="clearfix"></div>
        </div><!-- End Content -->
        <div id="bottom">
            Copyright &copy; wallace.hao
        </div><!-- End Bottom -->
    </div><!-- End Layout -->

</body>
</html>