<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Http\Requests;

class PageController extends Controller
{
    //
    function trangchu(){
    	$theloai = TheLoai::all();
    	$tinmoinhat = TinTuc::orderBy('id','desc')->take(5);
    	return view('pages.trangchu',compact('theloai','tinmoinhat'));
    }
}
