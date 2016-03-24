<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\db\Connection;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Shi;
use yii\data\Pagination;


class ShouController extends Controller
{
	  public $enableCsrfValidation = false; 
	  public function actionShou(){
	  	  return $this->render('shou');
	  }

	  public function actionSe(){
	  	  $db = Yii::$app->db;
	  	  if(Yii::$app->request->isPost){
			$content = $_POST['content'];
	  	    
	  	   $request = Yii::$app->request;
	  	   
	  	   $time = date('Y-m-d H:i:s',time());
	  	   $sql = "insert into liu(content,time) values('$content','$time')";
	  	   $arr = $db->createCommand($sql)->execute();

	  	  }
	  	    $admin = Shi::find();	  	 	
	  	   $pages = new Pagination(['totalCount' => $admin->count(),'pagesize'=>3]);
		    $models = $admin->offset($pages->offset)->limit($pages->limit)->all();

		    return $this->render('se', [
		         'models' => $models,
		         'pages' => $pages,
		    ]);
	  	   

	  }

	  public function actionDelete(){
	  	   $admin = Shi::find();
	  	   $request = Yii::$app->request;
	  	   $db = Yii::$app->db;
	  	   $id = $_POST['id'];
	  	   $sql = "delete from liu where id='$id'";
	  	   $arr = $db->createCommand($sql)->execute();
	  	   $sql1 = "select * from liu";
	  	   $arr = $db->createCommand($sql1)->queryAll();
	  	   $countQuery = clone $admin;
	  	   $pages = new Pagination(['totalCount' => $countQuery->count(),'pagesize'=>3]);
		    $models = $admin->offset($pages->offset)->limit($pages->limit)->all();

		    return $this->renderPartial('delete', [
		         'models' => $models,
		         'pages' => $pages,
		    ]);
	  	   
	  	 //  return $this->renderPartial('delete',['arr'=>$arr]);
	  }

	  public function actionUpdate(){
	  	   $admin = new Shi();
	  	   $request = Yii::$app->request;
	  	   $db = Yii::$app->db; 
	  	   if($request->isPost){
	  	   	    $id = $request->post('id', '');
	  	   	    $admin->id = $id;
	  	   }
	  	   $sql = "select * from liu where id='$id'";
	  	   $arr = $db->createCommand($sql)->queryAll();
	  	   return $this->renderPartial('update',['arr'=>$arr]);
	  }

	  public function actionUpd(){
	  	    $admin = Shi::find();
	  	   $request = Yii::$app->request;
	  	   $db = Yii::$app->db; 
	  	   $id = $_POST['id'];
	  	   $content = $_POST['content'];
	  	   $sql = "update liu set content='$content' where id='$id'";
	  	   $arr = $db->createCommand($sql)->execute();
	  	   $sql1 = "select * from liu";
	  	   $arr = $db->createCommand($sql1)->queryAll();
	  	    $countQuery = clone $admin;
	  	   $pages = new Pagination(['totalCount' => $countQuery->count(),'pagesize'=>3]);
		    $models = $admin->offset($pages->offset)->limit($pages->limit)->all();

		    return $this->render('se', [
		         'models' => $models,
		         'pages' => $pages,
		    ]);
	  	 // return $this->render('se',['arr'=>$arr]);
	  }
}