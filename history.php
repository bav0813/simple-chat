<?php
    /**
     * Created by PhpStorm.
     * User: andrey
     * Date: 25.02.18
     * Time: 21:10
     */



    $messages= file_get_contents('messages.txt');
    $newstr = str_replace("#*#_", "</div><div class='w3-panel w3-pale-green w3-round-xlarge'>", $messages);


?>



<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>
<?="<div class='w3-panel w3-pale-green w3-round-xlarge'>".$newstr;?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>setTimeout(function(){ window.location.reload(); }, 1500);</script>
</body>

