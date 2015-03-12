<?php
 
class DB_Functions {
 
    private $db;
    
    // constructor
    function __construct() {
        require_once 'connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }
 
    // destructor
    function __destruct() {
         
    }
 
    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($first_name, $last_name, $email, $user_name, $password) {
        $uuid = uniqid('', true);
        $salt_pass = password_hash($pass, PASSWORD_BCRYPT, array('cost' => 10));
        
        $result = mysql_query("INSERT INTO registered_users(uuid, first_name, last_name, email, user_name, password,
        		 registered_date) VALUES('$uuid', '$first_name', '$last_name', '$email', '$salt_pass', NOW())");
        // check for successful store
        if ($result) {
            // get user details 
            $uid = mysqli_insert_id(); // last inserted id
            $result = mysqli_query("SELECT * FROM registered_users WHERE uid = $uid");
            // return user details
            return mysqli_fetch_array($result);
        } else {
            return false;
        }
    }
 
    /**
     * Get user by email and password
     */
    public function getUserByUsernameAndPassword($user_name, $password) {
        $result = mysql_query("SELECT * FROM registered_users WHERE user_name = '$user_name'") or die(mysqli_error());
        // check for result 
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
            $result = mysqli_fetch_array($result);
            $pass = $row['password'];
            // check for password equality
            if (password_verify($password, $pass)) {
                // user authentication details are correct
                return $result;
            }
        } else {
            // user not found
            return false;
        }
    }
 
    /**
     * Check user is existed or not
     */
    public function doesUserExist($user_name) {
        $result = mysqli_query("SELECT user_name FROM registered_users WHERE user_name = '$user_name'");
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
            // user exists 
            return true;
        } else {
            // user does not exist
            return false;
        }
    }
 
    /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     */
    public function hashSSHA($password) {
 
        $salt_pass = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
        return $salt_pass;
    }
}
 
?>