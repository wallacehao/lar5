<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Jackie Do" />
    <link type="text/css" rel="stylesheet" href="{!! asset('public/assets/qt64_template/css/style.css') !!}" />
    <title>@yield("title")</title>
    <script type="text/javascript" src="{!! asset('public/assets/qt64_template/js/plugin/ckeditor/ckeditor.js') !!}"></script>
</head>
    <body>
        <div id="top_banner">
            Admin Function: @yield("title")
        </div>
        <div id="nav_bar">
            <table width="100%">
                <tr>
                    <td>
                        <a href="/dt_admin">Main Page</a> |
                        <a href="{!! Route('getCateList') !!}">Cate manage</a> |
                        <a href="{!! Route('getNewsList') !!}">News manage</a> |
                        <a href="{!! Route('getUserList') !!}">User manage</a>
                    </td>
                    <td align="right">
                        Welcome <a href="#">{!! Auth::user()->username !!}</a> | 
                    <a href="{!! URL('dt_logout') !!}">Logout</a></td>
                </tr>
            </table>
        </div>
        <div id="main_content">
            @include("admin.blocks.error")
            @include("admin.blocks.flash")
            @yield("content")
        </div>
        <script type="text/javascript" src="{!! asset('public/assets/qt64_template/js/jquery-1.12.3.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('public/assets/qt64_template/js/myscript.js') !!}"></script>
    </body>
</html>