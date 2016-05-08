@extends('user.master')
@section('title','cate page')
@section('content')
    <h1 style="color: red; margin-bottom: 10px;">Thể loại: {!! $cate['name'] !!}</h1>
     @foreach($news as $item)
        <div class="news">
            <h1>{!! $item['title'] !!}</h1>
            <img src="{!! asset('public/uploads/news/'.$item['images']) !!}" class="thumbs" />
            <p>{!! $item['intro']!!}</p>
            <a href="{!! route('detail',['id'=>$item['id'],'alias'=>$item['alias']]) !!}" class="readmore">Đọc thêm</a>
            <div class="clearfix"></div>
        </div>
    @endforeach
@endsection 