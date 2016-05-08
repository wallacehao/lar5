@extends('admin.master')
@section('title','Edit user')
@section('content')
	<form action="" method="post">
        <fieldset>
            <legend>User information</legend>
            <span class="form_label">
                Username:  
            </span>
            <span class="form_item">
                <input disabled="disabled" type="text" name="txtUser" size="30" class="textbox" value="{!! $data['username'] !!}" />
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
            @if(Auth::user()->id != $data["id"])
                <span class="form_label">
                    Level: 
                </span>
                <span class="form_item">
                    <input type="radio" name="rdoLevel" size="30" value="1"
                        @if($data["level"] == 1)
                            checked="checked" 
                        @endif
                    /> Admin
                    <input type="radio" name="rdoLevel" size="30" value="2"
                        @if($data['level'] == 2)
                            checked="checked"
                        @endif
                     /> Member
                </span><br />
            @endif

            <span class="form_label"></span>
            <span class="form_item">
                <input type="submit" name="btnEdit" value="Edit User" class="button" />
            </span>
        </fieldset>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection