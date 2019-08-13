<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Forms extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function header(){
        try{
            $this->load->view('include/header');
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }

    }
    public function footer(){
        try{
            $this->load->view('include/footer');
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function sidebar(){
        try{
            $this->load->view('dashboard/sidebar');
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function navbar(){
        try{
            $this->load->view('include/navbar');
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function index(){
        try{
            $this->header();
//            $this->sidebar();
            $this->navbar();
            $this->load->view('dashboard/formDashboard');
            $this->footer();
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }

    }
    public function companyDashboard(){
    try{
        $this->header();
//        $this->sidebar();
        $this->navbar();
        $this->load->view('dashboard/companyDashboard');
        $this->footer();
    }catch (Exception $e){
        echo "Message:" .$e->getMessage();
    }
}
    public function loadCompanyType(){
        try{
            $this->header();
//            $this->sidebar();
            $this->navbar();
            $this->load->view('forms/formCompanyType');
            $this->footer();
        }catch (Exception $e){
            echo "Message:" .$e->getMessage();
        }
    }
    public function loadNewCompany(){
        try{
            $this->header();
//            $this->sidebar();
            $this->navbar();
            $this->load->view('forms/formNewCompany');
            $this->footer();
        }catch (Exception $e){
            echo "Message:" .$e->getMessage();
        }
    }
    public function loadDesignation(){
        try{
            $this->header();
//            $this->sidebar();
            $this->navbar();
            $this->load->view('forms/formDesignation');
            $this->footer();
        }catch (Exception $e){
            echo "Message:" .$e->getMessage();
        }
    }
    public function loadDepartment(){
        try{
            $this->header();
//            $this->sidebar();
            $this->navbar();
            $this->load->view('forms/formDepartment');
            $this->footer();
        }catch (Exception $e){
            echo "Message:" .$e->getMessage();
        }
    }

    public function formCompanyType(){
        try{
            $this->header();
//            $this->sidebar();
            $this->navbar();
            $this->load->view('forms/formCompanyType');
            $this->footer();
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }

    }
    public function formDistrict(){
        try{
            $this->header();
//            $this->sidebar();
            $this->navbar();
            $this->load->view('forms/formDistrict');
            $this->footer();
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }

    }
    public function formState(){
        try{
            $this->header();
//            $this->sidebar();
            $this->navbar();
            $this->load->view('forms/formState');
            $this->footer();
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }

    }
    public function formYear(){
        try{
            $this->header();
//            $this->sidebar();
            $this->navbar();
            $this->load->view('forms/formYear');
            $this->footer();
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }

    }
    public function formEducation(){
        try{
            $this->header();
//            $this->sidebar();
            $this->navbar();
            $this->load->view('forms/formEducation');
            $this->footer();
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }

    }
    public function employeeDashboard(){
        try{
            $this->header();
//            $this->sidebar();
            $this->navbar();
            $this->load->view('dashboard/employeeDashboard');
            $this->footer();
        }catch (Exception $e){
            echo "Message:" .$e->getMessage();
        }
    }
    public function formEmployeeType(){
        try{
            $this->header();
//            $this->sidebar();
            $this->navbar();
            $this->load->view('forms/formEmployeeType');
            $this->footer();
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }

    }
    public function formNewEmployee(){
        try{
            $this->header();
//            $this->sidebar();
            $this->navbar();
            $this->load->view('forms/formNewEmployee');
            $this->footer();
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formEmployeeBankDetails(){
        try{
            $this->header();
//            $this->sidebar();
            $this->navbar();
            $this->load->view('forms/formEmployeeBankDetails');
            $this->footer();
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function employeeAttendance(){
        try{
            $this->header();
//            $this->sidebar();
            $this->navbar();
            $this->load->view('forms/employeeAttendance');
            $this->footer();
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formBankDetails(){
        try{
            $this->header();
//            $this->sidebar();
            $this->navbar();
            $this->load->view('forms/formBankDetails');
            $this->footer();
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formMaritalStatus(){
        try{
            $this->header();
//            $this->sidebar();
            $this->navbar();
            $this->load->view('forms/formMaritalStatus');
            $this->footer();
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formGender(){
        try{
            $this->header();
//            $this->sidebar();
            $this->navbar();
            $this->load->view('forms/formGender');
            $this->footer();
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
}
