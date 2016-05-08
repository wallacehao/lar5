@extends('user.master')
@section('title','Home page')
@section('content')
    @foreach($data as $item)
        <div class="news">
            <h1>{!! $item['title'] !!}</h1>
            <img src="{!! asset('public/uploads/news/'.$item['images']) !!}" class="thumbs" />
            <h3>Thể loại: {!! $item['cate']['name'] !!}</h3>
            <p>{!! $item['intro']!!}</p>
            <a href="{!! route('detail',['id'=>$item['id'],'alias'=>$item['alias']]) !!}" class="readmore">Đọc thêm</a>
            <div class="clearfix"></div>
        </div>
    @endforeach
@endsection 