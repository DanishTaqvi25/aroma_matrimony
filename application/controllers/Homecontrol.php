<?php
	header('Access-Control-Allow-Origin: *');

defined('BASEPATH') OR exit('No direct script access allowed');
$basepath = str_replace('\system', '', BASEPATH);
//require( $basepath.'vendor/php-in/Textlocal.class.php');
class Homecontrol extends CI_Controller {
	public function index()
	{
		$ck = '';
		$cookie_name = 'cookie_aroma_user';
		if(!isset($_COOKIE[$cookie_name])) {
		} else {
			$ck = $_COOKIE[$cookie_name];
		}
		$qry = "select * from sm_baners where banner_isactive = 1";
		$res = $this->db->query($qry)->row_array();
		$data['banner'] = $res;
		$data['ck']=$ck;
		$this->load->view('templates/header');
		$this->load->view('home/home',$data);
		$this->load->view('templates/footer');
	}
	
	
	public function payment_status(){
		$mihpayid = $this->input->post('mihpayid');
		$status = $this->input->post('status');
		$txnid = $this->input->post('txnid');
		$data['paymentStatus'] = $status;
		if ($status == 'success') {
			$payment_details = $this->Common_model->getbyid('payment_details', 'pay_uuid', $txnid);
			$profile_uuid = $payment_details->pay_client;
			$package_uuid = $payment_details->pay_package;
			$amount = $payment_details->amount;
			$update_data = array(
				'client_package_status'=>0
			);
			$payment_data = array(
				'payment_status'=>'success',
				'transaction_id'=>$mihpayid
			);
			$this->db->where('pay_uuid',$txnid);
			$this->db->update('payment_details',$payment_data);
			$this->Common_model->updatedata($profile_uuid,'client_package',$update_data,'client_package_client');
			$qry = "select curdate() + interval package_no_of_days day as expiry_date,a.* from sm_package as a where package_uuid = '".$package_uuid."' ";
			$query = $this->db->query($qry)->row_array();
			$cp_data = array(
				'client_package_uuid'=>$this->Common_model->gen_uuid(),
				'client_package'=>$query['package_uuid'],
				'client_package_amount'=>$amount,
				'client_package_days'=>$query['package_no_of_days'],
				'client_package_viewable_profile'=>$query['package_no_of_profile'],
				'client_package_client'=>$profile_uuid,
				'client_package_expire_date'=>$query['expiry_date'],
				'client_package_viewed_profile'=>0,
				'client_package_status'=>1,
				'client_package_is_default'=>$query['package_is_default']
			);
			$this->Common_model->savebasicsData('client_package', $cp_data);	
		}
		$this->load->view('paymentstatus', $data);
	}
	
