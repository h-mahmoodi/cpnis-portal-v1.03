<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="text-align: center;background-color: #e5e5e5;">
    <div style="height: 100%;background-color: #ffffff;text-align: center;padding: 15px 15px;font-size: 16px;border-radius: 10px;margin: 20px auto;display: inline-block;border: 2px solid #dddddd;">
        <div style="font-size: 23px;font-weight: 700;padding: 10px;border-bottom: 2px solid #b3b3b3;margin: 0px 0px 25px 0px;color: #3c3c3c;">CPNIS Working Portal</div>
        <div style="padding: 10px 15px;background-color: #d13232;color: white;border-radius: 5px;margin: 10px 0px;">
            {{$reminder->getUser->name}} Has a New Reminder
        </div>
        <div style="padding: 5px;font-size: 17px;">{{$reminder->reminder_date}}</div>
        <div style="padding: 5px;font-size: 17px;"> {{$reminder->body}}</div>
        <a target="_blank" rel="noopener noreferrer" style="padding: 9px 10px;border-radius:5px;color:white;background-color: #3c3c3c;margin: 15px 0px;display: block;text-decoration: auto;font-size: 13px;" href="#">Go To Working Panel</a>
    </div>



</body>
</html>
