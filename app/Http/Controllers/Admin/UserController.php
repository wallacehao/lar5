<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddRequest;
use App\Models\User;
use DateTime;
use Auth;

class UserController extends Controller
{

    public function getUserAdd() {
    	return view('admin.module.user.add');
    }

    public function postUserAdd(UserAddRequest $request) {
    	$user = new User();
    	$user->username 	= $request->txtUser;
    	$user->password 	= bcrypt($request->txtPass);
    	$user->level    	= $request->rdoLevel;
    	$user->created_at	= new DateTime();
    	$user->save();
    	return Redirect()->route('getUserList')->with(['flash-level' => 'result_msg', 'flash_message' => 'Add user successfully']);
    }

    public function getUserList() {
    	$data = User::select('id','username','level')->get()->toArray();
    	return view('admin.module.user.list', ["data"=>$data]);
    }

    public function getUserDel($id) {
    	$user_current_login = Auth::user()->id;
    	$user_delete        = User::find($id);
    	if (($id == 1) || ($user_current_login !=1 && $user_delete["level"] == 1)) {
    		return Redirect()->route('getUserList')->with(['flash-level' => 'error_msg','flash_message'=> 'You don\'t permission to delete this user' ]);
    	} else {
    		$user_delete->delete($id);
    		return Redirect()->route('getUserList')->with(['flash-level' => 'result_msg', 'flash_message' => 'Delete user successfully']);
    	}
    }

    public function getUserEdit($id) {
    	$data = User::findOrFail($id)->toArray();
    	if ((Auth::user()->id != 1) && ($id == 1 || $data["level"] == 1 && (Auth::user()->id != $id ) )) {
    		return Redirect()->route('getUserList')->with(['flash-level' => 'error_msg','flash_message'=> 'You don\'t permission to edit this user' ]);
    	} else {

    	}
    	return view('admin.module.user.edit',['data'=>$data]);
    }

    public function postUserEdit(Request $request,$id) {
    	$user = User::find($id);
    	if ($request->txtPass) {
    		$this->validate($request,
    			[
    				'txtConfirmPass' => 'same:txtPass'
    			],
    			[
    				'txtConfirmPass.same' => 'Two password not match'
    			]
    		);
    		$user->password = bcrypt($request->txtPass);
    	}
        if ($request->rdoLevel) {
            $user->level    = $request->rdoLevel;
        }
		$user->updated_at 	= new DateTime();
		$user->save();
		return Redirect()->route('getUserList')->with(['flash-level' => 'result_msg', 'flash_message' => 'Edit user successfully']);
    }
}
