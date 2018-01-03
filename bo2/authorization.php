<?php

require_once 'components/page.php';
require_once 'components/security/datasource_security_info.php';
require_once 'components/security/security_info.php';
require_once 'components/security/hardcoded_auth.php';
require_once 'components/security/user_grants_manager.php';

include_once 'components/security/user_identity_storage/user_identity_session_storage.php';

$users = array('otoit' => 'otoit',
    'antoinepx' => 'GASPARD24');

$usersIds = array('otoit' => -1, 'antoinepx' => -1);

$dataSourceRecordPermissions = array();

$grants = array('guest' => 
        array()
    ,
    'defaultUser' => 
        array('otoit_product' => new DataSourceSecurityInfo(false, false, false, false))
    ,
    'guest' => 
        array('otoit_product' => new DataSourceSecurityInfo(false, false, false, false))
    ,
    'otoit' => 
        array('otoit_product' => new DataSourceSecurityInfo(false, false, false, false))
    ,
    'antoinepx' => 
        array('otoit_product' => new DataSourceSecurityInfo(false, false, false, false))
    );

$appGrants = array('guest' => new DataSourceSecurityInfo(false, false, false, false),
    'defaultUser' => new DataSourceSecurityInfo(true, false, false, false),
    'guest' => new DataSourceSecurityInfo(false, false, false, false),
    'otoit' => new AdminDataSourceSecurityInfo(),
    'antoinepx' => new AdminDataSourceSecurityInfo());

$tableCaptions = array('otoit_product' => 'Otoit Product');

function SetUpUserAuthorization()
{
    global $usersIds;
    global $grants;
    global $appGrants;
    global $dataSourceRecordPermissions;
    $userAuthorizationStrategy = new HardCodedUserAuthorization(new UserIdentitySessionStorage(GetIdentityCheckStrategy()), new HardCodedUserGrantsManager($grants, $appGrants), $usersIds);
    GetApplication()->SetUserAuthorizationStrategy($userAuthorizationStrategy);

GetApplication()->SetDataSourceRecordPermissionRetrieveStrategy(
    new HardCodedDataSourceRecordPermissionRetrieveStrategy($dataSourceRecordPermissions));
}

function GetIdentityCheckStrategy()
{
    global $users;
    return new SimpleIdentityCheckStrategy($users, '');
}

?>