<?php
$email = 'admin@gmail.com';
$password = 'admin';
$xml2 = simplexml_load_file('login.xml');
foreach($xml2->user as $user) { // for every user node
    if($user->email == $email && $user->password == $password) {
        echo 'Yahoo';
    }
}

?>