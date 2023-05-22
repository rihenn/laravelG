<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grup Arge · Profil</title>
    <link rel="icon" href="https://www.gruparge.com/wp-content/uploads/2022/07/grup-arge-favicon.png" type="image/png"
        sizes="32x32">
    <link rel="icon" href="https://www.gruparge.com/wp-content/uploads/2022/07/grup-arge-favicon.png"
        type="image/png" sizes="16x16">
    

   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        input {
            font-size: 14px;
            width: 100px
        }

        .input-n {
            font-size: 14px;
            width: 130px
        }

        .card-img-top {
            height: 400px;
            margin-top: 0px;
        }

        .card-no-border .card {
            border-color: #d7dfe3;
            border-radius: 20px;
            margin-bottom: 30px;
            -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05)
        }

        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem;

        }

        .pro-img {
            margin-top: -80px;
            margin-bottom: 20px
        }

        .little-profile .pro-img img {
            width: 128px;
            height: 128px;
            -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 100%
        }

        html body .m-b-0 {
            margin-bottom: 0px
        }


        h3 {

            font-size: 18px !important;
            color: #222831 !important;
        }

        .btn-rounded.btn-md {
            padding: 12px 35px;
            font-size: 16px
        }

        html body .m-t-10 {
            margin-top: 10px
        }



        .btn-rounded {
            border-radius: 60px;
            padding: 7px 18px
        }

        .m-t-20 {
            margin-top: 20px
        }

        .text-center {
            text-align: center !important
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #455a64;
            font-family: "Poppins", sans-serif;
            font-weight: 400
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        .card {
            /* Add shadows to create the "card" effect */
            box-shadow: 12px 12px 8px 0px rgba(43, 46, 50, 1);
            transition: 0.5s;

        }

        #box {

            border-radius: 4%;

        }

        #cardImg {
            border-radius: 6% 6% 0px 0px;

        }

        body {
            background-color: #393E46;
        }

        #btn {
            background-color: #2087cd;

            border: 1px solid #2087cd;
            font-size: 18px;
            font-family: "Gill Sans", sans-serif;
        }

        .card {
            background-color: #EEEEEE;
        }
    </style>



</head>

<body>

    <div class="d-flex justify-content-center m-t-20 col">
        <div class="d-flex" style="display: inline-block !important;">
            <a href="{{ route('anasayfa') }}"> <img src="../img/icons8-left-arrow-50.png" alt=""></a>

        </div>
        <div class="card col-7" id="box">

            <img id="cardImg" class="card-img-top rounded-pill" src="../img/photo-1497366754035-f200968a6e72.png"
                alt="Card image cap">
            <div class="card-body little-profile text-center">
                @foreach ($allData as $data)
                    <div class="pro-img"><img src={!! $data['profil'] !!} alt="user"></div>
                    <h3 class="m-b-0"> {!! $data['ad'] !!} </h3>
                    <p> {!! $data['görev'] !!} </p> <a id="btn" href="{{ route('düzenleme') }}"
                        class="m-t-10 waves-effect waves-dark btn text-light btn-md btn-rounded"
                        data-abc="true">Düzenle</a>
                    
                    <div class="row text-center m-t-20">
                        <div class="col-lg-4 col-md-4 m-t-20" style="right:10px">
                            <h3 class="m-b-0 font-light"> {!! $data['ad'] !!} </h3><small>ad soyad</small>
                        </div>
                        <div class="col-lg-5 col-md-5 m-t-20">
                            <h3 class="m-b-0 font-light"> {!! $data['mail'] !!} </h3><small>email</small>
                        </div>
                        <div class="col-lg-3 col-md-3 m-t-20">
                            <h4 class="m-b-0 font-light" style="color:#222831;"> {!! $data['tel'] !!} </h4>
                            <small>tel</small>
                        </div>
                    </div>
            </div>
            @endforeach


        </div>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#show").click(function() {
            $("#disp").toggle();
            $("$disp").value("gizle");
        });
    });

</script>

</html>
