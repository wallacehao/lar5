@extends('admin.master')
@section('title','List news')
@section('content')
	<div align="center">
        <table class="list_table">
            <tr>
                <td class="list_th" width="30px">ID</td>
                <td class="list_th">Title</td>
                <td class="list_th">Author</td>
                <td class="list_th">Date</td>
                <td class="list_th" width="50px">Edit</td>
                <td class="list_th" width="50px">Del</td>
            </tr>
            <?php $stt=0; ?>
            @foreach($news as $item)
            <?php $stt++; ?>
            <tr>
                <td align="center" class="list_td" width="30px">{!! $stt !!}</td>
                <td align="center" class="list_td">{!! $item["title"] !!}</td>
                <td align="center" class="list_td">{!! $item["author"] !!}</td>
                <td align="center" class="list_td">
                    <?php \Carbon\Carbon::setLocale('vi') ?>
                    {!! \Carbon\Carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffforHumans() !!}
                </td>
                <td align="center" class="list_td" width="50px">
                    <a href="{!! Route('getNewsEdit',['id'=>$item['id']]) !!}">
                        <img src="{!! asset('public/assets/qt64_template/images/edit.png') !!}" alt="">
                    </a>
                </td>
                <td align="center" class="list_td" width="50px">
                    <a onclick="ConfirmMess('Are you sure delete ? ')" href="{!! Route('getNewsDel',['id'=>$item['id']]) !!}">
                        <img src="{!! asset('public/assets/qt64_template/images/delete.png') !!}" alt="">
                    </a>    
                </td>    
            </tr>
            @endforeach
        </table>
    </div>
@endsection