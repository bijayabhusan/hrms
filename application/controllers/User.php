<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Model_Db'));
//        $this->load->library('session');
    }
	public function check_user(){
        try{
            $data=array();
//			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $request = json_decode(json_encode($_POST), FALSE);
            if(isset($request->username) && $request->username!=null){
                $isemail=false;
                $ismobile=false;
                $isuserid=false;
                if(preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$request->username)){
                    $data['message']="Its an email id.";
                    $isemail=true;
                }else if(preg_match("/[6,7,8,9]{1}+[0-9]{9}/",$request->username)){
                    $data['message']="Its a mobile number.";
                    $ismobile=true;
                }else if(preg_match("/^[a-zA-Z0-9_@#*]{0,32}/",$request->username)){
                    $data['message']="Its an user id.";
                    $isuserid=true;
                }else{
                    $data['message']="Provided User id is not Valid.";
                    $data['status']=false;
                    echo json_encode($data);
                    exit();
                }
                if($isemail){
                    $where="emailid='$request->username' ";
                }else if($ismobile){
                    $where="mobile=$request->username ";
                }else if($isuserid){
                    $where="username='$request->username' ";
                }
                $where.=" and isactive=true and typeisactive=true and authisactive=true";
                $res=$this->Model_Db->select(4,null,$where);
                if($res!=false){
                    if(count($res)>1){
                        $data['message']="Duplicate userid exiests.";
                        $data['status']=false;
                    }else{
                        $data['message']="Userid found.";
                        $data['userid']=$res[0]->id;
                        $data['username']=$res[0]->name;
                        $data['usermobile']=$res[0]->mobile;
                        $data['userlogo']=$res[0]->logo;
                        $data['status']=true;
                        $this->session->set_userdata('tempuser',$data);
                    }
                }else{
                    $data['message']="No user found.";
                    $data['status']=false;
                }
                echo json_encode($data);
                exit();
            }else{
                $data['message']="No user name provided.";
                $data['status']=false;
                echo json_encode($data);
                exit();
            }
        }catch (Exception $e){
            $data['message']= "Message:".$e->getMessage();
            $data['status']=false;
            echo json_encode($data);
            exit();
        }
    }
    //To authenticate the password for the user.
    public function check_password(){
        try{
            $data=array();
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $request = json_decode(json_encode($_POST), FALSE);
            if(isset($request->userid) && is_numeric($request->userid)){
                if($request->userid==$this->session->tempuser['userid']){
                    if(isset($request->password) && $request->password!=null){
                        if(preg_match("/^[a-zA-Z0-9_@#*]{0,32}/",$request->password)){
                            $where="userid=$request->userid and password='$request->password' and isactive=true";
                            $res=$this->Model_Db->select(5,null,$where);
                            if($res!=false){
                                if(count($res)>1){
                                    $data['message']="Duplicate entries.";
                                    $data['status']=false;
                                    echo json_encode($data);
                                    exit();
                                }else{
                                    $data['message']="Password matched. Otp sent.";
                                    $data['status']=true;
                                    $data['userid']=$request->userid;
//                                    $otp=rand(324653,876532);
                                    $otp=123456;
                                    $mobile=$this->session->tempuser['usermobile'];
                                    $message="Your login otp is - ".$otp.". Please do not share this with any one.";
                                    $this->load->library("Sms");
                                    $this->sms->send($mobile,$message);
                                    echo json_encode($data);
                                    $data['otp']=$otp;
                                    $this->session->set_userdata('loginAtempt',$data);
                                    exit();
                                }
                            }else{
                                $data['message']="Wrong Password.";
                                $data['status']=false;
                                echo json_encode($data);
                                exit();
                            }
                        }else{
                            $data['message']="Wrong Password.";
                            $data['status']=false;
                            echo json_encode($data);
                            exit();
                        }
                    }else{
                        $data['message']="Bad request.";
                        $data['status']=false;
                        echo json_encode($data);
                        exit();
                    }
                }else{
                    $data['message']="Bad request.";
                    $data['status']=false;
                    echo json_encode($data);
                    exit();
                }
            }else{
                $data['message']="Wrong userid Provided.";
                $data['status']=false;
                echo json_encode($data);
                exit();
            }
        }catch (Exception $e){
            $data['message']= "Message:".$e->getMessage();
            $data['status']=false;
            $data['error']=true;
            echo json_encode($data);
            exit();
        }
    }
    public function verify_otp(){
	    try{
	        $data=array();
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $request = json_decode(json_encode($_POST), FALSE);
            /*echo $this->session->tempuser['userid'] ."<br>";
            echo $request->userid."<br>";
            echo $this->session->loginAtempt['userid']."<br>";
            echo $this->session->loginAtempt['otp']."<br>";
            echo $request->otp."<br>";*/
	        if(isset($request->otp) && is_numeric($request->otp) && isset($request->userid) && is_numeric($request->userid)){

	            if($this->session->tempuser['userid']==$request->userid && $this->session->tempuser['userid']==$this->session->loginAtempt['userid'] && $this->session->loginAtempt['otp']==$request->otp){
                    $data['message']="Login successful.";
                    $data['status']=true;
	                $data['userid']=null;
	                $data['usertypeid']=null;
	                $data['usertype']=null;
	                $data['username']=null;
	                $data['uname']=null;
	                $data['umobile']=null;
	                $data['umail']=null;
	                $data['udob']=null;
	                $data['ulogo']=null;
                    $this->session->unset_userdata(
                        array(
                            'tempuser',
                            'loginAtempt'
                        )
                    );
	                $where="id=$request->userid and isactive=true and authisactive=true";
	                $res=$this->Model_Db->select(4,null,$where);
	                if($res!=false){
	                    $data['userid']=$res[0]->id;
	                    $data['usertypeid']=$res[0]->usertypeid;
	                    $data['usertype']=$res[0]->typename;
	                    $data['username']=$res[0]->name;
	                    $data['uname']=$res[0]->username;
	                    $data['umobile']=$res[0]->mobile;
	                    $data['umail']=$res[0]->emailid;
	                    $data['udob']=$res[0]->dob;
	                    $data['ulogo']=$res[0]->logo;
                    }

                    $this->session->set_userdata('login',$data);
                }else{
                    $data['message']="Bad request.";
                    $data['status']=false;
                    echo json_encode($data);
                    exit();
                }
            }else{
                $data['message']="Wrong otp Provided.";
                $data['status']=false;
                echo json_encode($data);
                exit();
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
    public function logout(){
	    try{
	        $data=array();
            $this->session->sess_destroy();
            $data['message']="Logout successful.";
            $data['status']=true;
            echo json_encode($data);
            redirect("Welcome/");
            exit();
        }catch (Exception $e){
            $data['message']= "Message:".$e->getMessage();
            $data['status']=false;
            $data['error']=true;
            redirect("Welcome/");
            echo json_encode($data);
            exit();
        }
    }
}
