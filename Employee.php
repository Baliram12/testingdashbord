<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Employee extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Employeem');
    }
    
    public function index(){
        $data = array();
        
        //get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
     $data['employee'] = $this->Employeem->getRows();
      $data['name'] = 'Post Archive';
        
        //load the list page view
        $this->load->view('employees/index', $data);
       
    }
    
    /*
     * Post details
     */
    public function view($id){
        $data = array();
        
        //check whether post id is not empty
        if(!empty($id)){
            $data['employee'] = $this->Employeem->getRows($id);
            $data['name'] = $data['employee']['name'];
            
            //load the details page view
        $this->load->view('employee/header', $data);
        $this->load->view('employees/view', $data);
        $this->load->view('employee/footer');
        }else{
            redirect('/employees');
        }
    }
    
    /*
     * Add post content
     */
    public function add(){

        //load the add page view
        $this->load->view('employee/header');
        $this->load->view('employees/add-edit');
        $this->load->view('employee/footer');
    }

     public function savedata()
    {
        
        $n=$this->input->post('name');
        $l=$this->input->post('last');
        $e=$this->input->post('email');
        $d=$this->input->post('dob');
        $dept=$this->input->post('department');
        $con=$this->input->post('contact');
        $add=$this->input->post('address');
        $im=$this->input->post('image');
        $this->Employeem->saverecords($n,$l,$e,$d,$dept,$con,$add,$im);
        
  redirect('employee/add');
    }
    
    /*
     * Update post content
     */
    public function edit($id){
        $data = array();
        
        //get post data
        $postData = $this->Employeem->getRows($id);
        
        //if update request is submitted
        
            //form field validation rules
            if($this->input->post('postSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('name', 'First name', 'required');
            $this->form_validation->set_rules('last', 'Last name', 'required');
             $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
            
             $this->form_validation->set_rules('department', 'Department', 'required');
            $this->form_validation->set_rules('contact', 'Contact', 'required');
            
             $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('image', 'Image', 'required');
            
            
            //prepare post data
            $postData = array(
                'name' => $this->input->post('name'),
                'last' => $this->input->post('last'),
                 'email' => $this->input->post('email'),
                'dob' => $this->input->post('dob'),
                 'department' => $this->input->post('department'),
                'contact' => $this->input->post('contact'),
                 'address' => $this->input->post('address'),
                'image' => $this->input->post('image')
            );
           
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                //update post data
                $update = $this->Employeem->update($postData, $id);
                if($update){
                    $this->session->set_userdata('success_msg', 'Post has been updated successfully.');
                    redirect('/employees');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        $data['Employeem'] = $postData;
        $data['name'] = 'Update Post';
        $data['action'] = 'Edit';
        
        //load the edit page 
        $this->load->view('employee/header', $data);
        $this->load->view('employees/add-edit', $data);
        $this->load->view('employee/footer');
        
    }
        /*
     * Delete post data
     */
    public function delete($id){
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->Employeem->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Post has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        redirect('/employee');
    }
}