<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CateAddRequest;
use App\Http\Requests\CateEditRequest;
use App\Models\Cate;
use DateTime;

class CateController extends Controller
{
	
    public function getCateAdd() {
        $data = Cate::select('id','name','parent_id')->get()->toArray();
    	return view('admin.module.category.add',['dataCate'=>$data]);
    }


    public function postCateAdd(CateAddRequest $request) {
    	$cate 		      = new Cate;
    	$cate->name 	  = $request->txtCateName;
    	$cate->slug 	  = str_slug($request->txtCateName,'-');
    	$cate->parent_id  = $request->sltCate;
    	$cate->created_at = new DateTime();
    	$cate->save();
    	return Redirect()->route("getCateList")->with(['flash-level' => 'result_msg', 'flash_message'=> 'Add cate successfully']);
    }


    public function getCateList() {
        $cate = Cate::select('id','name','parent_id')->get()->toArray();
    	return view('admin.module.category.list',['cate'=>$cate]);
    }

    public function getCateDel($id) {
       
        $parent = Cate::where('parent_id',$id)->count();
        if ($parent == 0) {
            $cate  = Cate::find($id);
            $cate->delete($id);
            return Redirect()->route("getCateList")->with(['flash-level' => 'result_msg', 'flash_message'=> 'Delete cate successfully']);
        } else {
            echo '
            <script type="text/javascript">
                alert("Sorry ! you cannot delete this cate");
                window.location = "'.Route('getCateList').'";
            </script>';
        }
    }

    public function getCateEdit($id) {
        $data    = Cate::findOrFail($id)->toArray();
        $parent  = Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.module.category.edit',["data"=>$data,"parent"=>$parent]);
    }

    public function postCateEdit(CateEditRequest $request, $id) {
        $cate             = Cate::find($id);
        $cate->name       = $request->txtCateName;
        $cate->slug       = str_slug($request->txtCateName,'-');
        $cate->parent_id  = $request->sltCate;
        $cate->updated_at = new DateTime();
        $cate->save();
        return Redirect()->route("getCateList")->with(['flash-level' => 'result_msg', 'flash_message'=> 'Update cate successfully']);
    }

}
