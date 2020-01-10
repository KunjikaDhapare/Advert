<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['/'] = 'Home';
$route['Dashboard'] = 'Home/dashboard';
$route['login'] = 'Home/login_check';
$route['forgotPasaword'] = 'Home/forgot_password';
$route['updatePassword'] = 'Home/update_password';
$route['logout'] = 'Home/log_out';
$route['profile'] = 'Home/update_profile';
$route['updateOwnerMember'] = 'Home/update_owner_member';
$route['updateFamilyMember'] = 'Home/update_family_member';
$route['updateFlatParking'] = 'Home/update_flat_parking';
$route['updateFlatDetails'] = 'Home/update_flat_details';
$route['updateMemberProfile'] = 'Home/update_member_profile';
$route['deleteFamilyMember'] = 'Home/delete_member_profile';
$route['deleteOwner'] = 'Home/delete_owner_profile';
$route['deleteParking'] = 'Home/delete_vehicle_profile';
$route['change'] = 'Home/change_pwd';
$route['updatePWD'] = 'Home/update_pwd';


// Publication Module
$route['publication'] = 'Publication/publication_details';
$route['newPublication'] = 'Publication/register_publication';
$route['newPublicationRecords'] = 'Publication/new_publication';
$route['updatePublicationRecords'] = 'Publication/update_publication';
$route['editPub/:num'] = 'Publication/edit_pub';
$route['editPub'] = 'Publication/edit_publication';


// Client Module
$route['client'] = 'Client/client_details';
$route['newClient'] = 'Client/register_client';
$route['newClientSave'] = 'Client/saveClient';
//company
$route['company'] = 'Company/company_details';
$route['newCompany'] = 'Company/register_company';
$route['newCompanySave'] = 'Company/new_company';
$route['disableCompany'] = 'Company/disable_company';
//Package
$route['package'] = 'Package/package_details';
$route['newPackage'] = 'Package/create_package';
$route['newPackageSave'] = 'Package/pacakge_insert';
$route['disablePackage'] = 'Package/disable_package';

// Adverties Module
$route['adverties'] = 'Adverties/adverties_details';
$route['newAdverties'] = 'Adverties/register_adverties';
$route['getAdvDetails'] = 'Adverties/getDetails';
$route['advScheduling/:num'] = 'Adverties/adverties_scheduling';
$route['advSchedule'] = 'Adverties/adverties_scheduling_details';
$route['advView/:num'] = 'Adverties/adverties_view';
$route['advView'] = 'Adverties/adverties_view_details';
$route['advPrint'] = 'Adverties/adverties_print';
$route['finalPrint'] = 'Adverties/final_adverties_print';
$route['approveAdverties'] = 'Adverties/approve_Adverties';
$route['rescheduledAdvertise'] = 'Adverties/reschedule_Adverties';

$route['editAdv/:num'] = 'Adverties/adverties_edit';
$route['editAdv'] = 'Adverties/adverties_edit_details';

//masters
$route['rateDetails'] = 'Rate/rate_record';
$route['newRate'] = 'Rate/new_rate';
$route['newRateRecord'] = 'Rate/insert_rate';
$route['disableRate'] = 'Rate/disable_rate';
$route['approveRate'] = 'Rate/approve_rate';

/*$route['createSize'] = 'Masters/create_size';
$route['size'] = 'Masters/size';*/
$route['newSizeRecords'] = 'Masters/new_size';
$route['newSize'] = 'Masters/size';
$route['sizeDetails'] = 'Masters/size_record';

$route['newPeriodicity'] = 'Masters/new_periodicity';
$route['newPeriodicityRecords'] = 'Masters/periodicity';
$route['periodicityDetails'] = 'Masters/periodicity_record';

//user
$route['user'] = 'User/user_Details';
$route['newUser'] = 'User/new_user';
$route['newUserSave'] = 'User/save_user';
$route['updateUserSave'] = 'User/update_save_user';
$route['disableUser'] = 'User/disable_user';
$route['updateUser/:num'] = 'User/update_reg_user/$1';
$route['updateUserRecord'] = 'User/update_user';

// Agent Module
$route['agent'] = 'Agent/agent_details';
$route['newAgent'] = 'Agent/register_agent';
$route['disableAgent'] = 'Agent/disable_agent';
$route['updateAgent/:num'] = 'Agent/update_agent_user';
$route['updateAgentRecord'] = 'Agent/update_agent';
$route['updateAgentSave'] = 'Agent/update_save_agent';



