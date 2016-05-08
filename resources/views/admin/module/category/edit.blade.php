@extends("admin.master")
@section("title","Edit category")
@section("content")
	<form action="" method="post">
        <fieldset>
            <legend>Enter Category Information</legend>
            <span class="form_label">
                Catagory root 
            </span>
            <span class="form_item">
                <select name="sltCate" class="textbox">
                	<option value="0">ROOT</option>
                    <?php menuMulti($parent,0,"---|",$data["parent_id"]); ?>
                </select>
            </span><br />

            <span class="form_label">
                Category name: 
            </span>
            <span class="form_item">
                <input type="text" name="txtCateName" size="30" class="textbox" value="{!! old('txtCateName',isset($data['name']) ? $data['name'] : null ) !!}" />
            </span><br />
            <span class="form_label">
            </span>
            <span class="form_item">
                <input type="submit" name="btnAdd" value="Edit Category" class="button" />
            </span>
        </fieldset>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@stop