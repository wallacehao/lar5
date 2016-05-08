@extends("admin.master")
@section("title","add category")
@section("content")
	<form action="" method="post">
        <fieldset>
            <legend>Enter Category Information</legend>
            <span class="form_label">
                Catagory root 
            </span>
            <span class="form_item">
                <select name="sltCate" class="textbox">
                	<option value="0">--ROOT--</option>
                    <?php menuMulti($dataCate,$parent_id=0,$str="---|",old('sltCate')) ?>
                </select>
            </span><br />
            <span class="form_label">
                Category name: 
            </span>
            <span class="form_item">
                <input type="text" name="txtCateName" size="30" class="textbox" value="{!! old('txtCateName') !!}" />
            </span><br />
            <span class="form_label">
            </span>
            <span class="form_item">
                <input type="submit" name="btnAdd" value="Add Category" class="button" />
            </span>
        </fieldset>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection