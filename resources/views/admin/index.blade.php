<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $user="james";
    $arr = array("Home","Member","About","Contract")
    ?>
    <h1>Welcome to Website {{$user}}</h1>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et saepe dicta atque omnis, illo incidunt laudantium ex porro voluptate, asperiores alias vitae aliquam nisi laboriosam. Nostrum obcaecati temporibus nihil harum!</p>
    <h1>{{$user}}</h1>
    @if($user == "kongruksiam")
        <h1>ผู้ใช้ท่านนี้เป็นแอดมิน</h1>
    @else
        <h1>ผู้ใช้ท่านนี้ไม่ได้เป็นแอดมิน</h1>
    @endif

    @foreach($arr as $menu)
        <a href="">{{$menu}}</a>
    @endforeach

    <ul>
        @for($i=1;$i<=5;$i++)
            <li>{{$i}}</ul>
        @endfor
    </ul>
</body>
</html>