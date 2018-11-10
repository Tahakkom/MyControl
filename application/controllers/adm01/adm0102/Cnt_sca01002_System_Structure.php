<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cnt_sca01002_System_Structure extends My_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model("adm01/adm0101/Mdl_sca01001_Service_PricingPlans_m",'service_pricingplans_m');
		$this->load->model("adm01/adm0102/Mdl_sca01002_System_Structure_m",'system_structure_m');
	}
	
	public function index()
	{ 
		$this->data['roles'] = $this->system_structure_m->getRolesMasterDetails();
		$this->data['roleaccess'] = $this->system_structure_m->getRoleAccessDetails();
		$this->data['functions'] = $this->system_structure_m->getFunctionsDetails();
		$this->data['dbtables'] = $this->system_structure_m->getDBTablesDetails();
		$this->data['screens'] = $this->system_structure_m->getScreensDetails();
		$this->data['services'] = $this->service_pricingplans_m->get_servicesmasterdetails();
		$this->data['togglesetting'] = 0;
		if(isset($_POST['rolemaster']))
		{ 
			$this->load->library('form_validation');
          	        $rules = $this->rules();
	  		$this->form_validation->set_rules($rules);
	  		if ($this->form_validation->run() == FALSE) 
          	{
          	$this->data['togglesetting'] = 1;
	    	$this->data['form_validation'] = validation_errors();
            $this->data["subview"] = "adm01/adm0102/sca01002_adm_SystemElements";
            $this->load->view('_layout_main', $this->data);			
	  		} 
          	else 
          	{
			$where = array();
			$data = array();
	    	$where['RoleID']=$this->input->post('default_roleid');
	    	$data['RoleID']=$this->input->post('roleid');
        	$data['RoleTitle']=$this->input->post('roletitle');	
	    	$data['RoleAdmin']=$this->input->post('roleadmin');
	    	$data['RoleParentService']=$this->input->post('roleservice');
	    	if($where['RoleID'] == '0')
			{
			  $result=$this->system_structure_m->insert_rolesmaster($data);
			}
			else
			{
			  $result=$this->system_structure_m->update_rolesmaster($data,$where);	
			}
			redirect(base_url("System_Structure/index"));
	        // $this->data['roles'] = $this->system_structure_m->get_rolesmasterdetails();
	        // $this->data["subview"] = "adm01/adm0102/sca01002_adm_SystemElements";
			// $this->load->view('_layout_main', $this->data);
			}
		}
		elseif(isset($_POST['roleaccess']))
		{
			$this->load->library('form_validation');
          	$rules = $this->roleaccessrules();
	  		$this->form_validation->set_rules($rules);
	  		if ($this->form_validation->run() == FALSE) 
          	{
          	$this->data['togglesetting'] = 1;
	    	$this->data['form_validation'] = validation_errors();
            $this->data["subview"] = "adm01/adm0102/sca01002_adm_SystemElements";
            $this->load->view('_layout_main', $this->data);			
	  		} 
          	else 
          	{
			$where = array();
			$data = array();
	    	$where['RoleAccessID']=$this->input->post('roleaccessid');
        	$data['RoleAccessParentRole']=$this->input->post('roleaccesstitle');	
	    	$data['RoleAccessElementType']=$this->input->post('elementtype');
	    	$data['RoleAccessElement']=$this->input->post('element');
	    	if($where['RoleAccessID'] == '0')
			{
			  $result=$this->system_structure_m->insert_rolesaccess($data);
			}
			else
			{
			  $result=$this->system_structure_m->update_rolesaccess($data,$where);	
			}
			redirect(base_url("System_Structure/index"));
	        // $this->data['roles'] = $this->system_structure_m->get_rolesmasterdetails();
	        // $this->data["subview"] = "adm01/adm0102/sca01002_adm_SystemElements";
			// $this->load->view('_layout_main', $this->data);
			}
		}
		else
		{
		$this->data["subview"] = "adm01/adm0102/sca01002_adm_SystemElements";
		$this->load->view('_layout_main', $this->data);
		}
	}

	protected function rules() {
    $rules = array(
	array(
	    'field' => 'roleid', 
	    'label' => "Role ID",
	    'rules' => 'trim|required'
	     ), 
	     array(
	     'field' => 'roletitle', 
	     'label' => "Role Title",
	     'rules' => 'trim|required'
	      ), 
	     array(
	     'field' => 'roleadmin', 
	     'label' => "Role Admin",
	     'rules' => 'trim|required'
	      ), 
	     array(
	     'field' => 'roleservice', 
	     'label' => "Select Services",
	     'rules' => 'trim|required'
	      )
	    );
	return $rules;
	}

	protected function roleaccessrules() {
    $rules = array(
		array(
	     'field' => 'roleaccesstitle', 
	     'label' => "Role Title",
	     'rules' => 'trim|required'
	      ), 
	     array(
	     'field' => 'elementtype', 
	     'label' => "Element Type",
	     'rules' => 'trim|required'
	      ), 
	     array(
	     'field' => 'element', 
	     'label' => "Element",
	     'rules' => 'trim|required'
	      )
	    );
	return $rules;
	}

	//Get Role Master Data for Edit screen
 	public function getRoleMasterSingleData()
	{
		$RoleID= $this->input->post('RoleID');
		$RoleData = $this->system_structure_m->getRoleMasterSingleData($RoleID);
		echo json_encode($RoleData);
	}

	//Delete Role Master Data
	public function deleteRoleMasterData()
	{
		$RoleID = $this->input->post('RoleID');
		$RoleData = $this->system_structure_m->deleteRoleMasterData($RoleID);
		echo $RoleData;
	}

