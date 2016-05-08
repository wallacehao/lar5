@extends('admin.master')
@section('content')
	<div align="center">
        <table class="list_table">
            <tr>
                <td class="list_th" width="30px">ID</td>
                <td class="list_th">Username</td>
                <td class="list_th">Level</td>
                <td class="list_th" width="50px">Edit</td>
                <td class="list_th" width="50px">Del</td>
            </tr>
            <?php $i=0; ?>
            @foreach($data as $value)
            	<?php $i++ ?>
            <tr>
            	<td class="list_td" align="center" width="30px">{!! $i !!}</td>
                <td class="list_td" align="center">{!! $value["username"] !!}</td>
                <td class="list_td" align="center">
                	@if($value["id"] == 1)
                		<span style="color:red;font-weight: bold;">Supper Admin</span>
                	@elseif($value["level"] == 1)
                		<span style="color:blue;font-weight: bold;">Admin</span>	
                	@else
                		<span style="color:black;font-weight: bold;">Member</span>	
                	@endif
                </td>
                <td class="list_td" width="50px" align="center">
                	<a href="{!! Route('getUserEdit',['id'=>$value['id']]) !!}"><img src="{!! asset('public/assets/qt64_template/images/edit.png') !!}" alt=""></a>
                </td>
                <td class="list_td" width="50px" align="center">
                	<a onclick="return ConfirmMess('Are you sure to delete this user');" href="{!! Route('getUserDel',['id'=>$value['id'] ]) !!}"><img src="{!! asset('public/assets/qt64_template/images/delete.png') !!}" alt=""></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@stop