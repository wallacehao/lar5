<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Jackie Do" />
    <link type="text/css" rel="stylesheet" href="{!! asset("public/assets/qt64_template/css/style.css") !!}" />
	<title>Login</title>
</head>
    <body>
        <div id="top_banner">
            Amin Area    
        </div>
        <div id="main_content">
            <div align="center">
                @include("admin.blocks.error")
                <form action="" method="post">
                    <fieldset>
                        <legend>Login To Amin Area</legend>
                        <table>
                            <tr>
                                <td class="login_panel"></td>
                                <td>
                                    <span class="form_label">
                                        Username:
                                    </span>
                                    <span class="form_item">
                                        <input type="text" name="txtUser" size="30" class="textbox" />
                                    </span><br />
                                    <span class="form_label">
                                        Password:
                                    </span>
                                    <span class="form_item">
                                        <input type="password" name="txtPass" size="30" class="textbox" />
                                    </span><br />
                                    <span class="form_label">
                                    </span>
                                    <span class="form_item">
                                        <input type="submit" name="btnLogin" value="Log In" class="button" />
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
        <script type="text/javascript" src="{!! asset('public/assets/qt64_template/js/myscript.js') !!}"></script>
    </body>
</html>