//Roles Access

	//Get Role Access Data for Edit screen
 	public function getRoleAccessSingleData()
	{
		$RoleAccessID= $this->input->post('RoleAccessID');
		$RoleAccessData = $this->system_structure_m->getRoleAccessSingleData($RoleAccessID);
		echo json_encode($RoleAccessData);
	}

	//Delete Role Access Data
	public function deleteRoleAccess()
	{
		$RoleAccessID = $this->input->post('RoleAccessID');
		$RoleAccessData = $this->system_structure_m->deleteRoleAccess($RoleAccessID);
		echo $RoleAccessData;
	}

//Processes And Functions

	//Get Functions Details
 	public function getFunctionsDetails()
	{
		$functions = $this->system_structure_m->getFunctionsDetails();
		//echo json_encode($functions);
		$output='';
		foreach ($functions as $func) {
			$output=$output.'<option value="'.$func->FunctionID.'">'.$func->FunctionDescription.'</option>';
		}
		echo $output;
	}

	//Save Processes And Functions Data
	public function ProcessesandFunctions()
	{
	  $data = array();
	  $where = array();
	  $where['FunctionID']=$this->input->post('def_functionid');
      $data['FunctionID']=$this->input->post('functionid');	
	  $data['FunctionDescription']=$this->input->post('functiondesc');
	  $data['FunctionAccess']=$this->input->post('functionaccess');
	  $data['FunctionComponent']=$this->input->post('functioncomponent');
	  if($where['FunctionID'] == '0')
	  {
	  	$result=$this->system_structure_m->insert_processesandfunctions($data);
	  }
	  else
	  {
	  	$result=$this->system_structure_m->update_processesandfunctions($data,$where);	
	  }
	  echo $result;
	}

	// public function updateFunctions()
	// {
	// 	//print_r($_POST);
	//     $data = array(); 
	//     $where = array();
	//     $where['FunctionID']=$this->input->post('def_functionid');
 //        $data['FunctionID']=$this->input->post('functionid');	
	//     $data['FunctionDescription']=$this->input->post('functiondesc');
	//     $data['FunctionAccess']=$this->input->post('functionaccess');
	//     $data['FunctionComponent']=$this->input->post('functioncomponent');
	//     if($where['FunctionID'] == '0')
	//     {
	//   	  $result=$this->system_structure_m->insert_processesandfunctions($data);
	//     }
	//     else
	//     {
	//   	   $result=$this->system_structure_m->update_processesandfunctions($data,$where);	
	//     }
	//      echo $result;
	// }

	//Delete Processes And Functions Data
	public function deleteFunctions()
	{
		$FunctionID = $this->input->post('FunctionID');
		$FunctionData = $this->system_structure_m->deleteFunctions($FunctionID);
		echo $FunctionData;
	}


//Database Tables

	//Get Tables Details
 	public function getDBTablesDetails()
	{
		//$functions = $this->system_structure_m->getDBTablesDetails();
		//echo json_encode($functions);
	}

	//Save Database Tables Data
	public function DatabaseTables()
	{
	  $data = array();
	  $where = array();
	  $where['TableID']=$this->input->post('def_tableid');
      $data['TableID']=$this->input->post('tableid');	
	  $data['TableDescription']=$this->input->post('tabledesc');
	  $data['TableAccess']=$this->input->post('tableaccess');
	  $data['TableComponent']=$this->input->post('tablecomponent');
	  if($where['TableID'] == '0')
	  {
	  	$result=$this->system_structure_m->insert_dbtables($data);
	  }
	  else
	  {
	  	$result=$this->system_structure_m->update_dbtables($data,$where);	
	  }
	  echo $result;
	}

	//Delete Database Tables Data
	public function deleteDBTables()
	{
		$TableID = $this->input->post('TableID');
		$TableData = $this->system_structure_m->deleteDBTables($TableID);
		echo $TableData;
	}


//Screens

	//Get Screens Details
 	public function getScreensDetails()
	{
		$screens = $this->system_structure_m->getScreensDetails();
		//echo json_encode($screens);
		$output='';
		foreach ($screens as $scrn) {
			$output=$output.'<option value="'.$scrn->ScreenID.'">'.$scrn->ScreenDescription.'</option>';
		}
		echo $output;
	}

	//Save Screens Data
	public function Screens()
	{
	  $data = array();
	  $where = array();
	  $where['ScreenID']=$this->input->post('def_screenid');
      $data['ScreenID']=$this->input->post('screenid');	
	  $data['ScreenDescription']=$this->input->post('screendesc');
	  $data['ScreenAccess']=$this->input->post('screenaccess');
	  $data['ScreenComponent']=$this->input->post('screencomponent');
	  $data['ScreenLocation']=$this->input->post('screenlocation');
	  if($where['ScreenID'] == '0')
	  {
	  	$result=$this->system_structure_m->insert_screens($data);
	  }
	  else
	  {
	  	$result=$this->system_structure_m->update_screens($data,$where);	
	  }
	  echo $result;
	}

	//Delete Screens Data
	public function deleteScreens()
	{
		$ScreenID = $this->input->post('ScreenID');
		$ScreenData = $this->system_structure_m->deleteScreens($ScreenID);
		echo $ScreenData;
	}	
	
}
