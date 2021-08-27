<?php ob_start(); 
$conn =new mysqli('localhost', 'username', 'password' , 'db');
        
        if ($conn->connect_error) {
            echo "<b>Error:</b> Connection failed - $conn->connect_error";
        }


     
     session_start();
     ob_start();
     date_default_timezone_set("Africa/Lagos");   
     
    $date = date('Y-m-d H:i:s');

    

    function encode_txt( $q ) {
        $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
        return( $qEncoded );
    }
    
    function format_date($date){
        return date('D, M jS Y', strtotime($date));
    }
    
    function format_date2($date){
        return date('H:i A', strtotime($date));
    }



?>
