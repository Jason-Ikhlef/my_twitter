<?php 

include_once('../../models/Model.php');
include_once('../../controllers/UserManager.php');

$controller = new UserManager;
$users = $controller->linkFromAt();
$nicknames = [];

if ($users) {
    
    $users = ((explode(" ", (trim(str_replace("-", " ", $users[0]->follows()))))));

    foreach ($users as $k => $user) {

        $k = $k + 1;
        
        $nicknames[] = [$k => $controller->nicknameFromId($user)[0]->nickname()];
    }

    echo json_encode($nicknames);
}