@extends('user.master')
@section('title','Detail page')
@section('content')
<div class="news">
    <h1>{!! $data['title'] !!}</h1>
    <img src="{!! asset('public/uploads/news/'.$data['images']) !!}" class="thumbs" />
    <p>
        <i><b>Danh mục</b>: <a href="{!! route('cate',['id'=>$data['cate']['id'], 'alias'=>$data['cate']['slug']]) !!}">{!! $data['cate']['name']  !!}</a><br />
        <b>Nguồn</b>:     {!! $data['author'] !!}<br />
        <b>Viết bởi</b>:  {!! $data['author'] !!}<br />
        <b>Ngày viết</b>: {!! date("d/m/Y",strtotime($data['created_at'])) !!}</i>
    </p>
    <p>
        {!! $data['intro'] !!}
    </p>
    <p>
        {!! $data['full'] !!}    
    </p>
</div>
@endsection 