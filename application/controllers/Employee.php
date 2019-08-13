<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Employee extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function create_employee_type(){
        try{
            $data=array();
            $insert=array();
            $request = json_decode(json_encode($_POST), FALSE);
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status=true;
            if(isset($request->typename) && preg_match("/^[a-zA-Z ]{3,20}$/",$request->typename)){
                $insert[0]['typename']=$request->typename;
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
                        $res=$this->Model_Db->update(15,$insert,"id",$request->txtid);
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
                        $res=$this->Model_Db->insert(15,$insert);
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
    public function load_employee_type(){
        try{
            $data=array();
            $where="isactive=true";
            $res=$this->Model_Db->select(15,null,$where);
            if($res!=false){
                foreach ($res as $r){
                    $data[]="<option value='$r->id'>$r->typename</option>";
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
    public function report_employee_type(){
        try{
            $data=array();
            $request = json_decode(json_encode($_POST), FALSE);
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
			if(isset($request->onlyactive) && is_numeric($request->onlyactive)){
				$where="isactive=true";
			}else{
				$where="1=1";
			}
            $res=$this->Model_Db->select(15,null,$where);
            if($res!=false){
                foreach ($res as $r){
                    $data[]=array(
                        'id'=>$r->id,
                        'typename'=>$r->typename,
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
    public function create_employee(){
        try{
            $data=array();
            $insert=array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status=true;
//            if(isset($request->typename) && preg_match("/^[a-zA-Z ]{3,20}$/",$request->typename)){
//                $insert[0]['typename']=$request->typename;
//            }else{
//                $status=false;
//            }
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
                        $res=$this->Model_Db->update(31,$insert,"id",$request->txtid);
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
                        $res=$this->Model_Db->insert(31,$insert);
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
    public function load_employee(){
        try{
            $data=array();
            $where="isactive=true";
            $res=$this->Model_Db->select(31,null,$where);
            if($res!=false){
                foreach ($res as $r){
                    $data[]="<option value='$r->id'>$r->fname"."&nbsp;"."$r->mname"."&nbsp;"."$r->lname</option>";
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
    public function report_employee(){
        try{
            $data=array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            if(isset($request->onlyactive) && is_numeric($request->onlyactive)){
                $where="isactive=true";
            }else{
                $where="1=1";
            }
            $res=$this->Model_Db->select(31,null,$where);
            if($res!=false){
                foreach ($res as $r){
                    $data[]=array(
                        'id'=>$r->id,
                        'bankname'=>$r->bankname,
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
    public function employee_bank_details(){
        try{
            $data=array();
            $insert=array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status=true;
            if(isset($request->employeename) && is_numeric($request->employeename)){
                $insert[0]['empid']=$request->employeename;
            }else{
                $status=false;
            }
            if(isset($request->employeebankname) && is_numeric($request->employeebankname)){
                $insert[0]['bankid']=$request->employeebankname;
            }else{
                $status=false;
            }
            if(isset($request->bankaccountnumber) && is_numeric($request->bankaccountnumber)){
                $insert[0]['acno']=$request->bankaccountnumber;
            }else{
                $status=false;
            }
            if(isset($request->bankifscnumber) && preg_match("/^[A-Z0-9]{12}$/",$request->bankifscnumber)){
                $insert[0]['ifsccode']=$request->bankifscnumber;
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
                        $res=$this->Model_Db->update(35,$insert,"id",$request->txtid);
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
                        $res=$this->Model_Db->insert(35,$insert);
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
    public function report_employee_bank_details(){
        try{
            $data=array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            if(isset($request->onlyactive) && is_numeric($request->onlyactive)){
                $where="isactive=true";
            }else{
                $where="1=1";
            }
            $res=$this->Model_Db->select(35,null,$where);
            if($res!=false){
                foreach ($res as $r){
                    $data[]=array(
                        'id'=>$r->id,
                        'empid'=>$r->empid,
                        'bankid'=>$r->bankid,
                        'acno'=>$r->acno,
                        'ifsccode'=>$r->ifsccode,
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
