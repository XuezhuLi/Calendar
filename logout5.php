<!DOCTYPE html>
<html>
    <head>
        <title>Logout</title>
    </head>
    <body>       
        <?php
            ini_set("session.cookie_httponly", 1);
            session_start();


            $previous_ua = @$_SESSION['useragent'];
            $current_ua = $_SERVER['HTTP_USER_AGENT'];

            if(isset($_SESSION['useragent']) && $previous_ua !== $current_ua){
                die("Session hijack detected");
            }else{
                $_SESSION['useragent'] = $current_ua;
            }
            
            session_destroy();
            header("Location: index5.html");
            //echo json_encode(array("logout" => true));
            exit;
        ?>
    </body>
</html>