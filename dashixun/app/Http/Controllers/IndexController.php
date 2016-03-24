<?php

namespace App\Http\Controllers;
use App\Index;
use App\Http\Controllers\Controller;

use DB;

class IndexController extends Controller
{
	  public function index(){
	  	   return view('index.index');
	  } 

	  public function slist(){
	        if(!empty($_GET['content'])){
	            $content = $_GET['content'];
		  	    $time = date('Y-m-d H:i:s',time());
		  	    $sql = "insert into liu(content,time) values('$content','$time')";
		  	    $re = DB::insert($sql);
	  	    
	        }
	        $sql1 = "select * from liu";
	  	    $arr = DB::select($sql1);
	  	    $users = DB::table('liu')->paginate(3);
	  	    return view('index.slist',['arr'=>$arr,'users'=>$users]);
	  }

	  public function delete(){
	  	  $id = $_GET['id'];
	  	  $sql = "delete from liu where id='$id'";
	  	  $arr = DB::delete($sql);
	  	  $sql1= "select * from liu";
	  	  $arr = DB::select($sql1);
	  	  $users = DB::table('liu')->paginate(3);
	  	  return view('index.delete',['arr'=>$arr,'users'=>$users]);
	  }

	  public function update(){
	  	   $id = $_GET['id'];
	  	   $sql = "select * from liu where id='$id'";
	  	   $arr = DB::select($sql);
	  	   return view('index.update',['arr'=>$arr]);
	  }

	  public function upd(){
	  	   $id = $_GET['id'];
	  	   $content = $_GET['content'];
	  	   $sql = "update liu set content='$content' where id='$id'";
	  	   $arr = DB::update($sql);
	  	   $sql1 = "select * from liu";
	  	   $arr = DB::select($sql1);
	  	   $users = DB::table('liu')->paginate(3);
	  	   return view('index.slist',['arr'=>$arr,'users'=>$users]);
	  }
}