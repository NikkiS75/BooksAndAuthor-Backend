<?php
require "connect.php";
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

    if(isset($postdata) && !empty($postdata))
    {

    $login= mysqli_real_escape_string($con, trim($request->data->login));
    $password = mysqli_real_escape_string($con, trim($request->data->password));

	$sql = "SELECT * FROM users WHERE userLogin='{$login}'";

    $result = mysqli_query($con,$sql);
    $user = mysqli_fetch_assoc($result);

    $message = '';
    if (!empty($user)) {
    	$salt = $user['salt'];
    	$saltedPassword = md5($password.$salt);
    	if ($user['userPassword'] == $saltedPassword) {
    				setcookie ("login", $user['userLogin'], time() + 40000);
                    setcookie ("password", md5($user['userPassword'].$user['salt']), time() + 40000);
                    $_SESSION['id'] = $user['userID'];
    				$message = 'Успешно!';
                echo json_encode(['data' => $message]);
    			}
    			else
    			{
    			    $message = 'Неверный пароль';
    				echo json_encode(['data' => $message]);
    			}
    		}
    		else
    		{
    		        $message = 'Неверный логин';
                    echo json_encode(['data' => $message]);
    		}
    	}
?>



