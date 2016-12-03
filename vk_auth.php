<?php
    session_start();

    $client_id = ''; // your_client_id
    $client_secret = ''; // your_secet_key
    $redirect_uri = ''; // redirect on your site
    $url = 'http://oauth.vk.com/authorize';

    $params = array(
        'client_id'     => $client_id,
        'redirect_uri'  => $redirect_uri
    );

    if (isset($_GET['code'])) {
        $result = false;
        $params = array(
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'code' => $_GET['code'],
            'redirect_uri' => $redirect_uri
        );

        $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

        if (isset($token['access_token'])) {
            $params = array(
                'uids'         => $token['user_id'],
                'fields'       => 'first_name,last_name',
                'access_token' => $token['access_token']
            );

            $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
                if (isset($userInfo['response'][0]['uid'])) {
                    $userInfo = $userInfo['response'][0];
                    $result = true;
                }
            }

            $name = $userInfo['first_name'];
            $last_name = $userInfo['last_name'];
            $_SESSION["name"] = $name;
            $_SESSION["last_name"] = $last_name;
}
?>