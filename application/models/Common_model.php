<?php

class Common_model extends CI_Model

{
    function __construct()
    {
        parent::__construct();
    }
	
	function ProfileIntrest($type){
		$profile_uuid = $this->session->userdata('uuid');	
		$req_text = 'profile_uuid';
		if(isset($profile_uuid) ){
			$req_text = $profile_uuid;
		}
		if($type == 'received' ){
			$qry = "SELECT '".$profile_uuid."' as p_uuid,IFNULL(high_education_name,'') as high_education_name,occupation,case when client_request_status is null then 0 else 1 end as reqstatus,req.*,a.profile_uuid,religion_name,caste_name,state_name,country.country_name,a.profile_name,a.age,c.mother_name,image.pro_image from client as a INNER join (select * from client_image as b GROUP by b.profile_uuid ) as image on image.profile_uuid = a.profile_uuid LEFT join sm_mother as c on c.mother_uuid = a.mother left JOIN sm_country as country on country.country_uuid = a.country left JOIN sm_state on state_uuid = a.state left JOIN sm_caste as caste on caste.caste_uuid = a.caste left JOIN sm_religion as rel on rel.religion_uuid = a.religion inner join (SELECT client_request_uuid,client_request_from,client_request_to,CASE WHEN client_request_status = 'created' then 'pending' else client_request_status end as client_request_status FROM `client_request` as a WHERE client_request_to = '".$req_text."' ) as req on req.client_request_from = a.profile_uuid or req.client_request_to = a.profile_uuid  left join sm_highest_education as he on he.high_education_uuid = a.highest_education where 1 and a.profile_uuid != '".$req_text."'";
		}else{
			$qry = "SELECT '".$profile_uuid."' as p_uuid,IFNULL(high_education_name,'') as high_education_name,occupation,case when client_request_status is null then 0 else 1 end as reqstatus,req.*,a.profile_uuid,religion_name,caste_name,state_name,country.country_name,a.profile_name,a.age,c.mother_name,image.pro_image from client as a INNER join (select * from client_image as b GROUP by b.profile_uuid ) as image on image.profile_uuid = a.profile_uuid LEFT join sm_mother as c on c.mother_uuid = a.mother left JOIN sm_country as country on country.country_uuid = a.country left JOIN sm_state on state_uuid = a.state left JOIN sm_caste as caste on caste.caste_uuid = a.caste left JOIN sm_religion as rel on rel.religion_uuid = a.religion inner join (SELECT client_request_uuid,client_request_from,client_request_to,CASE WHEN client_request_status = 'created' then 'pending' else client_request_status end as client_request_status FROM `client_request` as a WHERE client_request_from = '".$req_text."') as req on req.client_request_from = a.profile_uuid or req.client_request_to = a.profile_uuid  left join sm_highest_education as he on he.high_education_uuid = a.highest_education where 1 and a.profile_uuid != '".$req_text."'";
		}
		
		$query = $this->db->query($qry);
		
        return $query->result_array();

	}
	
	function getmemberBydetail($reset_media){
		$qry = "select * from client where mobile = '".$reset_media."' or email = '".$reset_media."' ";
		$res = $this->db->query($qry);
		return $res;
	}
	
	function getDate($date, $sep = '') {
        if ($date == "") {
            return;
        }
        if ($sep == '') {
            $sep = '/';
        }
        $parts = explode($sep, $date);
        return "$parts[2]-$parts[1]-$parts[0]";
    }
	
