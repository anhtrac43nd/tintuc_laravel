<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Http\Requests;

class SlideController extends Controller
{
    //
    public function getDanhSach(){
    	$slide = Slide::all();
    	return view('admin.slide.danhsach',['slide'=>$slide]);
    }
    public function getThem(){
    	return view('admin.slide.them');
    }
    public function postThem(Request $request){
    	$this->validate($request,[
    		'Ten' => 'required',
    		'NoiDung' => 'required'

    		],[
    		'Ten.required' => 'Bạn chưa nhập tên',
    		'NoiDung.required' => 'Bạn chưa nhập thông báo'
    		]);
    	$slide = new Slide;
    	$slide->Ten = $request->Ten;
    	$slide->NoiDung = $request->NoiDung;
    	if ($request->has('link'))
    		$slide->link = $request->Link;
    	if($request->hasFile('Hinh'))
    	{
    		$file = $request->file('Hinh');
    		$duoi = $file->getClientOriginalExtension();
    		// if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    		// 	return redirect('admin/slide/them')->with('loi','Bạn chỉ đc chọn file có đuôi jpg,png,jpeg');
    		// }
    		$name = $file->getClientOriginalName();
    		$hinh = str_random(6)."_".$name;
    		while (file_exists("upload/slide".$hinh)){
    			$hinh = str_random(6)."_".$name;
    		}
    		$file->move("upload/slide",$hinh);
    		$slide->Hinh = $hinh;
    	}else{
    		$slide->Hinh = "";
    	}
    	$slide->save();
    	return redirect('admin/slide/them')->with('thongbao','Add sussess');
    }
    public function getSua($id){
    	$slide = Slide::find($id);
    	return view('admin.slide.sua',['slide'=>$slide]);
    }
    public function postSua(Request $request,$id){
    	$slide = Slide::find($id);
    	$this->validate($request,[
    		'Ten'=>'required',
    		'NoiDung'=>'required'
    		],
    		[
    		// 'LoaiTin.required'=>'Bạn chưa chọn loại tin',
    		'Ten.required'=>'Bạn chưa nhập tên',
    		'NoiDung.required'=>'Bạn chưa nhập Nội Dung'
    		
    	]);
    	$slide->Ten = $request->Ten;
    	$slide->NoiDung = $request->NoiDung;
    	if ($request->has('link'))
    		$slide->link = $request->Link;
    	if($request->hasFile('Hinh'))
    	{
    		$file = $request->file('Hinh');
    		$duoi = $file->getClientOriginalExtension();
    		// if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    		// 	return redirect('admin/slide/them')->with('loi','Bạn chỉ đc chọn file có đuôi jpg,png,jpeg');
    		// }
    		$name = $file->getClientOriginalName();
    		$hinh = str_random(6)."_".$name;
    		while (file_exists("upload/slide".$hinh)){
    			$hinh = str_random(6)."_".$name;
    		}
    		$file->move("upload/slide",$hinh);
    		unlink("upload/slide/".$slide->Hinh);
    		$slide->Hinh = $hinh;
    	}
    	$slide->save();
    	return redirect ('admin/slide/sua/'.$id)->with('thongbao','Edit sussess');

    }
    public function getXoa($id){
        $slide = Slide::find($id);
        $slide->delete();
        return redirect('admin/slide/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
    
}
