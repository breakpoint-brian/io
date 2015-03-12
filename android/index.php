<?php
/**
 * File to handle all API requests
 * Accepts GET and POST
 * 
 * Each request will be identified by TAG
 * Response will be JSON data
 
  /**
 * check for POST request 
 */
if (isset($_POST['tag']) && $_POST['tag'] != '') {
    // get tag
    $tag = $_POST['tag'];
 
    // include db handler
    require_once 'include/DB_Functions.php';
    $db = new DB_Functions();
 
    // response Array
    $response = array("tag" => $tag, "success" => 0, "error" => 0);
 
    // check for tag type
    if ($tag == 'login') {
        // Request type is check Login
        $email = $_POST['user_name'];
        $password = $_POST['password'];
 
        // check for user
        $user = $db->getUserByUsernameAndPassword($user_name, $password);
        if ($user != false) {
            // user found
            // echo json with success = 1
            $response["success"] = 1;
            $response["uid"] = $user["uuid"];
            $response["user"]["id"] = $user["id"];
            $response["user"]["first_name"] = $user["first_name"];
            $response["user"]["last_name"] = $user["last_name"];
            $response["user"]["email"] = $user["email"];
            $response["user"]["register_date"] = $user["register_date"];
            echo json_encode($response);
        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = 1;
            $response["error_msg"] = "Incorrect email or password!";
            echo json_encode($response);
        }
    } else if ($tag == 'register') {
        // Request type is Register new user
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
 
        // check if user is already existed
        if ($db->doesUserExist($user_name)) {
            // user is already existed - error response
            $response["error"] = 2;
            $response["error_msg"] = "User already existed";
            echo json_encode($response);
        } else {
            // store user
            $user = $db->storeUser($first_name, $last_name, $email, $user_name, $password);
            if ($user) {
                // user stored successfully
                $response["success"] = 1;
                $response["uid"] = $user["uuid"];
                $response["user"]["id"] = $user["id"];
                $response["user"]["first_name"] = $user["first_name"];
                $response["user"]["last_name"] = $user["last_name"];
                $response["user"]["email"] = $user["email"];
                $response["user"]["user_name"] = $user["user_name"];
                $response["user"]["register_date"] = $user["register_date"];
                echo json_encode($response);
            } else {
                // user failed to store
                $response["error"] = 1;
                $response["error_msg"] = "Error occured during Registration";
                echo json_encode($response);
            }
        }
    } else {
        echo "Invalid Request";
    }
} else {
    echo "Access Denied";
}
?>