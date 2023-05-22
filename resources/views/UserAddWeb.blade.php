<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grup Arge · Kullanıcı Ekle Web</title>
    <link rel="icon" href="https://www.gruparge.com/wp-content/uploads/2022/07/grup-arge-favicon.png" type="image/png"
    sizes="32x32">
<link rel="icon" href="https://www.gruparge.com/wp-content/uploads/2022/07/grup-arge-favicon.png"
    type="image/png" sizes="16x16">
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
                    <a  class="btn mx-2 mt-2 btn-primary text-white" href="{{ route('anasayfa') }}">Ana Sayfa</a>
                </li>
                 <li class="nav-item">
                   <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle mt-2 mx-2" 
                            type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('UserData') }}">kullanıcılar</a>
                            <a class="dropdown-item" href="{{ route('timeData') }}">kullanıcılar Mesai</a>
                            <a class="dropdown-item" href="{{ route('webadduser') }}">Kullanıcı Ekle (web)</a>
                            <a class="dropdown-item" href="{{ route('userUpdate') }}">Kullanıcı Ekle (Cihaz)</a>
                            <a class="dropdown-item" href="{{ route('deviceData') }}">Cihazlar</a>
                            <a class="dropdown-item" href="{{ route('DiveceAdd') }}">Cihaz Ekle</a>
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
    <div class="container">
        <div class="d-flex align-items-center mt-5">
            <div class="row">
              
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">

                <div class="card h-100">
                    @if(Session::has('message'))
                                {!! Session::get('message') !!}
                            @endif
                    <form action="{{ route('addUserWeb') }}" method="post">
                            @csrf
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Kullanıcı Ekle</h6>
                            </div>
                            <div>
                               
                             
                           
                            <div class="card-body">
                                <div class="row gutters">
                                    
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="phone">Name Surname</label>
                                            <input type="text" class="form-control" id="cihazname"
                                                placeholder="Ad Soyad Giriniz" name="name" >
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Mail</label>
                                            <input type="email" class="form-control" id="mail" placeholder="Mail Giriniz"
                                                name="mail">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Tel No</label>
                                            <input class="form-control" id="tel" placeholder="Tel Giriniz"
                                                name="tel">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Kart No</label>
                                            <input class="form-control" id="carno" placeholder="Kart no Giriniz"
                                                name="cardno">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Kullanıcı Adı</label>
                                            <input class="form-control" id="kulad" placeholder="Şifre Giriniz"
                                                name="kulad">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Şifre</label>
                                            <input type="password" class="form-control" id="password" placeholder="Şifre Giriniz"
                                                name="password">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Tekrar Şifre</label>
                                            <input type="password" class="form-control" id="passwordt" placeholder="Tekrar Şifre Giriniz"
                                                name="passwordt">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Görev</label>
                                            <input class="form-control" id="görev" placeholder="Görevinizi Giriniz"
                                                name="görev">
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <input type="checkbox" style="height: 12px" name="admin"  value="1"><label for="adminlik">adminlik</label> 
                                        <div class="text-right">
                                           
                                            
                                            <button type="submit" name="submit" class="btn btn-primary">Ekle</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
</body>

</html>
