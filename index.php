<?php
header('Content-Type: application/json');

if(isset($_GET['user'])){
    $user = $_GET['user'];
    $details = get_userDetails($user);
    if(empty($details)){
        get_response(200,'user not found',null);
    }
    else{
        get_response(200,'user found',$details);
    }
}
else{
    get_response(400,"invalid",null);
}

function get_response($statusCode, $statusMessage, $data){
    $response['status'] = $statusCode;
    $response['statusMessage'] = $statusMessage;
    $response['data'] = $data;
    $jsonResponse = json_encode($response);
    echo $jsonResponse;
}

function get_userDetails($user){
    if(!empty($user)){
        $userDetails = array(
            'name'=>'Will Smith',
            'age'=>35
        );
        return $userDetails;
    }
    else{
        return null;
    }
}

?>