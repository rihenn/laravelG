<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil</title>
    <link rel="icon" href="https://www.gruparge.com/wp-content/uploads/2022/07/grup-arge-favicon.png" type="image/png"
        sizes="32x32">
    <link rel="icon" href="https://www.gruparge.com/wp-content/uploads/2022/07/grup-arge-favicon.png"
        type="image/png" sizes="16x16">
    <link rel="stylesheet" href="../css/profil.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        #div2 {
            background-color: #455a64;

        }

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
    <nav id="div2" class="navbar navbar-expand" style="width:100%;">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02"
            aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav mr-auto">
                <li>
                    <img decoding="async"
                        src="https://www.gruparge.com/wp-content/uploads/2022/07/grup-arge-logo-114-r-w.png"
                        width="90px"
                        data-lazy-src="https://www.gruparge.com/wp-content/uploads/2022/07/grup-arge-logo-114-r-w.png"
                        data-ll-status="loaded" class="entered lazyloaded" style="margin-left:10px">
                </li>

                <li class="nav-item">
                    <a id="btn" class="btn mx-2 mt-2" href="{{ route('anasayfa') }}">Ana Sayfa</a>
                </li>
                <li class="nav-item">
                    <a id="btn" class="btn mt-2" href="{{ route('excel') }}">Veri
                        Ekleme</a>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle mt-2 mx-2" style=" background-color: #2087cd;color:white"
                            type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Mesai Süresi
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('DayTime') }}">Günlük</a>
                            <a class="dropdown-item" href="{{ route('WeekWork') }}">Haftalık</a>
                        </div>
                    </div>
                </li>



                <div class="d-flex position-absolute top-0 end-0">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

            </ul>


    </nav>
    <div class="container" style="background-color: #dadee0">
        <div class="" style="display:-ms-inline-flexbox">
            <form action="{{ route('data') }}" method="post">
                @csrf
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle m-2" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Database Yazdır
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                        @foreach ($cihazAllData as $data)
                            <button type="submit" class="btn d-block" name="cihazId"
                                value="{{ $data['id'] }}">{{ $data['cihazname'] }}</button>
                        @endforeach

                    </div>
                </div>
            </form>

            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle m-2" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Users Yazdır
                </button>
                <form action="{{ route('UserData') }}" method="get">
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                        @foreach ($cihazAllData as $data)
                            <button type="submit" class="btn d-block" name="sırala"
                                value="{{ $data['id'] }}">{{ $data['cihazname'] }}</button>
                        @endforeach

                    </div>
                </form>
            </div>
            <div class="d-flex" style="justify-content: right">
                <h2>  {{$cihazname}} </h2>
               
               </div>
    
       
                
            
        </div>
        
        <div class="d-flex justify-content-center">
            <div class="row col-12 w-70">
                <div class="d-flex justify-content-center col">
                    <table class="table bg-white table-responsive-sm" id="disp">
                        <thead>
                            <tr>
                                <th scope="col">UID</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Role</th>
                                <th scope="col">Password</th>
                                <th scope="col">Card No</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach ($users as $user)
                                <form action="{{ route('güncelle') }}" method="post">
                                    @csrf
                                    
                                    <tr>
                                        
                                        <input type="hidden" name="Cid" value={{$Cihazid}}>
                                        <td><input type="text" name="uid" class="border-0"
                                                value="{{ $user['uid'] }}">
                                        </td>
                                        <td><input type="text" name="id" class="border-0"
                                                value="{{ $user['userid'] }}">
                                        </td>
                                        <td><input type="text" name="name" class="border-0 input-n"
                                                maxlength="24" value="{{ $user['name'] }}"></td>
                                        <td><input type="text" name="role" class="border-0"
                                                value="{{ $user['role'] }}">
                                        </td>
                                        <td><input type="text" name="password" class="border-0"
                                                value="{{ $user['password'] }}"></td>
                                        <td><input type="text" name="CardNo" class="border-0"
                                                value="{{ $user['cardno'] }}"></td>
                                        <td><input type="submit" class="btn btn-primary" value="Kaydet"></td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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

</html>