	function getmember($table, $wherevar, $value){
        $this->db->select('a.*,DATE_FORMAT(dob, "%d/%m/%Y" ) as in_date');
        $this->db->from($table .' as a ');
        $this->db->where($wherevar, $value);
        $query = $this->db->get();
        return $query->result();
    }

	
	function get_client_request($client_request_from,$client_request_to,$client_request_uuid,$client_request_status){
		$uuid = '';
		$data = array(
			'client_request_to'=>$client_request_to,
			'client_request_from'=>$client_request_from,
			'client_request_status'=>$client_request_status
		);
		if($client_request_uuid == ''||  $client_request_uuid  == 0){
			$this->db->where('client_request_to',$client_request_to);
			$this->db->where('client_request_from',$client_request_from);
			$this->db->join('client as b ','a.client_request_from = b.profile_uuid and a.client_request_status in ("created","accepted","pending")','INNER');
			$query = $this->db->get('client_request as a');
			
			if($query->num_rows() > 0 ){
				$query = $query->result();
				$uuid = $query[0]->client_request_uuid;
				if($client_request_status != 'created'){
					$data_update = array(
						'client_request_status'=>$client_request_status
					);
					$data['client_request_update_date'] = date("Y-m-d");
					$this->db->where('client_request_uuid',$uuid);
					$this->db->update('client_request',$data);
				}
			}else{
				$this->db->where('client_request_from',$client_request_to);
				$this->db->where('client_request_to',$client_request_from);
				$this->db->join('client as b ','a.client_request_from = b.profile_uuid and a.client_request_status in ("created","accepted","pending")','INNER');
				$query = $this->db->get('client_request as a');
				if($client_request_status == 'created' && $query->num_rows() < 1 ){
					$data['client_request_uuid'] = $this->gen_uuid();
					$data['client_request_date'] = date("Y-m-d");
					$uuid = $data['client_request_uuid'] ;
					$this->db->insert('client_request',$data);
				}
			}
		}else{
			$data['client_request_update_date'] = date("Y-m-d");
			$this->db->where('client_request_uuid',$client_request_uuid);
			$this->db->update('client_request',$data);
			$uuid = $client_request_uuid;
		}
		$data['client_request_update_date'] = date("Y-m-d");
		$this->db->where('client_request_uuid',$uuid);
		$query = $this->db->get('client_request');
        return $query->result();
	}

