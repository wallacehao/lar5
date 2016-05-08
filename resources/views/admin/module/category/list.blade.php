@extends("admin.master")
@section("title","List category")
@section("content")
	<div align="center">
        <table class="list_table">
            <tr>
                <td class="list_th" width="30px">ID</td>
                <td class="list_th">Category name</td>
                <td class="list_th" width="50px">Edit</td>
                <td class="list_th" width="50px">Del</td>
            </tr>
            <?php listCate($cate); ?>
        </table>
    </div>
@endsection