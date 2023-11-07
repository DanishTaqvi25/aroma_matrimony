<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$basepath = str_replace('site\system', '', BASEPATH);
require( $basepath.'vendor/php-in/Textlocal.class.php');
class Homecontrol extends CI_Controller {
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('home/home');
		$this->load->view('templates/footer');
	}
	
	public function sendsms(){
		$mobile = $this->input->post('mobile');
		$Textlocal = new Textlocal('team@igensoftware.com', '', 'NmQ2NzQxMzk0YzU4NTI0MzcwNTU3NTVhNmY2YzY2NjU=');
		$numbers = array($mobile);
		$digits = 5;
		$otp =  rand(pow(10, $digits-1), pow(10, $digits)-1);
		$message = 'OTP for Aroma Matrimony is '.$otp.' - Please make sure that you are keeping this confidential - Igen Software';
		$sender = 'IGENSS';
		$response = $Textlocal->sendSms($numbers, $message, $sender);
		//echo json_encode($response);
		print_r($otp);
		/*$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.zoone.in',
			'smtp_port' => 465,
			'smtp_user' => 'noreply@zoone.in',
			'smtp_pass' => 'xi6mS]Y.2C03',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");


		$this->email->from('noreply@zoone.in', 'Identification');
		$this->email->to('shyamappu00@example.com');
		$this->email->subject('Send Email Codeigniter');
		$this->email->message('The email send using codeigniter library');
		$result = $this->email->send();*/
		
	}
	

	
	public function logout(){
		$this->session->sess_destroy();
		$data = array("status" => 1, 'message' =>   '');
		echo json_encode($data);
	}
	
	public function login(){
		$login_email = $this->input->post('login_email');
		$login_password = $this->input->post('login_password');
		$result =  $this->Common_model->user_login($login_email,$login_password);
		if($result){
				$user = array(
					'uuid' => $result->profile_uuid,
					'name' => $result->profile_name
				);
				$this->session->set_userdata($user);
				$data = array("status" => 1,"result"=>$result); //success
		}else{
			$data = array("status" => 0,"result"=>$result); //success
		}
		
		echo json_encode($data);
	}
	
	public function success_stories(){
		$result = $this->Common_model->get_success_stories();
		echo json_encode($result);
	}
	
	public function active_profile(){
		$result = $this->Common_model->active_profile();
		echo json_encode($result);
	}


	 public function getallmother(){
		$result = $this->Common_model->getallactive('sm_mother', 'mother_isactive', 'mother_id', 'desc');
		echo json_encode($result);
	}

 	 public function getallreligion(){
		$result = $this->Common_model->getallactive('sm_religion', 'religion_isactive', 'religion_id', 'desc');
		echo json_encode($result);
	}

	function getallreligion_cast($id = 0){
		$result = $this->Common_model->getallactivebyid('sm_caste','caste_isactive', 'caste_religion', $id,'caste_id', 'desc');
		echo json_encode($result);
	}

	function getallreligion_sub($id = 0){
		$result = $this->Common_model->getallactivebyid('sm_sub_caste','sub_caste_isactive', 'sub_caste_parent', $id,'sub_caste_id', 'desc');
		echo json_encode($result);
	}


	public function getalldivision(){
		$result = $this->Common_model->getallactive('sm_division', 'division_isactive', 'division_id', 'desc');
		echo json_encode($result);
	}


	public function getallcountry(){
		$result = $this->Common_model->getallactive('sm_country', 'country_isactive', 'country_id', 'desc');
		echo json_encode($result);
	}

	function getallstate($id = 0){
		$result = $this->Common_model->getallactivebyid('sm_state','state_isactive', 'state_country', $id,'state_id', 'desc');
		echo json_encode($result);
	}

	function getalldistrict($id = 0){
		$result = $this->Common_model->getallactivebyid('sm_district','district_isactive', 'district_state', $id,'district_id', 'desc');
		echo json_encode($result);
	}

	public function getall_t_state(){
		$result = $this->Common_model->getallactive('sm_state', 'state_isactive', 'state_id', 'desc');
		echo json_encode($result);
	}

	public function getall_t_district(){
		$result = $this->Common_model->getallactive('sm_district', 'district_isactive', 'district_id', 'desc');
		echo json_encode($result);
	}

	public function getallcity(){
		$result = $this->Common_model->getallactive('sm_city', 'city_isactive', 'city_id', 'desc');
		echo json_encode($result);
	}

	public function getallcitizenship(){
		$result = $this->Common_model->getallactive('sm_citizenship', 'citizenship_isactive', 'citizenship_id', 'desc');
		echo json_encode($result);
	}
	
	public function getallhigheducation(){
		$result = $this->Common_model->getallactive('sm_highest_education', 'high_education_isactive', 'high_education_id', 'desc');
		echo json_encode($result);
	}


	public function getall_p_religion(){
		$result = $this->Common_model->getallactive('sm_religion', 'religion_isactive', 'religion_id', 'desc');
		echo json_encode($result);
	}

	function getall_p_religion_cast($id = 0){
		$result = $this->Common_model->getallactivebyid('sm_caste','caste_isactive', 'caste_religion', $id,'caste_id', 'desc');
		echo json_encode($result);
	}

	function getall_p_religion_sub($id = 0){
		$result = $this->Common_model->getallactivebyid('sm_sub_caste','sub_caste_isactive', 'sub_caste_parent', $id,'sub_caste_id', 'desc');
		echo json_encode($result);
	}


	public function getall_p_country(){
		$result = $this->Common_model->getallactive('sm_country', 'country_isactive', 'country_id', 'desc');
		echo json_encode($result);
	}

	function getall_p_state($id = 0){
		$result = $this->Common_model->getallactivebyid('sm_state','state_isactive', 'state_country', $id,'state_id', 'desc');
		echo json_encode($result);
	}

	function getall_p_district($id = 0){
		$result = $this->Common_model->getallactivebyid('sm_district','district_isactive', 'district_state', $id,'district_id', 'desc');
		echo json_encode($result);
	}

	public function getalloccupation(){
		$result = $this->Common_model->getallactive('sm_occupation', 'occupation_isactive', 'occupation_id', 'desc');
		echo json_encode($result);
	}

	public function UploadProfile(){
		$config['encrypt_name'] = TRUE;
		$config['upload_path']          = 'uploads/profile/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('profile_image')) {
			$data = array("status" => 0, 'error' =>  'Profile Image :  '. $this->upload->display_errors());
		
		} else {
			$file_name =  $this->upload->data()['file_name'];
			$data = array("status" => 1, "file_name"=>$file_name,'error' =>  'Profile Image :  '. $this->upload->display_errors());
		}
		echo json_encode($data);
		
	}

	public function save_profile(){

			$config['encrypt_name'] = TRUE;
			$config['upload_path']   = 'uploads/home/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
		
			//$id = $this->input->post('profile_id');
			$is_pro_image = false;

			//$pro_image = '';

			if (!$this->upload->do_upload('pro_image')) {

				
			} else {
			$is_pro_image = true;
			$pro_image =  $this->upload->data()['file_name'];
			}




		$data = array("profile_for" => $this->input->post('profile_for'), 
					  "profile_name" => $this->input->post('profile_name'),
					  "age" => $this->input->post('age'),
					  "height" => $this->input->post('height'),
					  "weight" => $this->input->post('weight'),
					  "physical" => $this->input->post('physical'),
					  "mother" => $this->input->post('mother'),
					  "marital" => $this->input->post('marital'),
					  "gender" => $this->input->post('gender'),
					  "email" => $this->input->post('email'),
					  "mobile" => $this->input->post('mobile'),
					  "otp" => $this->input->post('otp'),
					  "whatsapp" => $this->input->post('whatsapp'),
					  "address_1" => $this->input->post('address_1'),
					  "address_2" => $this->input->post('address_2'),
					  "city" => $this->input->post('t_city'),
					  "district" => $this->input->post('t_district'),
					  "state" => $this->input->post('t_state'),
					  "country" => $this->input->post('t_country'),
					  //"religion" => $this->input->post('religion'),
					 // "caste" => $this->input->post('sub_caste_parent'),
					 // "sub_caste" => $this->input->post('subcaste'),
					 // "division" => $this->input->post('division'),
					  //"religious_values" => $this->input->post('religious_values'),
					  //"baptism" => $this->input->post('baptism'),
					  //"ornaments" => $this->input->post('ornaments'),
					 // "present_country" => $this->input->post('country'),
					  //"present_state" => $this->input->post('state'),
					  //"present_city" => $this->input->post('district'),
					  //"citizenship" => $this->input->post('citizenship'),
					  "present_place" => $this->input->post('present_place'),
					  "permanent_place" => $this->input->post('permanent_place'),
					  "ancestral_origin" => $this->input->post('ancestral_origin'),
					  "place_birth" => $this->input->post('place_birth'),
					  //"family_status" => $this->input->post('family_status'),
					  "family_type" => $this->input->post('family_type'),
					  "father_name" => $this->input->post('father_name'),
					  "father_job" => $this->input->post('father_job'),
					  "mother_name" => $this->input->post('mother_name'),
					  "mother_job" => $this->input->post('mother_job'),
					  "no_of_brothers" => $this->input->post('no_of_brothers'),
					  "no_of_sisters" => $this->input->post('no_of_sisters'),
					  //"drinking_habit" => $this->input->post('drinking_habit'),
					  //"smoking_habit" => $this->input->post('smoking_habit'),
					  //"food_habit" => $this->input->post('food_habit'),
					  "about" => $this->input->post('about'),
					  "pro_image" => $this->input->post('pro_image'),
					 // "p_religion" => $this->input->post('p_religion'),
					  //"p_caste" => $this->input->post('p_sub_caste_parent'),
					 // "p_subcaste" => $this->input->post('p_subcaste'),
					  //"p_division" => $this->input->post('p_division'),
					 // "p_education" => $this->input->post('p_education'),
					 // "p_country" => $this->input->post('p_country'),
					 // "p_state" => $this->input->post('p_state'),
					  //"p_city" => $this->input->post('p_district'),
					  //"p_citizenship" => $this->input->post('p_citizenship'),
					 // "p_income" => $this->input->post('p_income'),
					  //"p_occupation" => $this->input->post('p_occupation'),
					 // "p_marital" => $this->input->post('p_marital'),
					  //"p_physical" => $this->input->post('p_physical')
					);
					
					 if($this->input->post('p_highest_education')) {
						$data['p_highest_education'] = $this->input->post('p_highest_education');
					   }
					   
					   if($this->input->post('denomination')) {
						$data['denomination'] = $this->input->post('denomination');
					   }
					   if($this->input->post('p_denomination')) {
						   $data['p_denomination'] = $this->input->post('p_denomination');
					   }
					   
					 if($this->input->post('p_employed_in')) {
						$data['p_employed_in'] = $this->input->post('p_employed_in');
					   }
					   
					    if($this->input->post('highest_education')) {
						$data['highest_education'] = $this->input->post('highest_education');
					   }
					 if($this->input->post('employed_in')) {
						$data['employed_in'] = $this->input->post('employed_in');
					   }
					   
					   

					 if($this->input->post('religion')) {
						$data['religion'] = $this->input->post('religion');
					   }
					 if($this->input->post('sub_caste_parent')) {
						$data['caste'] = $this->input->post('sub_caste_parent');
					   }
					  if($this->input->post('subcaste')) {
						$data['sub_caste'] = $this->input->post('subcaste');
					   }
					 if($this->input->post('division')) {
						$data['division'] = $this->input->post('division');
					   }   
					  if($this->input->post('religious_values')) {
						$data['religious_values'] = $this->input->post('religious_values');
					   }
					  if($this->input->post('baptism')) {
						$data['baptism'] = $this->input->post('baptism');
					   }
					 if($this->input->post('ornaments')) {
						$data['ornaments'] = $this->input->post('ornaments');
					   }    

					    if($this->input->post('country')) {
						$data['present_country'] = $this->input->post('country');
					   }
					 if($this->input->post('state')) {
						$data['present_state'] = $this->input->post('state');
					   }
					  if($this->input->post('district')) {
						$data['present_district'] = $this->input->post('district');
					   }

					   if($this->input->post('city')) {
						$data['present_city'] = $this->input->post('city');
					   }

					 if($this->input->post('citizenship')) {
						$data['citizenship'] = $this->input->post('citizenship');
					   }   
					  if($this->input->post('family_status')) {
						$data['family_status'] = $this->input->post('family_status');
					   }
					  if($this->input->post('drinking_habit')) {
						$data['drinking_habit'] = $this->input->post('drinking_habit');
					   }
					 if($this->input->post('smoking_habit')) {
						$data['smoking_habit'] = $this->input->post('smoking_habit');
					   }    

					    if($this->input->post('food_habit')) {
						$data['food_habit'] = $this->input->post('food_habit');
					   }
					 if($this->input->post('p_religion')) {
						$data['p_religion'] = $this->input->post('p_religion');
					   }
					  if($this->input->post('p_sub_caste_parent')) {
						$data['p_caste'] = $this->input->post('p_sub_caste_parent');
					   }
					 if($this->input->post('p_subcaste')) {
						$data['p_subcaste'] = $this->input->post('p_subcaste');
					   }   
					  if($this->input->post('p_division')) {
						$data['p_division'] = $this->input->post('p_division');
					   }
					  if($this->input->post('p_education')) {
						$data['p_education'] = $this->input->post('p_education');
					   }
					 if($this->input->post('p_country')) {
						$data['p_country'] = $this->input->post('p_country');
					   }    

					   if($this->input->post('p_state')) {
						$data['p_state'] = $this->input->post('p_state');
					   }
					 if($this->input->post('p_district')) {
						$data['p_district'] = $this->input->post('p_district');
					   }

					   if($this->input->post('p_city')) {
						$data['p_city'] = $this->input->post('p_city');
					   }

					  if($this->input->post('p_citizenship')) {
						$data['p_citizenship'] = $this->input->post('p_citizenship');
					   }
					 if($this->input->post('p_income')) {
						$data['p_income'] = $this->input->post('p_income');
					   }   
					  if($this->input->post('p_occupation')) {
						$data['p_occupation'] = $this->input->post('p_occupation');
					   }
					  if($this->input->post('p_marital')) {
						$data['p_marital'] = $this->input->post('p_marital');
					   }
					 if($this->input->post('p_physical')) {
						$data['p_physical'] = $this->input->post('p_physical');
					   }     




			if ($is_pro_image == true) {
				$data["pro_image"] = $pro_image;
			}



		$data['profile_uuid'] = $this->Common_model->gen_uuid(); 
		$profile_uuid = $data['profile_uuid'];
		$rtn = $this->Common_model->savebasicsData('client', $data);
		if ($rtn  == false) {
			$data = array("status" => 0, 'error' => 'Error in Save data');
			header('Content-Type: application/json');
			echo json_encode($data);
			exit();
		}
		if($this->input->post('cnt_profile_image')){
			$cnt_profile_image = $this->input->post('cnt_profile_image',true);
			$size = sizeof($cnt_profile_image);
			$cover =  $this->input->post('cover');
			for($i= 0;$i<$size;$i++){
				$cnt = $cnt_profile_image[$i];
				$product_image = $this->input->post('profile_image'.$cnt);
				$is_main = 0 ;
				if((int) $cover == (int) $cnt ){
					$is_main = 1;
				}

				$data = array("profile_uuid"=>$profile_uuid,"pro_image_uuid" => $this->Common_model->gen_uuid(),
							"pro_image" => $product_image, 
							"pro_image_ismain" => $is_main);

				$this->Common_model->savebasicsData('client_image', $data);			
			}
		}
		$data = array("status" => 1,"messsage"=>'Saved Successfully');
		echo json_encode($data);
		
	

}






}
