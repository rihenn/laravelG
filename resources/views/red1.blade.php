<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>güncelle</title>
    <link rel="icon" href="https://www.gruparge.com/wp-content/uploads/2022/07/grup-arge-favicon.png" type="image/png" sizes="32x32">
  <link rel="icon" href="https://www.gruparge.com/wp-content/uploads/2022/07/grup-arge-favicon.png" type="image/png" sizes="16x16">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="./css/main.css">
    <style>
        .wrapper.fadeInDown {
            background-color: #222831;
        }

        body {
            background-color: #222831;
        }
    </style>
</head>

<body>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div id="formIcon" style="background-color: #f6f6f6;-webkit-border-radius:10px 10px 0 0 ;border-radius:10px 10px 0 0 ;" class="fadeIn first">
            <img src="https://www.gruparge.com/wp-content/uploads/2022/07/grup-arge-logo-44.png" id="icon" alt="User Icon" style="height: 55px;width: auto;"/>
            </div>
            
            <!-- Login Form -->
            <form action="{{route("login")}}" style="background-color: white;height:  auto;margin:0;" method="GET">
            <div id="formIcon" style="background-color: #f6f6f6;-webkit-border-radius:10px 10px 0 0 ;border-radius:10px 10px 0 0 ;" class="fadeIn first">
                <img src="./img/icons8-xbox-x-100.png" id="icon" alt="User Icon" />
            </div>
                <h3>işleminiz gerçekleştirilemedi</h3>
                <p>her linkten sadece bir kez şifre değiştiriebilirsiniz</p>
                
                <input type="submit" class="fadeIn fourth butn" value="GİRİŞ" style=" background-color:#00ADB5;">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter" style="margin:0px;background-color:f6f6f6 !important;">
            </div>
           
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   
</body>

</html>