<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use App\Http\Requests;
use Auth;
class UserController extends Controller
{
    //
    public function getDanhSach(){
    	$user = User::all();
    	return view('admin.user.danhsach',['user'=>$user]);
    }
    public function getThem(){
    	return view('admin.user.them');
    }
    public function postThem(Request $request){
    	$this->validate($request,[
    		'username' => 'required|unique:users,name',
    		'email' => 'required|email|unique:users,email',
    		'password' => 'required',
            're_password'=>'required|same:password',
    		'rdo_quyen' => 'required'
    		],[
    		'username.required' => 'Bạn chưa nhập tên',
            'username.unique' => 'Tên tài khoản đã tồn tại',
    		'email.required' => 'Bạn chưa nhập email',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Bạn chưa nhập đúng định dạnh email',
    		'password.required' => 'Bạn chưa nhập pass',
            're_password.same'=>'Password không trùng nhau ',
            're_password.unique'=>'Bạn chưa nhập pass',
    		'rdo_quyen.required' => 'Bạn chưa chọn quyền'
    		]);
    	$user = new User;
    	$user->name = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->quyen = $request->rdo_quyen;
        $user->save();
         return redirect('admin/user/them')->with('thongbao','thêm thành công');
    }
    public function getSua($id){
        $user = User::find($id);
        return view('admin/user/sua',['user'=>$user]);
    }
    public function postSua(Request $request,$id){
        $this->validate($request,[
            'username' => 'required'
            ],[
            'username.required' => 'Bạn chưa nhập tên'
            ]);
        $user = User::find($id);
        $user->name = $request->username;
        $user->password = bcrypt($request->password);
        if($request->checkpass == "on"){
        $this->validate($request,[
            'password' => 'required',
            're_password'=>'required|same:password'
            ],[
            'password.required' => 'Bạn chưa nhập pass',
            're_password.same'=>'Password không trùng nhau ',
            're_password.unique'=>'Bạn chưa nhập pass'
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->quyen = $request->rdo_quyen;
        $user->save();
         return redirect('admin/user/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id){
        $user = User::find($id);
        $cmt = Comment::where('idUser',$id);
        $cmt->delete();
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao','Delete sussess');
    }

    public function getdangnhapAdmin(){
        return view('admin.login');
    }
    public function postDangNhapAdmin(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
            ]
            ,
            [
            'email.required'=>'Bạn chưa nhập mail',
            'password.required'=>'Bạn chưa nhập pass'
            ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('admin/theloai/danhsach');  
        }
        else
        {
            return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công');
        }
    }
    public function getDangXuatAdmin(){
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}