    function gen_uuid() {
		return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			// 32 bits for "time_low"
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

			// 16 bits for "time_mid"
			mt_rand( 0, 0xffff ),

			// 16 bits for "time_hi_and_version",
			// four most significant bits holds version number 4
			mt_rand( 0, 0x0fff ) | 0x4000,

			// 16 bits, 8 bits for "clk_seq_hi_res",
			// 8 bits for "clk_seq_low",
			// two most significant bits holds zero and one for variant DCE1.1
			mt_rand( 0, 0x3fff ) | 0x8000,

			// 48 bits for "node"
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
		);
    }
    
	function profile_partner_details($uuid){
		$this->db->select('citizenship_name,division_name,district.district_name,occupation_name,country_name,state_name,caste_name,sub_caste_name,religion.religion_name as religion_name,a.*');
        $this->db->join('sm_religion as religion','religion.religion_uuid = a.p_religion','LEFT');
        $this->db->join('sm_sub_caste as sub','sub.sub_caste_uuid = a.p_subcaste','LEFT');
        $this->db->join('sm_caste as b','b.caste_uuid = a.p_caste','LEFT');
		$this->db->join('sm_country as pcountry','pcountry.country_uuid = a.p_country','LEFT');
		$this->db->join('sm_citizenship as citizenship','citizenship.citizenship_uuid = a.p_citizenship','LEFT');
        $this->db->join('sm_division as division','division.division_uuid = a.p_division','LEFT');
        $this->db->join('sm_state as pstate','pstate.state_uuid = a.p_state','LEFT');
        $this->db->join('sm_occupation as occupation','occupation.occupation_uuid = a.p_occupation','LEFT');
        $this->db->join('sm_district as district','district.district_uuid = a.p_city','LEFT');
		$this->db->from('client as a ' );
        $this->db->where('profile_uuid', $uuid);
        $this->db->order_by('profile_id', 'desc');
        $query = $this->db->get();
        return $query->result();
	}
	 function profile_details($uuid){
        $this->db->select('DATE_FORMAT(dob, "%d/%m/%Y" ) as dateofbirth,IFNULL(occupation_name,"") as occupation_name,he.high_education_name,division.division_name,sub.sub_caste_name,religion.religion_name as religion_name,pstate.state_name as present_state_name,IFNULL(pcountry.country_name,"" ) as present_country_name,d.religion_name,c.mother_name as mothertongue,b.caste_name,a.*');
        $this->db->join('sm_caste as b','b.caste_uuid = a.caste','LEFT');
        $this->db->join('sm_division as division','division.division_uuid = a.division','LEFT');
        $this->db->join('sm_sub_caste as sub','sub.sub_caste_uuid = a.sub_caste','LEFT');
        $this->db->join('sm_religion as religion','religion.religion_uuid = a.religion','LEFT');
        $this->db->join('sm_mother as c','c.mother_uuid = a.mother','LEFT');
        $this->db->join('sm_religion as d','d.religion_uuid = a.religion','LEFT');
        $this->db->join('sm_country as pcountry','pcountry.country_uuid = a.present_country','LEFT');
        $this->db->join('sm_state as pstate','pstate.state_uuid = a.present_state','LEFT');
        $this->db->join('sm_highest_education as he','he.high_education_uuid = a.highest_education','LEFT');
        $this->db->join('sm_occupation  as so','so.occupation_uuid = a.occupation','LEFT');
        $this->db->from('client as a ' );
        $this->db->where('profile_uuid', $uuid);
        $this->db->order_by('profile_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
	
	
    public function getmother(){
        $sm_mother = $this->db->get('sm_mother')->result_array();
        return $sm_mother;
    }
    
    public function insert($table, $data){
       // Inserting into your table
        $this->db->insert($table, $data);
        return true;
    }
    public function update($table, $data, $id, $prime){
        // Inserting into your table
         $this->db->set($data);
         $this->db->where($prime, $id);
         
         $this->db->update($table);
         return true;
     }
    public function delete($table, $id, $primaryid){
        $this->db->where($primaryid, $id);
        $this->db->delete($table);
        return true;
    }
    function getallactive($table, $actvar, $orderby, $ascdes){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($actvar, 1);
        $this->db->order_by($orderby, $ascdes);
        $query = $this->db->get();
        return $query->result();
    }
	
	
	public function update_client_views_copy($uuid,$type = 'view',$sharedId){
		$logged_profile_uuid = $this->session->userdata('uuid');
		$package = $this->getActivePackage($logged_profile_uuid);
		
		if((float)$package[0]->cnt > 0 ){
			if((float) $package[0]->no_date < 0  ){
			//	$qry = "select * from client_views where client_id	= '".$logged_profile_uuid."' and client_package = '".$package[0]->client_package_uuid."' and viewed_profile_id = '".$uuid."' ";
				$qry = "select * from client_views where client_id	= '".$logged_profile_uuid."'  and viewed_profile_id = '".$uuid."' ";
				$query = $this->db->query($qry);
				if($query->num_rows() > 0 ){
					$data = array(
							'client_id'=>$logged_profile_uuid,
							'client_package'=>$package[0]->client_package_uuid,
							'viewed_profile_id'=>$uuid,
							'client_views_type'=>$type,
							'client_views_shared_id'=>$sharedId
						);
						$this->db->insert('client_views',$data);
					return 1;
				}else{
					return 0;
				}
			}else{
				//$qry = "select * from client_views where client_id	= '".$logged_profile_uuid."' and client_package = '".$package[0]->client_package_uuid."' and viewed_profile_id = '".$uuid."' ";
				$qry = "select * from client_views where client_id	= '".$logged_profile_uuid."'  and viewed_profile_id = '".$uuid."' ";
				$query = $this->db->query($qry);
				if($query->num_rows() > 0 ){
					$data = array(
							'client_id'=>$logged_profile_uuid,
							'client_package'=>$package[0]->client_package_uuid,
							'viewed_profile_id'=>$uuid,
							'client_views_type'=>$type,
							'client_views_shared_id'=>$sharedId
						);
						$this->db->insert('client_views',$data);
					return 1;
				}else{
					if((float)$package[0]->client_package_viewable_profile > (float)$package[0]->client_package_viewed_profile ){
						$data = array(
							'client_id'=>$logged_profile_uuid,
							'client_package'=>$package[0]->client_package_uuid,
							'viewed_profile_id'=>$uuid,
							'client_views_type'=>$type,
							'client_views_shared_id'=>$sharedId
						);
						$this->db->insert('client_views',$data);
						$qry = "update client_package set client_package_viewed_profile = client_package_viewed_profile + 1 where client_package_uuid = '".$package[0]->client_package_uuid."'";
						$this->db->query($qry);
						return 1;
					}else{
						return 0;
					}
				}
			}
		}else{
			$qry = "select * from client_views where client_id	= '".$logged_profile_uuid."' and client_package = '".$package[0]->client_package_uuid."' and viewed_profile_id = '".$uuid."' ";
				$qry = "select * from client_views where client_id	= '".$logged_profile_uuid."'  and viewed_profile_id = '".$uuid."' ";
				$query = $this->db->query($qry);
				if($query->num_rows() > 0 ){
					$query = $query->row_array();
					$data = array(
							'client_id'=>$logged_profile_uuid,
							'client_package'=>$query['client_package'],
							'viewed_profile_id'=>$uuid,
							'client_views_type'=>$type,
							'client_views_shared_id'=>$sharedId
						);
						$this->db->insert('client_views',$data);
					return 1;
				}else{
					return 0;
				}
		}
	}
	
	public function update_client_views($uuid,$type = 'view',$sharedId,$is_update = 0 ){
		$logged_profile_uuid = $this->session->userdata('uuid');
		$package = $this->getActivePackage($logged_profile_uuid);
		
		if((float)$package[0]->cnt > 0 ){
			if((float) $package[0]->no_date < 0  ){
				//$qry = "select * from client_views where client_id	= '".$logged_profile_uuid."' and client_package = '".$package[0]->client_package_uuid."' and viewed_profile_id = '".$uuid."' ";
				$qry = "select * from client_views where client_id	= '".$logged_profile_uuid."'  and viewed_profile_id = '".$uuid."' ";
				$query = $this->db->query($qry);
				if($query->num_rows() > 0 ){
					$data = array(
							'client_id'=>$logged_profile_uuid,
							'client_package'=>$package[0]->client_package_uuid,
							'viewed_profile_id'=>$uuid,
							'client_views_type'=>$type,
							'client_views_shared_id'=>$sharedId
						);
						if($is_update > 0 ){
							$this->db->insert('client_views',$data);
						}
					return 1;
				}else{
					return 0;
				}
			}else{
				//$qry = "select * from client_views where client_id	= '".$logged_profile_uuid."' and client_package = '".$package[0]->client_package_uuid."' and viewed_profile_id = '".$uuid."' ";
				$qry = "select * from client_views where client_id	= '".$logged_profile_uuid."'  and viewed_profile_id = '".$uuid."' ";
				$query = $this->db->query($qry);
				if($query->num_rows() > 0 ){
					$data = array(
							'client_id'=>$logged_profile_uuid,
							'client_package'=>$package[0]->client_package_uuid,
							'viewed_profile_id'=>$uuid,
							'client_views_type'=>$type,
							'client_views_shared_id'=>$sharedId
						);
						if($is_update > 0 ){
							$this->db->insert('client_views',$data);
						}
					return 1;
				}else{
					if((float)$package[0]->client_package_viewable_profile > (float)$package[0]->client_package_viewed_profile ){
						$data = array(
							'client_id'=>$logged_profile_uuid,
							'client_package'=>$package[0]->client_package_uuid,
							'viewed_profile_id'=>$uuid,
							'client_views_type'=>$type,
							'client_views_shared_id'=>$sharedId
						);
						if($is_update > 0 ){
							$this->db->insert('client_views',$data);
							$qry = "update client_package set client_package_viewed_profile = client_package_viewed_profile + 1 where client_package_uuid = '".$package[0]->client_package_uuid."'";
							$this->db->query($qry);
						}
						return 1;
					}else{
						return 0;
					}
				}
			}
		}else{
				//$qry = "select * from client_views where client_id	= '".$logged_profile_uuid."' and client_package = '".$package[0]->client_package_uuid."' and viewed_profile_id = '".$uuid."' ";
				$qry = "select * from client_views where client_id	= '".$logged_profile_uuid."'  and viewed_profile_id = '".$uuid."' ";
				$query = $this->db->query($qry);
				if($query->num_rows() > 0 ){
					$query = $query->row_array();
					$data = array(
							'client_id'=>$logged_profile_uuid,
							'client_package'=>$query['client_package'],
							'viewed_profile_id'=>$uuid,
							'client_views_type'=>$type,
							'client_views_shared_id'=>$sharedId
						);
						$this->db->insert('client_views',$data);
					return 1;
				}else{
					return 0;
				}
		}
	}
	
	public function getActivePackage($profile_uuid){
		 $this->db->select('DATEDIFF( client_package_expire_date,CURDATE() ) as no_date ,count(client_package_viewed_profile) as cnt,a.*,CASE WHEN CURDATE() > client_package_expire_date or client_package_viewed_profile >= client_package_viewable_profile then 1 else 0 end as is_upgrade');
		 $this->db->from('client_package as a ');
		 $this->db->where('client_package_client', $profile_uuid);
		 $this->db->where('client_package_status', 1);
		 $query = $this->db->get();
		 return $query->result();
	}
	
	
	function getallactive_package($table, $actvar, $orderby, $ascdes){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($actvar, 1);
        $this->db->order_by($orderby, $ascdes);
        $query = $this->db->get();
        return $query->result();
    }
	
    function getparentnavs($table, $actvar, $orderby, $ascdes){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($actvar, 1);
        $this->db->where('navParent', 0);
        $this->db->order_by($orderby, $ascdes);
        $query = $this->db->get();
        return $query->result();
    }
    function getall($table, $orderby, $ascdes){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($orderby, $ascdes);
        $query = $this->db->get();
        return $query->result();
    }
	
	function getactivedistricts(){
		$this->db->select('a.*,b.country_name,c.state_name');
		$this->db->join('sm_country as b','b.country_uuid = a.district_country','INNER');
		$this->db->join('sm_state as c','c.state_uuid = a.district_state','INNER');
		$this->db->where('district_isactive', 1);
		$this->db->order_by('district_id', 'desc');
		$this->db->from('sm_district as a');
		$query = $this->db->get();
        return $query->result();
	}
	
	function getactivesubcaste(){
		$this->db->select('a.*,b.caste_name,c.religion_name');
		$this->db->join('sm_caste as b','b.caste_uuid = a.sub_caste_parent','INNER');
		$this->db->join('sm_religion as c','c.religion_uuid = a.sub_caste_religion','INNER');
		$this->db->where('sub_caste_isactive', 1);
		$this->db->order_by('sub_caste_id', 'desc');
		$this->db->from('sm_sub_caste as a');
		$query = $this->db->get();
        return $query->result();
	}
	
	function getactivestate(){
		$this->db->select('a.*,b.country_name');
		 $this->db->join('sm_country as b','b.country_uuid = a.state_country','INNER');
		 $this->db->where('state_isactive', 1);
        $this->db->order_by('state_id', 'desc');
		 $this->db->from('sm_state as a');
		 $query = $this->db->get();
        return $query->result();
	}
	function getactivecaste(){
		 $this->db->select('a.*,b.religion_name');
		 $this->db->join('sm_religion as b','b.religion_uuid = a.caste_religion','INNER');
		 $this->db->where('caste_isactive', 1);
        $this->db->order_by('caste_id', 'desc');
		 $this->db->from('sm_caste as a');
		 $query = $this->db->get();
        return $query->result();
	}
    function getallinactive($table, $actvar, $orderby, $ascdes){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($actvar, 0);
        $this->db->order_by($orderby, $ascdes);
        $query = $this->db->get();
        return $query->result();
    }
	
	function user_login($login_email,$login_password){
		$this->db->select('*');
		$this->db->from('client');
        $this->db->where('profile_password', $login_password);
        $this->db->where('p_status', 'approved');
        $this->db->where('email', $login_email);
		$query = $this->db->get();
        return $query->row();
	}
	
	public function SearchProduct(){
		$gender = '';
		$profile_uuid = $this->session->userdata('uuid');	
		$req_text = 'profile_uuid';
		if(isset($profile_uuid) ){
			$req_text = $profile_uuid;
			$Pro = $this->getbyid('client', 'profile_uuid', $profile_uuid);
			$gender = $Pro->gender;
		}
		$text_where = '';
		if($this->input->post('profile_id')){
			$text_where = $text_where . ' and concat("AMA",profile_register_id) =  "'.$this->input->post('profile_id').'" ';

		}
		if($this->input->post('search_sub_caste') ){
			$text_where = $text_where . ' and sub_caste =  "'.$this->input->post('search_sub_caste').'" ';
		}
		if($this->input->post('search_state') ){
			$text_where = $text_where . ' and state = "'.$this->input->post('search_state') .'"  ';
		}
		if($this->input->post('search_religion') ){
			$text_where = $text_where . ' and religion = "'.$this->input->post('search_religion').'" ';
		}
		if($this->input->post('search_physical_status') ){
			$text_where = $text_where . ' and physical = "'.$this->input->post('search_physical_status').'" ';
		}
		if($this->input->post('search_occupation') ){
			$text_where = $text_where . ' and occupation = "'.$this->input->post('search_occupation').'" ';
		}
		if($this->input->post('search_income') ){
			$text_where = $text_where .  ' and income = "'.$this->input->post('search_income').'" ';
		}
		if($this->input->post('search_education') ){
			$text_where = $text_where . ' and highest_education = "'.$this->input->post('search_education').'" ';
		}
		if($this->input->post('search_division') ){
			$text_where = $text_where . ' and division = "'.$this->input->post('search_division').'" ';
		}
		if($this->input->post('search_martial_status') ){
			$text_where = $text_where . ' and marital = "'.$this->input->post('search_martial_status').'" ';
		}
		if($this->input->post('search_caste') ){
			$text_where = $text_where . ' and caste =  "'.$this->input->post('search_caste').'" ';
		}
		if($this->input->post('search_citizenship') ){
			$text_where = $text_where . ' and citizenship = "'.$this->input->post('search_citizenship').'" ';
		}
		if($this->input->post('search_city') ){
			$text_where = $text_where . ' and city = "'.$this->input->post('search_city').'" ';
		}
		if($this->input->post('search_country') ){
			$text_where = $text_where . ' and country = "'.$this->input->post('search_country').'" ';
		}
		
		
		if($this->input->post('search_age') ){
			$text_where = $text_where . ' and age	 = "'.$this->input->post('search_age').'" ';
		}
		
		if($this->input->post('search_height') ){
			$text_where = $text_where . ' and height = "'.$this->input->post('search_height').'" ';
		}
				
		if($this->input->post('search_district') ){
			$text_where = $text_where . ' and district = "'.$this->input->post('search_district').'" ';
		}
		
		if($this->input->post('search_denomination') ){
			$text_where = $text_where . ' and denomination = "'.$this->input->post('search_denomination').'" ';
		}
		
		if($this->input->post('search_employed_in') ){
			$text_where = $text_where . ' and employed_in = "'.$this->input->post('search_employed_in').'" ';
		}
		
		
		
		
		
		
		
	
		if($gender !=''){
			$text_where = $text_where . ' and gender != "'.$gender.'" ';
		}
		$qry = "SELECT '".$req_text."' as p_uuid,IFNULL(occupation_name,'') as occupation_name,IFNULL(high_education_name,'') as high_education_name,occupation,case when client_request_status is null then 0 else 1 end as reqstatus,req.*,a.profile_uuid,religion_name,caste_name,state_name,country.country_name,a.profile_name,a.age,c.mother_name,image.pro_image from client as a INNER join (select * from client_image as b where b.pro_image_ismain	 = 1 and b.pro_image_isactive	 = 1 GROUP by b.profile_uuid ) as image on image.profile_uuid = a.profile_uuid LEFT join sm_mother as c on c.mother_uuid = a.mother left JOIN sm_country as country on country.country_uuid = a.country left JOIN sm_state on state_uuid = a.state left JOIN sm_caste as caste on caste.caste_uuid = a.caste left JOIN sm_religion as rel on rel.religion_uuid = a.religion left join (SELECT client_request_uuid,client_request_from,client_request_to,CASE WHEN client_request_status = 'created' then 'pending' else client_request_status end as client_request_status  FROM `client_request` as a WHERE (client_request_from = '".$req_text."')  or (client_request_to = '".$req_text."' )) as req on req.client_request_from = a.profile_uuid or req.client_request_to = a.profile_uuid left join sm_highest_education as he on he.high_education_uuid = a.highest_education  left join sm_occupation as so on so.occupation_uuid = a.occupation where p_status = 'Approved'   ".$text_where."  and a.profile_uuid != '".$req_text."'";
		$query = $this->db->query($qry);
		
        return $query->result_array();

	}
	
	public function getintrest($table,$from,$to){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('client_request_from', $from);
		$this->db->where('client_request_to', $to);
		$query = $this->db->get();
        return $query->result();
	}
    public function checklogin($u, $p){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('userName', $u);
		$this->db->where('userPassword', $p);
		$this->db->where('userActive', 1);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
    }
	
	function active_profile(){
		$profile_uuid = $this->session->userdata('uuid');	
		$txt = '' ;
		if(isset($profile_uuid) ){
			$Pro = $this->getbyid('client', 'profile_uuid', $profile_uuid);
			$gender = $Pro->gender;
			$txt = ' and gender != "'.$gender.'" ';
		}
		$qry = "SELECT a.profile_uuid,b.pro_image FROM `client` as a INNER JOIN client_image as b on a.`profile_uuid` = b.profile_uuid and b.pro_image_isactive = 1 and pro_image_ismain = 1 WHERE p_status	 = 'approved' ".$txt." GROUP by a.profile_uuid  order by profile_id desc limit 0,30";
		$result  = $this->db->query($qry)->result_array();
		return $result;
	}
	
	function get_success_stories(){
		$qry = "SELECT * FROM `sm_succes_stories` where couple_isactive = 1 order by couple_order";
		$result  = $this->db->query($qry)->result_array();
		return $result;
	}
	
	function getshared_profile($uuid){
		$qry = "SELECT shared_profile_profile,shared_profile_uuid,b.profile_name,b.age,country_name,state_name,c.pro_image FROM `shared_profile` as a INNER JOIN client as b on a.`shared_profile_profile` = b.profile_uuid and a.shared_profile_status = 1  INNER JOIN client_image as c on c.profile_uuid = a.shared_profile_profile and c.pro_image_isactive = 1  LEFT JOIN sm_country as country on country.country_uuid = b.country LEFT JOIN sm_state as state on state.state_uuid = b.state WHERE a.shared_profile_shared_by = '".$uuid."' GROUP by b.profile_uuid";
		$query = $this->db->query($qry)->result_array();
		
		return $query;
	}
	
	function getshared_by($uuid){
		$qry = "SELECT shared_profile_uuid,b.profile_name,b.age,country_name,state_name,c.pro_image FROM `shared_profile` as a INNER JOIN client as b on a.`shared_profile_shared_by` = b.profile_uuid and a.shared_profile_status = 1  INNER JOIN client_image as c on c.profile_uuid = a.shared_profile_shared_by and c.pro_image_isactive = 1  LEFT JOIN sm_country as country on country.country_uuid = b.country LEFT JOIN sm_state as state on state.state_uuid = b.state WHERE a.shared_profile_profile = '".$uuid."' GROUP by b.profile_uuid";
		$query = $this->db->query($qry)->result_array();
		return $query;
	}
	
	function Shared_by_details($uuid){
		$qry ="SELECT shared_profile_uuid,b.profile_name,b.age,country_name,state_name,c.pro_image FROM `shared_profile` as a left JOIN client as b on a.`shared_profile_shared_by` = b.profile_uuid left JOIN client_image as c on c.profile_uuid = a.shared_profile_shared_by LEFT JOIN sm_country as country on country.country_uuid = b.country LEFT JOIN sm_state as state on state.state_uuid = b.state WHERE a.shared_profile_uuid = '".$uuid."' GROUP by b.profile_uuid";
		$query = $this->db->query($qry)->result_array();
		return $query;
	}
	
	function getallactivebyid($table, $actvar, $wherevar, $value,$orderby, $ascdes){
		$this->db->select('*');
        $this->db->from($table);
        $this->db->where($actvar, 1);
        $this->db->where($wherevar, $value);
        $this->db->order_by($orderby, $ascdes);
        $query = $this->db->get();
        return $query->result();
	}
    function getbyid($table, $wherevar, $id){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($wherevar, $id);
        $query = $this->db->get();
        return $query->row();
    }
    function findbyonewhere($table, $wherevar, $value){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($wherevar, $value);
        $query = $this->db->get();
        return $query->result();
    }

    public function Existdata($where,$cond,$table)
	{
		$this->db->select('count(*) as num');
		$this->db->from($table);
		$this->db->where($where, $cond);
		$query = $this->db->get();
		return $query->row();
	}
	
	public function addRegisterNo($insert_id){
		$qry = 'select * from client where profile_id  <   '.$insert_id.' order by profile_id desc limit 0,1';
		$data = $this->db->query($qry)->row_array();
		$profile_register_id = $data['profile_register_id'];
		$profile_register_id = (int) $profile_register_id +  1;
		$data = array(
			'profile_register_id'=>$profile_register_id
		);
		$this->db->where('profile_id',$insert_id);
		$this->db->update('client',$data);
	}
    public function savebasicsData($table,$data)
	{
		if ($this->db->insert($table,$data)) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

    public function saverecords($data)
    {
        $this->db->insert('client',$data);
        return true;
    }

    public function updatedata($inid,$table,$data,$primary){
		$this->db->where($primary, $inid);
		$this->db->update($table, $data);
		//echo $this->db->last_query();
		//die();
		return true;
	}

    public function saveotherData($table, $data){
		if ($this->db->insert($table, $data)) {
			return true;
			
		}
	}
    public function deleteData($inid,$table,$primary){
		$this->db->where($primary, $inid);
		$this->db->delete($table);
		//echo $this->db->last_query();
		//die();
		return true;
	}
	
	public function share_profile($uuid){
		$profile_uuid = $this->session->userdata('uuid');	
		if(isset($profile_uuid) ){
			$qry = "select * from shared_profile where shared_profile_profile = '".$uuid."' and shared_profile_shared_by = '".$profile_uuid."' and shared_profile_status ";
			$res = $this->db->query($qry);
			if($res->num_rows() > 0 ){
				$res = $res->row_array();
				return $res['shared_profile_uuid'];
			}else{
				$data = array(
					'shared_profile_profile'=>$uuid,
					'shared_profile_shared_by'=>$profile_uuid,
					'shared_profile_uuid'=>$this->gen_uuid()
				);
				$this->db->insert('shared_profile',$data);
				return $data['shared_profile_uuid'];
			}
		}else{
			return '';
		}
		
	}
    public function findnavid($page){
        $this->db->select('*');
        $this->db->from('navbar');
        $this->db->where('navHref', $page);
        $query = $this->db->get();
        return $query->row();
    }
    
    function getactivesubnavs($parent){
        $this->db->select('*');
        $this->db->from('navbar');
        $this->db->where('navActive', 1);
        $this->db->where('navParent', $parent);
        $this->db->order_by('navOrder', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    function getallmodeswithname($table, $orderby, $ascdes){
        $this->db->select('*');
        $this->db->select('users.usersName as usersName');
        $this->db->from($table);
        $this->db->order_by($orderby, $ascdes);
        $this->db->join('users', 'modes.managerId = users.userId', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    function useradminusers(){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('userLevel', 3);
        $this->db->where('userActive', 1);
        $query = $this->db->get();
        return $query->result();
    }
    
    
}
?>