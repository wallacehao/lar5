@extends("admin.master")
@section("title","Edit news")
@section("content")
	<form action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Enter News Information</legend>
            <span class="form_label">
                Catagory root:  
            </span>
            <!-- Cate -->
            <span class="form_item">
                <select name="sltCate" class="textbox">
                	<?php menuMulti($data_cate,0,$str='---|', $data_news["category_id"]) ?>
                </select>
            </span><br />
             <!-- Title -->
            <span class="form_label">
                Title: 
            </span>
            <span class="form_item">
                <input type="text" name="txtTitle" size="30" class="textbox" value="{!! old('txtTitle',isset($data_news['title']) ? $data_news['title']: null ) !!}" />
            </span><br />
            <!-- Author -->
            <span class="form_label">
                Author: 
            </span>
            <span class="form_item">
                <input type="text" name="txtAuthor" size="30" class="textbox" value="{!! old('txtAuthor',isset($data_news['author']) ? $data_news['author'] : null) !!}" />
            </span><br />

            <!-- Short Description -->
            <span class="form_label">
                Short-description:  
            </span>
            <span class="form_item">
   				<textarea name="txtIntro" rows="5" class="textbox">
   					{!! old('txtIntro',isset($data_news['intro']) ? $data_news['intro'] : null) !!}
   				</textarea>
   				<script type="text/javascript">
   					CKEDITOR.replace('txtIntro',{
		                filebrowserBrowseUrl      : '../../public/assets/qt64_template/js/plugin/ckfinder/browse.php?opener=ckeditor&type=files',
		                filebrowserImageBrowseUrl : '../../public/assets/qt64_template/js/plugin/ckfinder/browse.php?opener=ckeditor&type=images',
		                filebrowserFlashBrowseUrl : '../../public/assets/qt64_template/js/plugin/ckfinder/browse.php?opener=ckeditor&type=flash',
		                filebrowserUploadUrl      : '../../public/assets/qt64_template/js/plugin/ckfinder/upload.php?opener=ckeditor&type=files',
		                filebrowserImageUploadUrl : '../../public/assets/qt64_template/js/plugin/ckfinder/upload.php?opener=ckeditor&type=images',
		                filebrowserFlashUploadUrl : '../../public/assets/qt64_template/js/plugin/ckfinder/upload.php?opener=ckeditor&type=flash'
            		});
   				</script>
            </span><br />

            <!-- Long Description -->
            <span class="form_label">
                Long-description:  
            </span>
            <span class="form_item">
   				<textarea name="txtFull" rows="5" class="textbox">
   					{!! old('txtFull',isset($data_news['full']) ? $data_news['full'] : null) !!}
   				</textarea>
   				<script type="text/javascript">
   					CKEDITOR.replace('txtFull',{
		                filebrowserBrowseUrl      : '../../public/assets/qt64_template/js/plugin/ckfinder/browse.php?opener=ckeditor&type=files',
		                filebrowserImageBrowseUrl : '../../public/assets/qt64_template/js/plugin/ckfinder/browse.php?opener=ckeditor&type=images',
		                filebrowserFlashBrowseUrl : '../../public/assets/qt64_template/js/plugin/ckfinder/browse.php?opener=ckeditor&type=flash',
		                filebrowserUploadUrl      : '../../public/assets/qt64_template/js/plugin/ckfinder/upload.php?opener=ckeditor&type=files',
		                filebrowserImageUploadUrl : '../../public/assets/qt64_template/js/plugin/ckfinder/upload.php?opener=ckeditor&type=images',
		                filebrowserFlashUploadUrl : '../../public/assets/qt64_template/js/plugin/ckfinder/upload.php?opener=ckeditor&type=flash'
            		});
   				</script>
            </span><br />

            <span class="form_label">
            	Hình hiện tại:
            </span>
            <span class="form_item">
            	<img width="120" src="{!! isset($data_news['images']) ? asset("public/uploads/news/".$data_news["images"]) : ''  !!}" alt="" />
            	<input type="hidden" name="oldImage" value="{!! $data_news["images"] !!}" />
            </span><br />

            <!-- Image -->
            <span class="form_label">
                News Image: 
            </span>
            <span class="form_item">
                <input type="file" name="newsImg" size="30" class="textbox" />
            </span><br />

            <!-- Public -->
            <span class="form_label">
                Public news: 
            </span>
            <span class="form_item">
                <input type="radio" name="rdoPublic" value="1"
                	@if(isset($data_news['status']) && $data_news['status'] == 1) 
                		checked="checked" 
                	@endif
                /> Yes
                <input type="radio" name="rdoPublic" value="0" 
                	@if(isset($data_news['status']) && $data_news['status'] == 0) 
                		checked="checked" 
                	@endif
                /> No
            </span><br />

            <span class="form_label">
            </span>
            <span class="form_item">
                <input type="submit" name="btnNews" value="Edit News" class="button" />
            </span>
        </fieldset>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection