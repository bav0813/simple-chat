<?php
    /**
     * Created by PhpStorm.
     * User: andrey
     * Date: 22.02.18
     * Time: 20:14
     */

    /*Создайте страницу index.php по типу скриншота с помощью http://www.layoutit.com/

    В центре разместите iframe, в который будет загружен файл history.php - собственно, лента сообщений;
    получайте ленту с помощью  file_get_contents() из файла messages.txt

    Под лентой сделайте форму, которая отправляется на index.php методом POST. Должны быть поля login,
    message (textarea)
    При получении POST запроса в index.php должна производиться запись в файл, например
    file_put_contents('messages.txt', $message, FILE_APPEND | LOCK_EX); - это добавление сообщения в
    конец файла и блокировка файла на время записи (ведь может быть параллельно много сообщений)
    Вы должны записывать информацию в файл таким образом, чтобы можно было отделить одно сообщение от
     другого (нужен разделитель); учитывать, что в сообщениях могут быть переносы строк; учитывать
     спецсимволы, теги <script>... (надо использовать htmlspecialchars() и тд)
    Каждое сообщение должно выглядеть так: "11 Nov 2018 TestUser Это тестовое сообщение"; каждое сообщение
    - это отдельный div (можно с классами alert, panel и тд); используйте функцию date()
    http://php.net/manual/en/function.date.php

    Для того, чтобы история чата перезагружалась каждые 1.5 секунды, добавьте в конец файла history.php JS код
    <script>setTimeout(function(){ window.location.reload(); }, 1500);</script>

    Проверьте, что вы корректно обрабатываете специальные символы - вставьте этот код
    <script>alert('Этот код обработан?');</script> в поле сообщения и отправьте его; при
     правильном решении, вы должны просто увидеть этот же код в списке сообщений, и не получите сообщения в браузере
    Добавьте статистику по кол-ву сообщений внизу страницы  */

    header('Content-Type: text/html; charset=utf-8');


    if (isset($_POST['username'])&&isset($_POST['message'])) {

        //#*#_ - признак конца сообщения
        $chat_message=htmlspecialchars($_POST['username'].':  '.$_POST['message']);
        $chat_message=date('d F Y'). '  '.$chat_message.'#*#_';
        file_put_contents('messages.txt',$chat_message,FILE_APPEND | LOCK_EX);

    }



?>


<!doctype html>
<html>
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="main.css">


</head>
<body>


<nav class="navbar navbar-default"">
<div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">
            <img src="1_Primary_logo_on_transparent_187x69-2.png">
        </a>
    </div>
</div>
</nav>


<form method="POST" action="">

    <div class="form-group">


        <iframe width="640" height="315" src="history.php" frameborder="1" allowfullscreen></iframe>
    </div>

    <div class="form-group1">
        <input type="text" class="form-control" id="InputName" name="username" placeholder="name" value="" required>
    </div>

    <div class="form-group2">
        <input type="text" class="form-control" id="Text1" name="message" rows="3" value="" placeholder="message" required>
    </div>
    <button type="submit" class="btn btn-primary">send</button>


</form>




</form>
</body>


