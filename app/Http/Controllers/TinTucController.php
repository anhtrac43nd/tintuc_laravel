<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\LoaiTin;
use App\TheLoai;
use App\Comment;
use App\Http\Requests;

class TinTucController extends Controller
{
    //
    public function getDanhSach(){
    	$tintuc = TinTuc::orderBy('id','DESC')->get();
    	return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }
    public function getThem(){
    	$theloai = TheLoai::all();
    	$loaitin = LoaiTin::all();
    	$tintuc = TinTuc::all();
    	return view('admin/tintuc/them',['theloai'=>$theloai],['loaitin'=>$loaitin],['tintuc'=>$tintuc]);
    }
    public function postThem(Request $request){
    	$this->validate($request,[
    		// 'LoaiTin'=>'required',
    		'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
    		'TomTat'=>'required',
    		'Hinh'=>'required',
    		'NoiDung'=>'required'
    		],
    		[
    		// 'LoaiTin.required'=>'Bạn chưa chọn loại tin',
    		'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
    		'TieuDe.min'=>'Tiêu đề phải dài hơn 3 ký tự',
    		'TieuDe.unique'=>'Tiêu đề này đã tồn tại',
    		'TomTat.required'=>'Bạn chưa nhập dữ liệu tóm tắt',
    		'NoiDung.required'=>'Bạn chưa nhập nội dung',
    		'Hinh.required'=>'Bạn chưa chọn hình ảnh'
    		]);
    	$tintuc = new TinTuc;
    	$tintuc->TieuDe = $request->TieuDe;
    	$tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
    	$tintuc->idLoaiTin = $request->LoaiTin;
    	$tintuc->TomTat = $request->TomTat;
    	$tintuc->NoiDung = $request->NoiDung;
    	$tintuc->SoLuotXem = 0;
    	$tintuc->NoiBat = $request->rdoAn_Hien;
    	if($request->hasFile('Hinh'))
    	{
    		$file = $request->file('Hinh');
    		$duoi = $file->getClientOriginalExtension();
    		// if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    		// 	return redirect('admin/tintuc/them')->with('loi','Bạn chỉ đc chọn file có đuôi jpg,png,jpeg');
    		// }
    		$name = $file->getClientOriginalName();
    		$hinh = str_random(6)."_".$name;
    		while (file_exists("upload/tintuc".$hinh)){
    			$hinh = str_random(6)."_".$name;
    		}
    		$file->move("upload/tintuc",$hinh);
    		$tintuc->Hinh = $hinh;
    	}else{
    		$tintuc->Hinh = "";
    	}
    	$tintuc->save();
    	return redirect('admin/tintuc/them')->with('thongbao','Add sussess');
    }
    public function getSua($id){
     	$theloai = TheLoai::all();
    	$loaitin = LoaiTin::all();
    	$tintuc = TinTuc::find($id);
    	return view('admin.tintuc.sua',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
    public function postSua(Request $request,$id){
    	$tintuc = TinTuc::find($id);
    	$this->validate($request,[
    		// 'LoaiTin'=>'required',
    		'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
    		'TomTat'=>'required',
    		'NoiDung'=>'required'
    		]
            ,
    		[
    		// 'LoaiTin.required'=>'Bạn chưa chọn loại tin',
    		'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
    		'TieuDe.min'=>'Tiêu đề phải dài hơn 3 ký tự',
    		'TieuDe.unique'=>'Tiêu đề này đã tồn tại',
    		'TomTat.required'=>'Bạn chưa nhập dữ liệu tóm tắt',
    		'NoiDung.required'=>'Bạn chưa nhập nội dung'
    		
    	]);
    	$tintuc->TieuDe = $request->TieuDe;
    	$tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
    	$tintuc->idLoaiTin = $request->LoaiTin;
    	$tintuc->TomTat = $request->TomTat;
    	$tintuc->NoiDung = $request->NoiDung;
    	$tintuc->NoiBat = $request->rdoAn_Hien;
    	if($request->hasFile('Hinh'))
    	{
    		$file = $request->file('Hinh');
    		$duoi = $file->getClientOriginalExtension();
    		// if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    		// 	return redirect('admin/tintuc/them')->with('loi','Bạn chỉ đc chọn file có đuôi jpg,png,jpeg');
    		// }
    		$name = $file->getClientOriginalName();
    		$hinh = str_random(6)."_".$name;
    		while (file_exists("upload/tintuc".$hinh)){
    			$hinh = str_random(6)."_".$name;
    		}
    		$file->move("upload/tintuc",$hinh);
    		unlink("upload/tintuc/".$tintuc->Hinh);
    		$tintuc->Hinh = $hinh;
    	}
    	$tintuc->save();
    	return redirect ('admin/tintuc/sua/'.$id)->with('thongbao','Edit sussess');
    }
    public function getXoa($id){
    	$tintuc = TinTuc::find($id);
    	$tintuc->delete();
    	return redirect("admin/tintuc/danhsach")->with('thongbao','Delete sussess');

    }
}
