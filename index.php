<?php

error_reporting(E_ALL);

require_once 'database_config.php';
require_once 'database_connection.php';
require_once 'controller_user.php';
require_once 'model_user.php';
require_once 'view_user_delete.php';
require_once 'view_user_update_password.php';
require_once 'view_user_edit.php';
require_once 'view_user_list.php';
require_once 'view_user_message.php';
require_once 'view_user_header.php';
require_once 'view_user_footer.php';

$controller = new JCVillegas\DevProject\ControllerUser();
$operation = !empty($_GET['operation']) ? trim($_GET['operation']) : '';

if (($operation) && (method_exists($controller, $operation))) {
    $controller->$operation ();
} else {
    $controller->readUsers();
}
