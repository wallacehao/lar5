@extends("admin.master")
@section("title","Main page")
@section("content")
<div align="center">
    <table class="function_table">
        <tr>
            <td class="function_item user_add"><a href="{!! Route('getUserAdd') !!}">Add User</a></td>
            <td class="function_item user_list"><a href="{!! Route('getUserList') !!}">User Manager</a></td>
            <td rowspan="3" class="log_panel">
                <img src="{!! asset('public/assets/qt64_template/images/chart.png') !!}" width="20px" align="absmiddle" /> <b>Statistics</b><br /><br />
                Total of users: {!! $starUser !!}<br />
                Total of categories: {!! $starCate !!}<br />
                Total of news: {!! $starNews !!}
            </td>
        </tr>
        <tr>
            <td class="function_item cate_add"><a href="{!! Route('getCateAdd') !!}">Add Category</a></td>
            <td class="function_item cate_list"><a href="{!! Route('getCateList') !!}">Category Manager</a></td>
        </tr>
        <tr>
            <td class="function_item news_add"><a href="{!! Route('getNewsAdd') !!}">Add News</a></td>
            <td class="function_item news_list"><a href="{!! Route('getNewsList') !!}">News Manager</a></td>
        </tr>
    </table>
</div>
@endsection