		public function payment($profile_uuid,$package_uuid,$amount)
	{
		$product_info = 'Aromamatrimony';
		$Profile = $this->Common_model->getbyid('client', 'profile_uuid', $profile_uuid);
		$customer_name = $Profile->profile_name;
		$customerEmail = $Profile->email;
		$customer_mobile =$Profile->mobile;
		$customer_address = $Profile->address_1;


		//payumoney details 
		$MERCHANT_KEY = "F3cUk3"; //change  merchant with yours
		$SALT = "5fHtq2h6iUsD358PtTl4pi1xMVXxdBuP";  //change salt with yours 
		$payment_details = array(
			'pay_uuid'=>$this->Common_model->gen_uuid(),
			'pay_package'=>$package_uuid,
			'pay_client'=>$profile_uuid,
			'amount'=>$amount
		);
		$this->db->insert('payment_details',$payment_details);
		$txnid = $payment_details['pay_uuid'];
		//optional udf values 
		$udf1 = '';
		$udf2 = '';
		$udf3 = '';
		$udf4 = '';
		$udf5 = '';
		
		$hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $product_info . '|' . $customer_name . '|' . $customerEmail . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $SALT;
		$hash = strtolower(hash('sha512', $hashstring));

		$success = base_url() . 'Homecontrol/payment_status';
		$fail = base_url() . 'Homecontrol/payment_status';
		$cancel = base_url() . 'Homecontrol/payment_status';
		$data = array(
			'mkey' => $MERCHANT_KEY,
			'tid' => $txnid,
			'hash' => $hash,
			'amount' => $amount,
			'name' => $customer_name,
			'productinfo' => $product_info,
			'mailid' => $customerEmail,
			'package_uuid'=>$package_uuid,
			'profile_uuid'=>$Profile->profile_uuid,
			'phoneno' => $customer_mobile,
			'address' => $customer_address,
			'action' => "https://secure.payu.in", //for live change action  https://secure.payu.in
			'sucess' => $success,
			'failure' => $fail,
			'cancel' => $cancel
		);
		$this->load->view('confirmation', $data);
	}
	
	
	public function verifyOtp($type = 'new'){
		$mobile = $this->input->post('mobile');
		$otp = $this->input->post('otp');
		if($type == 'new'){
			$qry = "select * from client_otp where client_otp_mobile = '".$mobile."' order by client_otp_id desc limit 0,1 ";
			$query = $this->db->query($qry);
			$status = 0 ;
			if($query->num_rows() > 0 ){
				$res = $query->row_array();
				if($res['client_otp'] == $otp ){
					$status = 1;
					$qry = "update client_otp set client_otp_status = 1 where client_otp_id = ".$res['client_otp_id']." "; 
					$this->db->query($qry);
				}
			}
			print( $status);
		}else{
		
		}
		
	}
public function testsms(){
	// Authorisation details.
	$username = "aromaservice9@gmail.com";
	$hash = "c8e7513992c9d52712094f90c68337ed199f415523818eab5b5e1a9b987e7614";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "AROMSR"; // This is who the message appears to be from.
	$numbers = "917019234286"; // A single number or a comma-seperated list of numbers
	$message = "OTP for Aroma Matrimony is 87668 - Please make sure that you are keeping this confidential - Aroma Services";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('https://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	echo "Here";
}
public function messagetoadmin(){

	$to = 'aromaservice9@gmail.com';
$subject = "Aroma Matrimony - Message to Admin";
$content = $this->input->post('message');
$name = $this->input->post('name');
$email = $this->input->post('email');
$message = "
<html>
<head>
<title>Aroma Matrimony - Message to Admin</title>
</head>
<body>
<img src='".base_url()."images/logo.png'>
<p><br />".$content."</p>
<br />

<br />
Wish You a happy successful Partner Search!<br />
Thank You,<br />
".$name."<br />
".$email."
</body>
</html>
";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: '.$email.'' . "\r\n";
    $headers .= 'BCc: reachigen@gmail.com' . "\r\n";

    mail($to,$subject,$message,$headers);
	header("Location:".base_url());
}
public function sendPassword($email,$mob,$password){
	$mobile = $mob;
    $otp = $password;
    //Send Email
    $to = $email;
$subject = "Aroma Matrimony - Password For Your Account";

$message = "
<html>
<head>
<title>Aroma Matrimony - Password For Your Account</title>
</head>
<body>
<img src='".base_url()."images/logo.png'>
<p><br />Thank You for registering with Aroma Matrimony! The place where believers find their life partners!  Your  Password for Login to Aroma Matrimony is</p>
<br />
<h1>".$otp."</h1>
<br />
Wish You a happy successful Partner Search!<br />
Thank You,<br />
Team Aroma
</body>
</html>
";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: Aroma Matrimony <webmaster@aromamatrimony.com>' . "\r\n";
    $headers .= 'BCc: reachigen@gmail.com' . "\r\n";

    mail($to,$subject,$message,$headers);
    
				$username = "aromaservice9@gmail.com";
				$hash = "c8e7513992c9d52712094f90c68337ed199f415523818eab5b5e1a9b987e7614";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
				$sender = "AROMSR"; // This is who the message appears to be from.
	$numbers = $mob; // A single number or a comma-seperated list of numbers
	$message = "Your Customer Password to Login to Aroma Matrimony is ".$otp." - Aroma Services";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	//$ch = curl_init('https://api.textlocal.in/send/?');

	//curl_setopt($ch, CURLOPT_POST, true);
	//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	//$result = curl_exec($ch); // This is the result from the API
	//curl_close($ch);

}
	
	public function sendsms(){
	    
		$mob = $this->input->post('mobile');
		$email = $this->input->post('email');
		$qry = "select * from client where mobile = '".$mob."' or  email = '".$email."' ";
		$query = $this->db->query($qry);
		if($query->num_rows() < 1){
		
		$mobile = $mob;
		$email = $this->input->post('email');
		$otp = rand(12345, 99999);
		$data = array(
				'client_otp_mobile'=>$mobile,
				'client_otp'=>$otp
	 	);
	 	$this->db->insert('client_otp',$data);
    
		//Send Email
		$to = $email;
		$subject = "Aroma Matrimony - OTP For Registration";

		$message = "
			<html>
			<head>
				<title>Aroma Matrimony - OTP For Registration</title>
			</head>
				<body>
				<img src='".base_url()."images/logo.png'>
				<p><br />Thank You for registering with Aroma Matrimony! The place where believers find their life partners!  The OTP for registration is</p>
			<br />
			<h1>".$otp."</h1>
		<br />
		Wish You a happy successful Partner Search!<br />
		Thank You,<br />
		Team Aroma
		</body>
		</html>
		";
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: Aroma Matrimony <webmaster@aromamatrimony.com>' . "\r\n";
		$headers .= 'BCc: reachigen@gmail.com' . "\r\n";

		mail($to,$subject,$message,$headers);
    
				$username = "aromaservice9@gmail.com";
				$hash = "c8e7513992c9d52712094f90c68337ed199f415523818eab5b5e1a9b987e7614";

		// Config variables. Consult http://api.textlocal.in/docs for more info.
		$test = "0";

		// Data for text message. This is the text message data.
				$sender = "AROMSR"; // This is who the message appears to be from.
		$numbers = $mob; // A single number or a comma-seperated list of numbers
		$message = "OTP for Aroma Matrimony is ".$otp." - Please make sure that you are keeping this confidential - Aroma Services";
		// 612 chars or less
		// A single number or a comma-seperated list of numbers
		$message = urlencode($message);
		$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
		$ch = curl_init('https://api.textlocal.in/send/?');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch); // This is the result from the API
		//print_r($result);
		curl_close($ch);
		$data = array("status" => 1,"message"=>"");
		
		}else{
			$res = $query->row_array();
			if($res['mobile'] ==  $mob ){
				$data = array("status" => 0,"message"=>"Mobile number Already Exist","type"=>"mob");
			}else{
				$data = array("status" => 0,"message"=>"Email Already Exist","type"=>"email");
			}
			if($res['mobile'] ==  $mob &&  $res['email'] ==  $email){
				$data = array("status" => 0,"message"=>"Email Already Exist","type"=>"both");
			}
		}
		echo json_encode($data);
	}
		public function sendsmsx(){
	    
		$mob = 8606465354;
	
		
		$mobile = $mob;
// 		$email = $this->input->post('email');
		$otp = rand(12345, 99999);
// 		$data = array(
// 				'client_otp_mobile'=>$mobile,
// 				'client_otp'=>$otp
// 	 	);
// 	 	$this->db->insert('client_otp',$data);
    
		//Send Email
		$to = 'livingwordindia@gmail.com';
		$subject = "Aroma Matrimony - OTP For Registration";

		$message = "
			<html>
			<head>
				<title>Aroma Matrimony - OTP For Registration</title>
			</head>
				<body>
				<img src='".base_url()."images/logo.png'>
				<p><br />Thank You for registering with Aroma Matrimony! The place where believers find their life partners!  The OTP for registration is</p>
			<br />
			<h1>".$otp."</h1>
		<br />
		Wish You a happy successful Partner Search!<br />
		Thank You,<br />
		Team Aroma
		</body>
		</html>
		";
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: Aroma Matrimony <webmaster@aromamatrimony.com>' . "\r\n";
		$headers .= 'BCc: reachigen@gmail.com' . "\r\n";

		mail($to,$subject,$message,$headers);
    
				$username = "aromaservice9@gmail.com";
				$hash = "c8e7513992c9d52712094f90c68337ed199f415523818eab5b5e1a9b987e7614";

		// Config variables. Consult http://api.textlocal.in/docs for more info.
		$test = "0";

		// Data for text message. This is the text message data.
				$sender = "AROMSR"; // This is who the message appears to be from.
		$numbers = $mob; // A single number or a comma-seperated list of numbers
		$message = "OTP for Aroma Matrimony is ".$otp." - Please make sure that you are keeping this confidential - Aroma Services";
		// 612 chars or less
		// A single number or a comma-seperated list of numbers
		$message = urlencode($message);
		$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
		$ch = curl_init('https://api.textlocal.in/send/?');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch); // This is the result from the API
		//print_r($result);
		curl_close($ch);
		$data = array("status" => 1,"message"=>"");

