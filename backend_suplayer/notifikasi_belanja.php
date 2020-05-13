<?php
    $token= $_POST['token'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    $url = "https://fcm.googleapis.com/fcm/send";
    //$topic = "/topics/$user";
    //replace serverkey with your firebase console project server key
    $serverKey = "AAAAwyhK9zs:APA91bFnzg6f-NU5f1SvNETqUFvEnX251q3EdR98C36qMLyXy4izIu7XH500lf4WdhiG7jUgbRt6rBZcNuYTSMHxJmB5zeo1UBbg-HdtQq6WWmdnGId1QDk5WLBpO6XEyQnYgHbUCjYA";
    //$body = '$_POST['body']';
  //  $intent_filter=$action;
    $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
    $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
    $json = json_encode($arrayToSend);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key='. $serverKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    //Send the request
    $response = curl_exec($ch);
    //Close request
    if ($response === FALSE) {
    die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);
?>