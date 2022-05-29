<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notify eMPALS Communities</title>
</head>
<body style="background:#eee;">
<div style="text-align: center;">
    <img src="{{ asset('images/logo-mpals.png')}}" height="30" width="30"   alt="eMPALS logo">
</div>
<p style="letter-spacing:1px; text-align: center;"> <b> Ethiopian Missing Person Announcement and Locating System (<span style="color:red; font-weight:600;" >eMPALS</span>) </b> </p>

<h2 style="text-align: center;" > Hello Everyone:</h2>


<h3 style="text-align: center; "> The Person <span style="color:red; font-weight:600;" > {{ $mailData['fname'] }} {{ $mailData['mname'] }} </span> is  {{ $mailData['person'] }}</h3>
<p style="text-align: center;" > For More Info:<a href="{{ $mailData['link'] }}">Click Here</a> </p>

<br><br>
<p style="text-align: center;" > Thank You for your Support!</p>

</body>
</html>

