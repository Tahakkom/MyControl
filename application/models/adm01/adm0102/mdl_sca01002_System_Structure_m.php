<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_sca01002_System_Structure_m extends MY_Model {

	function __construct() {
		parent::__construct();
	}

	//Save Role Master Data
	function insert_rolesmaster($array)
	{
	$roles = $this->db->insert('_systemelements_rolesmaster',$array);
	$this->add_actionlog('System Structure', 'Role Master Data Created');
	return $roles;
	}

	//Update Role Master Data
	function update_rolesmaster($array,$where)
	{
	$this->db->where($where);   
	$roles = $this->db->update('_systemelements_rolesmaster',$array);
	$this->add_actionlog('System Structure', 'Role Master Data Updated');
	return $roles;
	}

	//Retrieve Single Service Master Data
	function getRoleMasterSingleData($RoleID) 
	{
	$this->db->where('RoleID =', $RoleID);
	$query = $this->db->get('_systemelements_rolesmaster');
	return $query->result();
	}

	//Retrieve All Role Master Data
	function  getRolesMasterDetails(){
		$query=$this->db->query('select * from _systemelements_rolesmaster as roles inner join _systemelements_servicesmaster as services on roles.RoleParentService=services.ServiceID');
		return $query->result();
	}

	//Delete Role Master Data
	function deleteRoleMasterData($RoleID)
	{
	$users = $this->db->query("Delete from _systemelements_rolesmaster where RoleID='$RoleID'");
	$this->add_actionlog('System Structure', 'Role Master Data Deleted');
	return TRUE;
	}	

//================================================================//
//Roles Access
//================================================================//

	//Save Role Access Data
	function insert_rolesaccess($array)
	{
	$roles = $this->db->insert('_systemelements_rolesaccess',$array);
	$this->add_actionlog('System Structure', 'Role Access Data Created');
	return $roles;
	}

	//Update Role Access Data
	function update_rolesaccess($array,$where)
	{
	$this->db->where($where);   
	$roles = $this->db->update('_systemelements_rolesaccess',$array);
	$this->add_actionlog('System Structure', 'Role Access Data Updated');
	return $roles;
	}

	//Retrieve Single Role Access Data
	function getRoleAccessSingleData($RoleAccessID) 
	{
	$this->db->where('RoleAccessID =', $RoleAccessID);
	$query = $this->db->get('_systemelements_rolesaccess');
	return $query->result();
	}

	//Retrieve All Role Access Data
	function  getRoleAccessDetails(){
		$query=$this->db->query('select * from _systemelements_rolesaccess as roleaccess inner join _systemelements_rolesmaster as roles on roleaccess.RoleAccessParentRole=roles.RoleID');
		return $query->result();
	}

	//Delete Role Access Data
	function deleteRoleAccess($RoleAccessID)
	{
	$query = $this->db->query("Delete from _systemelements_rolesaccess where RoleAccessID='$RoleAccessID'");
	$this->add_actionlog('System Structure', 'Role Access Data Deleted');
	return TRUE;
	}

//================================================================//
//Screens	
//================================================================//

	//Save Screens Data
	function insert_screens($array)
	{
	$functions = $this->db->insert('_systemelements_screens',$array);
	$this->add_actionlog('System Structure', 'Screens Data Created');
	return $functions;
	}

	//Update Screens Data
	function update_screens($array,$where)
	{
	$this->db->where($where);   
	$functions = $this->db->update('_systemelements_screens',$array);
	$this->add_actionlog('System Structure', 'Screens Data Updated');
	return $functions;
	}

	//Retrieve All Screens Data
	function  getScreensDetails(){
		$query=$this->db->query('select * from _systemelements_screens');
		return $query->result();
	}

	//Delete Screens Data
	function deleteScreens($ScreenID)
	{
	$query = $this->db->query("Delete from _systemelements_screens where ScreenID='$ScreenID'");
	$this->add_actionlog('System Structure', 'Screens Data Deleted');
	return TRUE;
	}	
	

//================================================================//	
//Processes and Function	
//================================================================//

	//Save Processes and Function Data
	function insert_processesandfunctions($array)
	{
	$functions = $this->db->insert('_systemelements_processesandfunctions',$array);
	$this->add_actionlog('System Structure', 'Processes and Functions Created');
	return $functions;
	}

	//Update Processes and Function Data
	function update_processesandfunctions($array,$where)
	{
	$this->db->where($where);   
	$functions = $this->db->update('_systemelements_processesandfunctions',$array);
	$this->add_actionlog('System Structure', 'Processes and Functions  Updated');
	return $functions;
	}

	//Retrieve All Functions Data
	function  getFunctionsDetails(){
		$query=$this->db->query('select * from _systemelements_processesandfunctions');
		return $query->result();
	}

	//Delete Processes and Function Data
	function deleteFunctions($FunctionID)
	{
	$query = $this->db->query("Delete from _systemelements_processesandfunctions where FunctionID='$FunctionID'");
	$this->add_actionlog('System Structure', 'Processes and Functions Deleted');
	return TRUE;
	}	
	

//================================================================//	
//Database Tables
//================================================================//

	//Save Database Tables Data
	function insert_dbtables($array)
	{
	$functions = $this->db->insert('_systemelements_databasetables',$array);
	$this->add_actionlog('System Structure', 'Database Table Created');
	return $functions;
	}

	//Update Database Tables Data
	function update_dbtables($array,$where)
	{
	$this->db->where($where);   
	$functions = $this->db->update('_systemelements_databasetables',$array);
	$this->add_actionlog('System Structure', 'Database Table Updated');
	return $functions;
	}

	//Retrieve All Database Tables Data
	function  getDBTablesDetails(){
		$query=$this->db->query('select * from _systemelements_databasetables');
		return $query->result();
	}	

	//Delete Database Tables Data
	function deleteDBTables($TableID)
	{
	$query = $this->db->query("Delete from _systemelements_databasetables where TableID='$TableID'");
	$this->add_actionlog('System Structure', 'Database Table Deleted');
	return TRUE;
	}	

	//Save Action Log
	public function add_actionlog($screen,$details)
	{
		$datetime=date("Y-m-d H:i:s");
		$data = array();
        $data['ActionScreen']=$screen;	
		$data['ActionDetails']=$details;
		$data['DateTime']=$datetime;
		$action = $this->db->insert('_systemelements_actionlog',$data);
	}

	//Retrieve Action Log
	function  get_actionlog(){
		$query=$this->db->query('select * from _systemelements_actionlog order by ActionID Desc Limit 50');
		return $query->result();
	}
}

/* End of file mdl_sca01002_System_Structure_m.php */