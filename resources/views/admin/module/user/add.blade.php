@extends('admin.master')
@section('title','Add user')
@section('content')
	<form action="" method="post">
        <fieldset>
            <legend>User information</legend>
            <span class="form_label">
                Username:  
            </span>
            <span class="form_item">
                <input type="text" name="txtUser" size="30" class="textbox" value="{!! old('txtUser') !!}" />
            </span><br />

            <span class="form_label">
                Password:  
            </span>
            <span class="form_item">
                <input type="password" name="txtPass" size="30" class="textbox" value="" />
            </span><br />

            <span class="form_label">
                Confirm password:  
            </span>
            <span class="form_item">
                <input type="password" name="txtConfirmPass" size="30" class="textbox" value="" />
            </span><br />

            <span class="form_label">
                Level: 
            </span>
            <span class="form_item">
                <input type="radio" name="rdoLevel" size="30" value="1" checked="checked" 
                    @if(old('rdoLevel') == 1)
                        checked
                    @endif
                /> Admin
                <input type="radio" name="rdoLevel" size="30" value="2"
                    @if(old('rdoLevel') == 2)
                        checked
                    @endif
                 /> Member
            </span><br />

            <span class="form_label"></span>
            <span class="form_item">
                <input type="submit" name="btnAdd" value="Add User" class="button" />
            </span>
        </fieldset>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection