<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Designation extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function create_designation(){
        try{
            $data=array();
            $insert=array();
            $request = json_decode(json_encode($_POST), FALSE);
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status=true;
            if(isset($request->designationname) && preg_match("/^[a-zA-Z ]{3,20}$/",$request->designationname)){
                $insert[0]['designationname']=$request->designationname;
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
                        $res=$this->Model_Db->update(25,$insert,"id",$request->txtid);
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
                        $res=$this->Model_Db->insert(25,$insert);
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
    public function load_designation(){
        try{
            $data=array();
            $where="isactive=true";
            $res=$this->Model_Db->select(25,null,$where);
            if($res!=false){
                foreach ($res as $r){
                    $data[]="<option value='$r->id'>$r->designationname</option>";
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
    public function report_designation($status=null){
        try{
            $data=array();
            $request = json_decode(json_encode($_POST), FALSE);
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $current_date=Date("Y-m-d");
			if(isset($request->onlyactive) && is_numeric($request->onlyactive)){
				$where="isactive=true";
			}else if(isset($request->onlyinactive) && is_numeric($request->onlyinactive)){
				$where="isactive=false";
			}else if(isset($status) && $status!=null){
				$where="DATE(createdat)=DATE('$current_date')";
			}else{
				$where="1=1";
			}
            $res=$this->Model_Db->select(25,null,$where);
            if($res!=false){
                foreach ($res as $r){
                    $data[]=array(
                        'id'=>$r->id,
                        'designationname'=>$r->designationname,
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
