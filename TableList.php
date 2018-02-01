<?php


/*
 * A class that stores a list of tables 
 * with all the column names in an array
*/

class TableList
{
	private $fieldList = array();
	
	public function __construct()
	{
		/*
		* Store all the tables with column names here for faster recovery
		*/
		
		
		$this->fieldList['users_all']=array('user_id','user_code','user_role','user_fname','user_lname','password','user_resident_status','user_nric','user_employment_type','user_type','user_date_of_joining','user_bank_name','user_bank_account','user_home_phone','user_mobile','user_email_id','user_residential_address','user_notes','user_access_privileges','user_is_active');		
		$this->fieldList['users_add']=array('user_customer_id','user_code','user_role','user_fname','user_lname','password','user_resident_status','user_nric','user_employment_type','user_type','user_date_of_joining','user_bank_name','user_bank_account','user_home_phone','user_mobile','user_email_id','user_residential_address','user_notes','user_access_privileges','user_is_active');		
		$this->fieldList['users_edit']=array('user_customer_id','user_code','user_role','user_fname','user_lname','password','user_resident_status','user_nric','user_employment_type','user_type','user_date_of_joining','user_bank_name','user_bank_account','user_home_phone','user_mobile','user_email_id','user_residential_address','user_notes','user_access_privileges','user_is_active');		
		$this->fieldList['users_edit_all']=array('user_code','user_role','user_fname','user_lname','password','user_resident_status','user_nric','user_employment_type','user_type','user_date_of_joining','user_bank_name','user_bank_account','user_home_phone','user_mobile','user_email_id','user_residential_address','user_notes','user_access_privileges','user_is_active');		
		
        $this->fieldList['users_display']=array('user_id','user_customer_id','user_code','user_type','user_role','user_fname','user_nric','user_email_id','user_is_active');		
		$this->fieldList['users_no_password']=array('user_customer_id','user_code','user_role','user_fname','user_lname','user_resident_status','user_nric','user_employment_type','user_type','user_date_of_joining','user_bank_name','user_bank_account','user_home_phone','user_mobile','user_email_id','user_residential_address','user_notes','user_access_privileges','user_is_active');		
		
		$this->fieldList['customers_all']=array('customer_id','customer_client_code','customer_company_name','customer_contract_num','customer_contract_start_date','customer_contract_end_date','customer_company_type','customer_industry','customer_fye','customer_discount','customer_gst_registered','customer_office_phone','customer_fax','customer_contact_person1','customer_mobile1','customer_email1','customer_gender1','customer_designation1','customer_contact_person2','customer_mobile2','customer_email2','customer_gender2','customer_designation2','customer_contact_person3','customer_mobile3','customer_email3','customer_gender3','customer_designation3','customer_contact_person4','customer_mobile4','customer_email4','customer_gender4','customer_designation4','customer_contact_person5','customer_mobile5','customer_email5','customer_gender5','customer_designation5','customer_address1','customer_address2','customer_address3','customer_notes','customer_company_register_date','customer_is_active');
		$this->fieldList['customers_add']=array('customer_client_code','customer_company_name','customer_contract_num','customer_uen','customer_contract_start_date','customer_contract_end_date','customer_company_type','customer_industry','customer_fye','customer_discount','customer_gst_registered','customer_fax','customer_contact_person1','customer_mobile1','customer_office_phone','customer_email1','customer_gender1','customer_designation1','customer_contact_person2','customer_mobile2','customer_email2','customer_gender2','customer_designation2','customer_contact_person3','customer_mobile3','customer_email3','customer_gender3','customer_designation3','customer_contact_person4','customer_mobile4','customer_email4','customer_gender4','customer_designation4','customer_contact_person5','customer_mobile5','customer_email5','customer_gender5','customer_designation5','customer_address1','customer_address2','customer_address3','customer_notes','customer_is_active');	
		$this->fieldList['customers_edit']=array('customer_client_code','customer_company_name','customer_contract_num','customer_uen','customer_contract_start_date','customer_contract_end_date','customer_company_type','customer_industry','customer_fye','customer_discount','customer_gst_registered','customer_fax','customer_contact_person1','customer_mobile1','customer_office_phone','customer_email1','customer_gender1','customer_designation1','customer_contact_person2','customer_mobile2','customer_email2','customer_gender2','customer_designation2','customer_contact_person3','customer_mobile3','customer_email3','customer_gender3','customer_designation3','customer_contact_person4','customer_mobile4','customer_email4','customer_gender4','customer_designation4','customer_contact_person5','customer_mobile5','customer_email5','customer_gender5','customer_designation5','customer_address1','customer_address2','customer_address3','customer_notes');	
		$this->fieldList['customers_display']=array('customer_id','customer_client_code','customer_company_name','customer_fye','customer_contact_person1','customer_office_phone','customer_is_active');	
		
		$this->fieldList['transactions_all']=array('transaction_id','transaction_client_code','transaction_invoice_num','transaction_invoice_date','transaction_invoice_file_path','transaction_contract_start_date','transaction_contract_end_date','transaction_contract_amount','transaction_amount_status','transaction_contract_important_notes','transaction_contract_final_payment_date','transaction_service_code');
		$this->fieldList['transactions_add']=array('transaction_client_code','transaction_invoice_num','transaction_invoice_date','transaction_invoice_file_path','transaction_contract_start_date','transaction_contract_end_date','transaction_contract_amount','transaction_amount_status','transaction_contract_important_notes','transaction_service_code');
		$this->fieldList['transactions_edit']=array('transaction_invoice_num','transaction_invoice_date','transaction_contract_start_date','transaction_contract_end_date','transaction_contract_amount','transaction_amount_status','transaction_contract_important_notes','transaction_service_code');
		$this->fieldList['transactions_display']=array('transaction_id','transaction_invoice_num','transaction_invoice_date','transaction_contract_amount','transaction_amount_status','transaction_invoice_file_path');
		
		$this->fieldList['services_all'] = array('service_id','service_code','service_description','service_price','service_applicable_from','service_created_date','service_is_active');
		$this->fieldList['services_add'] = array('service_code','service_description','service_price','service_applicable_from','service_is_active');
		$this->fieldList['services_edit'] = array('service_id','service_code','service_description','service_price','service_applicable_from','service_is_active');
		$this->fieldList['services_display'] = array('service_id','service_code','service_description','service_price','service_is_active');
		
		$this->fieldList['folders_all'] = array('folder_id','folder_name','folder_client_code','folder_created_by_user_id','folder_comments','folder_created_date');
		$this->fieldList['folders_add'] = array('folder_name','folder_client_code','folder_created_by_user_id','folder_comments','folder_created_date');
		$this->fieldList['folders_edit'] = array('folder_name','folder_client_code','folder_comments');
		$this->fieldList['folders_display'] = array('folder_id','folder_name','folder_client_code','folder_created_by_user_id','folder_comments');
		
		$this->fieldList['files_all'] = array('file_id','file_name','file_folder_id','file_comment','file_created_by_user_id','file_created_date');
		$this->fieldList['files_add'] = array('file_name','file_folder_id','file_comment','file_created_by_user_id','file_created_date');
		$this->fieldList['files_edit'] = array('file_id','file_name','file_folder_id','file_comment');
		$this->fieldList['files_display'] = array('file_id','file_name','file_folder_id','file_comment','file_created_by_user_id');
		
		$this->fieldList['service_history_all'] = array('service_history_id','service_history_client_code','service_history_customer_company_name','service_history_service_id','service_history_service_code','service_history_service_description','service_history_service_price','service_history_service_applicable_from','service_history_service_applicable_till','service_history_service_created_date');
		$this->fieldList['service_history_add'] = array('service_history_client_code','service_history_customer_company_name','service_history_service_id','service_history_service_code','service_history_service_description','service_history_service_price','service_history_service_applicable_from','service_history_service_applicable_till','service_history_service_created_date');
		$this->fieldList['service_history_edit'] = array('service_history_id','service_history_client_code','service_history_customer_company_name','service_history_service_id','service_history_service_code','service_history_service_description','service_history_service_price','service_history_service_applicable_from','service_history_service_applicable_till','service_history_service_created_date');
		$this->fieldList['service_history_display'] = array('service_history_id','service_history_client_code','service_history_customer_company_name','service_history_service_id','service_history_service_code','service_history_service_description','service_history_service_price','service_history_service_applicable_from','service_history_service_applicable_till','service_history_service_created_date');
		
		$this->fieldList['transaction_history_all'] = array('transaction_history_id','transaction_id','transaction_contract_payment_mode','transaction_amount_paid','transaction_contract_transaction_mode','transaction_payment_date');
		$this->fieldList['transaction_history_add'] = array('transaction_id','transaction_contract_payment_mode','transaction_amount_paid','transaction_contract_transaction_mode','transaction_payment_date');
		$this->fieldList['transaction_history_display'] = array('transaction_id','transaction_contract_payment_mode','transaction_amount_paid','transaction_contract_transaction_mode','transaction_payment_date');
		/*
		 * The views will all be created here
		 */
		$this->fieldList['customer_folder'] = array('customer_client_code','customer_company_name','folder_id','folder_name','folder_client_code','folder_comments');
		$this->fieldList['customer_folder_display'] = array('customer_client_code','customer_company_name','folder_id','folder_name','folder_client_code','folder_comments');
		
		$this->fieldList['customer_folder_file'] = array('customer_client_code','customer_company_name','folder_id','folder_name','	file_id','file_name','file_folder_id','file_comment','file_created_by_user_id');
		$this->fieldList['customer_folder_file_display'] = array('customer_client_code','customer_company_name','folder_name','file_id','file_name','file_comment','file_created_by_user_id');
		
		$this->fieldList['customer_users'] = array('customer_id','customer_client_code','customer_company_name','user_id','user_customer_id','user_code','user_role','user_fname','password','user_type','user_email_id','user_is_active');
		$this->fieldList['customer_users_display'] = array('customer_id','customer_client_code','user_id','user_customer_id','customer_company_name','user_code','user_role','user_fname','user_type','user_email_id','user_is_active');
		//$this->fieldList['user_roles'] = array('');
		$this->fieldList['user_type_customer'] = array('Customer Admin','Customer');
		$this->fieldList['user_type_staff'] = array('Staff Admin','Staff');
		$this->fieldList['user_employment_type'] = array('Permanent','Temporary','Part time','Contract');
		$this->fieldList['user_resident_status'] = array('Singaporean','PR','Employment pass','S Pass','Work Permit','Dependant pass','LTVP','None');
		
		$this->fieldList['company_type'] = array('PTE','LTD','SP','LLP','NPO');
		$this->fieldList['company_industry'] = array('Food and beverage','Spa','Tourism','Construction','Retail');
		
		$this->fieldList['customer_transaction_all'] = array('customer_id','customer_uen','customer_client_code','customer_company_name','transaction_id','transaction_client_code','transaction_invoice_num','transaction_invoice_date','transaction_contract_start_date','transaction_contract_end_date','transaction_contract_amount','transaction_amount_status','transaction_contract_important_notes','transaction_contract_final_payment_date');
		$this->fieldList['customer_transaction_display'] = array('customer_id','customer_uen','customer_client_code','transaction_id','transaction_client_code','customer_company_name','transaction_invoice_num','transaction_invoice_date','transaction_contract_amount','transaction_invoice_file_path');
		
		$this->fieldList['customer_transaction_payment_all'] = array('customer_id','customer_uen','customer_client_code','customer_company_name','transaction_id','transaction_invoice_num','transaction_invoice_date','transaction_contract_start_date','transaction_contract_end_date','transaction_contract_amount','transaction_amount_status','transaction_contract_important_notes','transaction_contract_final_payment_date','transaction_invoice_file_path','transaction_history_id','amount_sum');
		$this->fieldList['customer_transaction_payment_display'] = array('customer_id','customer_company_name','transaction_id','transaction_invoice_num','transaction_invoice_date','transaction_contract_amount','transaction_contract_final_payment_date','transaction_invoice_file_path','transaction_history_id','amount_sum');
		//print_r($this->fieldList);
                $this->fieldList['payment_details_display'] = array('transaction_id', 'transaction_client_code', 'transaction_contract_amount', 'transaction_contract_start_date', 'transaction_contract_end_date', 'transaction_invoice_date', 'transaction_invoice_file_path', 'transaction_invoice_num', 'transaction_service_code', 'transaction_amount_paid', 'transaction_contract_payment_mode', 'transaction_contract_transaction_mode', 'transaction_payment_date');
                
                
                //New tables for the Task Management system
                $this->fieldList['departments_all'] = array('department_id', 'department_name', 'department_description', 'department_head_user');
                $this->fieldList['departments_display'] = array('department_id', 'department_name', 'department_description', 'department_head_user');
                $this->fieldList['departments_add'] =  array('department_name', 'department_description', 'department_head_user');
                $this->fieldList['departments_edit'] = array('department_name', 'department_description', 'department_head_user');
                
                $this->fieldList['department_user_head_display'] = array('department_id','department_name','department_description', 'department_head_user', 'user_id', 'user_customer_id','user_code', 'user_role', 'user_fname', 'user_lname', 'user_nric','user_type',  'user_email_id');
                
                
                $this->fieldList['tasks_all'] = array('task_id','task_customer_code','task_description_by','task_date_created','task_created_by_id','task_department_id','task_pass_on_description','task_pass_on_by','task_service_id','task_due_date_by', 'task_due_date_passer', 'task_date_pass_on_date', 'task_state', 'task_review_one_by', 'task_review_one_result', 'task_reveiw_two_by', 'task_review_two_result');
                $this->fieldList['tasks_add'] = array('task_customer_code','task_description_by','task_date_created','task_created_by_id','task_department_id','task_service_id','task_due_date_by','task_state');
                
                $this->fieldList['requests_all'] = array('request_id','request_to','request_from','request_time','request_date','request_description','request_status');
                $this->fieldList['status_all'] = array('status_id','status_task_id','status_user_id','status_update','status_percent','status_time_start','status_current_state','status_time_end');
                $this->fieldList['appointments_all'] = array('appointment_id','appointment_by','appointment_for','appoinntment_with','appointment_description','appointment_location','appointment_date','appointment_result');
                
                
                
        }
	
	public function getFieldList($tbname)
	{
		//print_r($this->fieldList[$tbname]);
		return $this->fieldList[$tbname];
	}
	
}


?>
