<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Department extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function create_department(){
        try{
            $data=array();
            $insert=array();
            $request = json_decode(json_encode($_POST), FALSE);
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status=true;
            if(isset($request->departmentname) && preg_match("/^[a-zA-Z ]{3,20}$/",$request->departmentname)){
                $insert[0]['departmentname']=$request->departmentname;
            }else{
                $status=false;
            }
            if(isset($request->isactive) && preg_match("/[0,1]{1}/",$request->isactive)){
                if($request->isactive==1){
                    $insert[0]['isactive']=true;
                }else if($request->isactive==0){
                    $insert[0]['isactive']=false;
                }else{
                    $status=false;
                }
            }else{
                $status=false;
            }
            if($status){
                if(isset($request->txtid) && is_numeric($request->txtid)){
                    if($request->txtid>0){
                        $insert[0]['updatedby']=$this->session->login['userid'];
                        $insert[0]['updatedat']=date("Y-m-d H:i:s");
                        $res=$this->Model_Db->update(23,$insert,"id",$request->txtid);
                        if($res!=false){
                            $data['message']="Update successful.";
                            $data['status']=true;
                        }else{
                            $data['message']="Update failed.";
                            $data['status']=false;
                        }
                    }else if($request->txtid==0){
                        $insert[0]['entryby']=$this->session->login['userid'];
                        $insert[0]['createdat']=date("Y-m-d H:i:s");
                        $res=$this->Model_Db->insert(23,$insert);
                        if($res!=false){
                            $data['message']="Insert successful.";
                            $data['status']=true;
                        }else{
                            $data['message']="Insert failed.";
                            $data['status']=false;
                        }
                    }else{
                        $data['message']="Insufficient/Invalid data.";
                        $data['status']=false;
                    }
                }else{
                    $data['message']="Insufficient/Invalid data.";
                    $data['status']=false;
                }
            }else{
                $data['message']="Insufficient/Invalid data.";
                $data['status']=false;
            }
            echo json_encode($data);
            exit();
        }catch (Exception $e){
            $data['message']= "Message:".$e->getMessage();
            $data['status']=false;
            $data['error']=true;
            echo json_encode($data);
            exit();
        }
    }
    public function load_department(){
        try{
            $data=array();
            $where="isactive=true";
            $res=$this->Model_Db->select(23,null,$where);
            if($res!=false){
                foreach ($res as $r){
                    $data[]="<option value='$r->id'>$r->departmentname</option>";
                }
            }
            echo json_encode($data);
        }catch (Exception $e){
            $data['message']= "Message:".$e->getMessage();
            $data['status']=false;
            $data['error']=true;
            echo json_encode($data);
            exit();
        }
    }
    public function report_department($status=null){
        try{
            $data=array();
            $request = json_decode(json_encode($_POST), FALSE);
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $current_date=date("Y-m-d");
            if(isset($status) && $status!=null){
                $where="DATE(createdat)=DATE('$current_date')";
            }else if(isset($request->onlyactive) && is_numeric($request->onlyactive)){
				$where="isactive=true";
			}else if(isset($request->onlyinactive) && is_numeric($request->onlyinactive)){
                $where="isactive=false";
            }else{
				$where="1=1";
			}
            $res=$this->Model_Db->select(23,null,$where);
            if($res!=false){
                foreach ($res as $r){
                    $data[]=array(
                        'id'=>$r->id,
                        'departmentname'=>$r->departmentname,
                        'creationdate'=>$r->createdat,
                        'lastmodifiedon'=>$r->updatedat,
                        'isactive'=>$r->isactive
                    );
                }
            }
            echo json_encode($data);
        }catch (Exception $e){
            $data['message']= "Message:".$e->getMessage();
            $data['status']=false;
            $data['error']=true;
            echo json_encode($data);
            exit();
        }
    }
    public function create_department_mapping(){
        try{
            $data=array();
            $insert=array();
            $request = json_decode(json_encode($_POST), FALSE);
//            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status=true;
            if(isset($request->departmentid) && is_numeric($request->departmentid)){
                $insert[0]['departmentid']=$request->departmentid;
            }else{
                $status=false;
            }
            if(isset($request->companyid) && is_numeric($request->companyid)){
                $insert[0]['companyid']=$request->companyid;
            }else{
                $status=false;
            }
            if(isset($request->isactive) && preg_match("/[0,1]{1}/",$request->isactive)){
                if($request->isactive==1){
                    $insert[0]['isactive']=true;
                }else if($request->isactive==0){
                    $insert[0]['isactive']=false;
                }else{
                    $status=false;
                }
            }else{
                $status=false;
            }
            if($status){
                if(isset($request->txtid) && is_numeric($request->txtid)){
                    if($request->txtid>0){
                        $insert[0]['updatedby']=$this->session->login['userid'];
                        $insert[0]['updatedat']=date("Y-m-d H:i:s");
                        $res=$this->Model_Db->update(27,$insert,"id",$request->txtid);
                        if($res!=false){
                            $data['message']="Update successful.";
                            $data['status']=true;
                        }else{
                            $data['message']="Update failed.";
                            $data['status']=false;
                        }
                    }else if($request->txtid==0){
                        $insert[0]['entryby']=2;
//                        $insert[0]['entryby']=$this->session->login['userid'];
                        $insert[0]['createdat']=date("Y-m-d H:i:s");
                        $res=$this->Model_Db->insert(27,$insert);
                        if($res!=false){
                            $data['message']="Insert successful.";
                            $data['status']=true;
                        }else{
                            $data['message']="Insert failed.";
                            $data['status']=false;
                        }
                    }else{
                        $data['message']="Insufficient//Invalid data.";
                        $data['status']=false;
                    }
                }else{
                    $data['message']="Insufficient*/Invalid data.";
                    $data['status']=false;
                }
            }else{
                $data['message']="Insufficient&/Invalid data.";
                $data['status']=false;
            }
            echo json_encode($data);
            exit();
        }catch (Exception $e){
            $data['message']= "Message:".$e->getMessage();
            $data['status']=false;
            $data['error']=true;
            echo json_encode($data);
            exit();
        }
    }
    public function report_department_mapping($status=null){
        try{
            $data=array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $current_date=date("Y-m-d");
            if(isset($status) && $status!=null){
                $where="DATE(createdat)=DATE('$current_date')";
            }else if(isset($request->onlyactive) && is_numeric($request->onlyactive)){
                $where="isactive=true";
            }else if(isset($request->onlyinactive) && is_numeric($request->onlyinactive)){
                $where="isactive=false";
            }else{
                $where="1=1";
            }
            $res=$this->Model_Db->select(27,null,$where);
            if($res!=false){
                foreach ($res as $r){
                    $data[]=array(
                        'id'=>$r->id,
                        'companyid'=>$r->companyid,
                        'departmentid'=>$r->departmentid,
                        'creationdate'=>$r->createdat,
                        'lastmodifiedon'=>$r->updatedat,
                        'isactive'=>$r->isactive
                    );
                }
            }
            echo json_encode($data);
        }catch (Exception $e){
            $data['message']= "Message:".$e->getMessage();
            $data['status']=false;
            $data['error']=true;
            echo json_encode($data);
            exit();
        }
    }
}