		echo json_encode($data);
	}
	
	 public function sendsms1(){
	 	$mobile = $this->input->post('mobile');
	// 	$Textlocal = new Textlocal('team@igensoftware.com', '', 'NmQ2NzQxMzk0YzU4NTI0MzcwNTU3NTVhNmY2YzY2NjU=');
	 	$numbers = array($mobile);
	 	$digits = 5;
	 	$otp =  rand(pow(10, $digits-1), pow(10, $digits)-1);
	 	$message = 'OTP for Aroma Matrimony is '.$otp.' - Please make sure that you are keeping this confidential - Igen Software';
	 	$sender = 'IGENSS';
	// 	//$response = $Textlocal->sendSms($numbers, $message, $sender);
	// 	//echo json_encode($response);
	 	$data = array(
	 		'client_otp_mobile'=>$mobile,
	 		'client_otp'=>$otp
	 	);
	 	$this->db->insert('client_otp',$data);
		print_r('Otp Send Successfully');
	// 	/*$config = Array(
	// 		'protocol' => 'smtp',
	// 		'smtp_host' => 'mail.zoone.in',
	// 		'smtp_port' => 465,
	// 		'smtp_user' => 'noreply@zoone.in',
	// 		'smtp_pass' => 'xi6mS]Y.2C03',
	// 		'mailtype' => 'html',
	// 		'charset' => 'iso-8859-1'
	// 		);
	// 		$this->load->library('email', $config);
	// 		$this->email->set_newline("\r\n");


	// 	$this->email->from('noreply@zoone.in', 'Identification');
	// 	$this->email->to('shyamappu00@example.com');
	// 	$this->email->subject('Send Email Codeigniter');
	// 	$this->email->message('The email send using codeigniter library');
	// 	$result = $this->email->send();*/
		
	 }
	

	
	public function logout(){
		$this->session->sess_destroy();
		$cookie_name='cookie_aroma_user';
		unset($_COOKIE[$cookie_name]);
		$cookie_value = '';
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/'); 
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
				$cookie_name = 'cookie_aroma_user';
				$cookie_value = $result->profile_uuid;
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');
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
		$result = $this->Common_model->getallactive('sm_mother', 'mother_isactive', 'mother_name', 'asc');
		echo json_encode($result);
	}

 	 public function getallreligion(){
		$result = $this->Common_model->getallactive('sm_religion', 'religion_isactive', 'religion_name', 'asc');
		echo json_encode($result);
	}

	function getallreligion_cast($id = 0){
		$result = $this->Common_model->getallactivebyid('sm_caste','caste_isactive', 'caste_religion', $id,'caste_name', 'asc');
		echo json_encode($result);
	}

	function getallreligion_sub($id = 0){
		$result = $this->Common_model->getallactivebyid('sm_sub_caste','sub_caste_isactive', 'sub_caste_parent', $id,'sub_caste_name', 'asc');
		echo json_encode($result);
	}


	public function getalldivision(){
		$result = $this->Common_model->getallactive('sm_division', 'division_isactive', 'division_name', 'asc');
		echo json_encode($result);
	}


	public function getallcountry(){
		$result = $this->Common_model->getallactive('sm_country', 'country_isactive', 'country_name', 'asc');
		echo json_encode($result);
	}

	function getallstate($id = 0){
		$result = $this->Common_model->getallactivebyid('sm_state','state_isactive', 'state_country', $id,'state_name', 'asc');
		echo json_encode($result);
	}

	function getalldistrict($id = 0){
		$result = $this->Common_model->getallactivebyid('sm_district','district_isactive', 'district_state', $id,'district_name', 'asc');
		echo json_encode($result);
	}

	public function getall_t_state(){
		$result = $this->Common_model->getallactive('sm_state', 'state_isactive', 'state_name', 'asc');
		echo json_encode($result);
	}

	public function getall_t_district(){
		$result = $this->Common_model->getallactive('sm_district', 'district_isactive', 'district_name', 'asc');
		echo json_encode($result);
	}

	public function getallcity(){
		$result = $this->Common_model->getallactive('sm_city', 'city_isactive', 'city_name', 'asc');
		echo json_encode($result);
	}

	public function getallcitizenship(){
		$result = $this->Common_model->getallactive('sm_citizenship', 'citizenship_isactive', 'citizenship_name', 'asc');
		echo json_encode($result);
	}
	
	public function getallhigheducation(){
		$result = $this->Common_model->getallactive('sm_highest_education', 'high_education_isactive', 'high_education_name', 'asc');
		echo json_encode($result);
	}


	public function getall_p_religion(){
		$result = $this->Common_model->getallactive('sm_religion', 'religion_isactive', 'religion_name', 'asc');
		echo json_encode($result);
	}

	function getall_p_religion_cast($id = 0){
		$result = $this->Common_model->getallactivebyid('sm_caste','caste_isactive', 'caste_religion', $id,'caste_name', 'asc');
		echo json_encode($result);
	}

	function getall_p_religion_sub($id = 0){
		$result = $this->Common_model->getallactivebyid('sm_sub_caste','sub_caste_isactive', 'sub_caste_parent', $id,'sub_caste_name', 'asc');
		echo json_encode($result);
	}


	public function getall_p_country(){
		$result = $this->Common_model->getallactive('sm_country', 'country_isactive', 'country_name', 'asc');
		echo json_encode($result);
	}

	function getall_p_state($id = 0){
		$result = $this->Common_model->getallactivebyid('sm_state','state_isactive', 'state_country', $id,'state_name', 'asc');
		echo json_encode($result);
	}

	function getall_p_district($id = 0){
		$result = $this->Common_model->getallactivebyid('sm_district','district_isactive', 'district_state', $id,'district_name', 'asc');
		echo json_encode($result);
	}

	public function getalloccupation(){
		$result = $this->Common_model->getallactive('sm_occupation', 'occupation_isactive', 'occupation_name', 'asc');
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


			$password = $this->input->post('password');

		$data = array("profile_for" => $this->input->post('profile_for'), 
					  "profile_name" => $this->input->post('profile_name'),
					  "age" => $this->input->post('age'),
					  "height" => $this->input->post('height'),
					  "weight" => $this->input->post('weight'),
					  "physical" => $this->input->post('physical'),
					  "mother" => $this->input->post('mother'),
					  "marital" => $this->input->post('marital'),
					  "gender" => $this->input->post('gender'),
					  "email" => strtolower($this->input->post('email')),
					  "mobile" => $this->input->post('mobile'),
					  "otp" => $this->input->post('otp'),
					  "whatsapp" => $this->input->post('whatsapp'),
					  "address_1" => $this->input->post('address_1'),
					  "address_2" => $this->input->post('address_2'),
					 // "city" => $this->input->post('t_city'),
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
					  "known_language" => $this->input->post('known_language'),
					  "present_place" => $this->input->post('present_place'),
					  "permanent_place" => $this->input->post('permanent_place'),
					  "ancestral_origin" => $this->input->post('ancestral_origin'),
					  "dob" => $this->Common_model->getDate($this->input->post('dob')),
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
					  "income" => $this->input->post('income'),
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
					
					 if($this->input->post('t_city')) {
						$data['city'] = $this->input->post('t_city');
					   }else{
						$data['city'] = '';
					   }
					   
					   
					 if($this->input->post('p_highest_education')) {
						$data['p_highest_education'] = $this->input->post('p_highest_education');
					   }else{
						$data['p_highest_education'] = '';
					   }
					   
					   if($this->input->post('denomination')) {
						$data['denomination'] = $this->input->post('denomination');
					   }else{
						$data['denomination'] = '';
					   }
					   if($this->input->post('p_denomination')) {
						   $data['p_denomination'] = $this->input->post('p_denomination');
					   }else{
						$data['p_denomination'] = '';
					   }
					   
					 if($this->input->post('p_employed_in')) {
						$data['p_employed_in'] = $this->input->post('p_employed_in');
					   }else{
						$data['p_employed_in'] = '';
					   }
					   
					    if($this->input->post('highest_education')) {
						$data['highest_education'] = $this->input->post('highest_education');
					   }else{
						$data['highest_education'] = '';
					   }
					 if($this->input->post('employed_in')) {
						$data['employed_in'] = $this->input->post('employed_in');
					   }else{
						$data['employed_in'] = '';
					   }
					   
					   if($this->input->post('occupation')) {
							$data['occupation'] = $this->input->post('occupation');
					   }else{
						$data['occupation'] = '';
					   }
					   
					   

					 if($this->input->post('religion')) {
						$data['religion'] = $this->input->post('religion');
					   }else{
						$data['religion'] = '';
					   }
					   
					   
					 if($this->input->post('sub_caste_parent')) {
						$data['caste'] = $this->input->post('sub_caste_parent');
					   }else{
						$data['caste'] = '';
					   }
					   
					  if($this->input->post('subcaste')) {
						$data['sub_caste'] = $this->input->post('subcaste');
					   }else{
						$data['sub_caste'] = '';
					   }
					   
					 if($this->input->post('division')) {
						$data['division'] = $this->input->post('division');
					   }   else{
						$data['division'] = '';
					   }
					   
					  if($this->input->post('religious_values')) {
						$data['religious_values'] = $this->input->post('religious_values');
					   } else{
						$data['religious_values'] = '';
					   }
					   
					  if($this->input->post('baptism')) {
						$data['baptism'] = $this->input->post('baptism');
					   }else{
						$data['baptism'] = '';
					   }
					   
					 if($this->input->post('ornaments')) {
						$data['ornaments'] = $this->input->post('ornaments');
					   }else{
						$data['ornaments'] = '';
					   }
					      

					    if($this->input->post('country')) {
						$data['present_country'] = $this->input->post('country');
					   }else{
						$data['present_country'] = '';
					   }
					      

					 if($this->input->post('state')) {
						$data['present_state'] = $this->input->post('state');
					   }else{
						$data['present_state'] = '';
					   }
					      

					  if($this->input->post('district')) {
						$data['present_district'] = $this->input->post('district');
					   }else{
						$data['present_district'] = '';
					   }
					      


					   if($this->input->post('city')) {
						$data['present_city'] = $this->input->post('city');
					   }else{
						$data['present_city'] = '';
					   }
					      


					 if($this->input->post('citizenship')) {
						$data['citizenship'] = $this->input->post('citizenship');
					   }   else{
						$data['citizenship'] = '';
					   }
					      
					  if($this->input->post('family_status')) {
						$data['family_status'] = $this->input->post('family_status');
					   } else{
						$data['family_status'] = '';
					   }
					      
					  if($this->input->post('drinking_habit')) {
						$data['drinking_habit'] = $this->input->post('drinking_habit');
					   }else{
						$data['drinking_habit'] = '';
					   }
					      
					 if($this->input->post('smoking_habit')) {
						$data['smoking_habit'] = $this->input->post('smoking_habit');
					   }    else{
						$data['smoking_habit'] = '';
					   }
					      

					    if($this->input->post('food_habit')) {
						$data['food_habit'] = $this->input->post('food_habit');
					   } else{
						$data['food_habit'] = '';
					   }
					      

					 if($this->input->post('p_religion')) {
						$data['p_religion'] = $this->input->post('p_religion');
					   }else{
						$data['p_religion'] = '';
					   }
					      
					  if($this->input->post('p_sub_caste_parent')) {
						$data['p_caste'] = $this->input->post('p_sub_caste_parent');
					   }else{
						$data['p_caste'] = '';
					   }
					      
					 if($this->input->post('p_subcaste')) {
						$data['p_subcaste'] = $this->input->post('p_subcaste');
					   }  else{
						$data['p_subcaste'] = '';
					   }
					       
					  if($this->input->post('p_division')) {
						$data['p_division'] = $this->input->post('p_division');
					   } else{
						$data['p_division'] = '';
					   }
					       
					  if($this->input->post('p_education')) {
						$data['p_education'] = $this->input->post('p_education');
					   } else{
						$data['p_education'] = '';
					   }
					       
					 if($this->input->post('p_country')) {
						$data['p_country'] = $this->input->post('p_country');
					   }     else{
						$data['p_country'] = '';
					   }
					       

					   if($this->input->post('p_state')) {
						$data['p_state'] = $this->input->post('p_state');
					   }else{
						$data['p_state'] = '';
					   }
					       
					 if($this->input->post('p_district')) {
						$data['p_district'] = $this->input->post('p_district');
					   }else{
						$data['p_district'] = '';
					   }

					   if($this->input->post('p_city')) {
						$data['p_city'] = $this->input->post('p_city');
					   }else{
						$data['p_city'] = '';
					   }

					  if($this->input->post('p_citizenship')) {
						$data['p_citizenship'] = $this->input->post('p_citizenship');
					   }else{
						$data['p_citizenship'] = '';
					   }

					 if($this->input->post('p_income')) {
						$data['p_income'] = $this->input->post('p_income');
					   }   else{
						$data['p_income'] = '';
					   }

					  if($this->input->post('p_occupation')) {
						$data['p_occupation'] = $this->input->post('p_occupation');
					   }else{
						$data['p_occupation'] = '';
					   }

					  if($this->input->post('p_marital')) {
						$data['p_marital'] = $this->input->post('p_marital');
					   }else{
						$data['p_marital'] = '';
					   }
					 if($this->input->post('p_physical')) {
						$data['p_physical'] = $this->input->post('p_physical');
					   }   else{
						$data['p_physical'] = '';
					   }  




			if ($is_pro_image == true) {
				$data["pro_image"] = $pro_image;
			}


		$profile_id = $this->input->post('profile_id');
		if(is_numeric($profile_id)){
			$profile_id = '';
		}
		if($profile_id  == ''){
			$data['profile_uuid'] = $this->Common_model->gen_uuid(); 
			$profile_uuid = $data['profile_uuid'];
			$seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789!@#$%^&*'); // and any other characters
			shuffle($seed); // probably optional since array_is randomized; this may be redundant
			$rand = '';
			foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];
			$rand = $password;
			$data['profile_password'] = $rand;
			$rtn = $this->Common_model->savebasicsData('client', $data);
			$this->Common_model->addRegisterNo($rtn);
			$this->sendPassword($data['email'],$data['mobile'],$rand);
		}else{
			$rtn = $this->Common_model->updatedata($profile_id,'client',$data,'profile_uuid');
			$profile_uuid = $profile_id;
		}
		if ($rtn  == false) {
			$data = array("status" => 0, 'error' => 'Error in Save data');
			header('Content-Type: application/json');
			echo json_encode($data);
			exit();
		}
		$updatedata = array(
			"pro_image_isactive"=>0
		);
		$this->Common_model->updatedata($profile_id,'client_image',$updatedata,'profile_uuid');
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
		$qry = "select curdate() + interval package_no_of_days day as expiry_date,a.* from sm_package as a where package_is_default = '1' ";
		$query = $this->db->query($qry)->row_array();
		$cp_data = array(
			'client_package_uuid'=>$this->Common_model->gen_uuid(),
			'client_package'=>$query['package_uuid'],
			'client_package_amount'=>$query['package_amount'],
			'client_package_days'=>$query['package_no_of_days'],
			'client_package_viewable_profile'=>$query['package_no_of_profile'],
			'client_package_client'=>$profile_uuid,
			'client_package_expire_date'=>$query['expiry_date'],
			'client_package_viewed_profile'=>0,
			'client_package_status'=>1
		);
		$this->Common_model->savebasicsData('client_package', $cp_data);			
		$data = array("status" => 1,"messsage"=>'Saved Successfully');
		echo json_encode($data);
		
	

}






}
