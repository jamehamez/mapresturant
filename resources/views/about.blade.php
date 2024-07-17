<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>เกี่ยวกับเรา</h1>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et saepe dicta atque omnis, illo incidunt laudantium ex porro voluptate, asperiores alias vitae aliquam nisi laboriosam. Nostrum obcaecati temporibus nihil harum!</p>
    <p>ที่อยู่ : {{$address}}</p>
    <p>เบอร์ติดต่อ : {{$tel}}</p>
    <p>email : {{$email}}</p>
    <a href="{{url('/')}}">Home</a>
    <a href="{{url('/admin')}}">Admin</a>
    <a href="{{url('/member')}}">Member</a>
    <a href="{{url('/about')}}">About</a>
</body>
</html>