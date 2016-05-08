<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DateTime;
use App\Http\Requests\NewsAddRequest;
use App\Http\Requests\NewsEditRequest;
use App\Models\Cate;
use App\Models\News;
use Carbon\Carbon;
use File;

class NewsController extends Controller
{
    public function getNewsAdd() {
    	$cate = Cate::select('id','name','parent_id')->get()->toArray();
    	return view('admin.module.news.add',['cate'=>$cate]);
    }

    public function postNewsAdd(NewsAddRequest $request) {
    	$news = new News();
    	$file = $request->file('newsImg');
    	$news->title  		= $request->txtTitle;
    	$news->alias  		= str_slug($request->txtTitle);
    	$news->author 		= $request->txtAuthor;
    	$news->intro  		= $request->txtIntro;
    	$news->full   		= $request->txtFull;
    	if (strlen($file) > 0) {
    		$fileName       	= time().'.'.$file->getClientOriginalName();
    		$destinationPath    = 'uploads/news/';
    		$file->move($destinationPath, $fileName);
    		$news->images  	= $fileName;
    	}
    	$news->status   	= $request->rdoPublic;
    	$news->users_id     = Auth::User()->id;
    	$news->category_id  = $request->sltCate;
    	$news->created_at   = new DateTime();
    	$news->save();
    	return Redirect()->route("getNewsList")->with(['flash-level' => 'result_msg', 'flash_message'=> 'Add news successfully']);
    }

    public function getNewsList() {
        $news =  News::select('id','title','author','created_at')->get()->toArray();
    	return view('admin.module.news.list',["news"=>$news]);
    }

    public function getNewsEdit($id) {
        $news = News::findOrFail($id);
        $cate = Cate::select("id","name","parent_id")->get()->toArray();
        return view('admin.module.news.edit', ['data_news'=>$news, "data_cate"=>$cate]);
    }

    public function postNewsEdit(NewsEditRequest $request,$id) {
        $news = News::findOrFail($id);
        $file = $request->file('newsImg');
        $news->title        = $request->txtTitle;
        $news->alias        = str_slug($request->txtTitle);
        $news->author       = $request->txtAuthor;
        $news->intro        = $request->txtIntro;
        $news->full         = $request->txtFull;
        $oldImage           = $request->oldImage;
        $news->images       = $oldImage;
        if (strlen($file) > 0) {
            if (file_exists(public_path().'/uploads/news/'.$oldImage)) {
                File::delete(public_path().'/uploads/news/'.$oldImage);
            }
            $fileName           = time().'.'.$file->getClientOriginalName();
            $destinationPath    = 'uploads/news/';
            $file->move($destinationPath, $fileName);
            $news->images   = $fileName;
        } 
        $news->status       = $request->rdoPublic;
        $news->users_id     = Auth::User()->id;
        $news->category_id  = $request->sltCate;
        $news->created_at   = new DateTime();
        $news->save();
        return Redirect()->route("getNewsList")->with(['flash-level' => 'result_msg', 'flash_message'=> 'Edit news successfully']);
    }

    public function getNewsDel($id) {
        $news = News::findOrFail($id);
        if (file_exists(public_path().'/uploads/news/'.$news->images)) {
            File::delete(public_path().'/uploads/news/'.$news->images);
            // unlink(public_path().'/uploads/news/'.$news->images);
        }
        $news->delete();
        return Redirect()->route('getNewsList')->with(['flash-level' => 'result_msg', 'flash_message'=> 'Add news successfully']);
    }

}
