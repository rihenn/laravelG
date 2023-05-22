<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>düzenle</title>
    <link data-n-head="ssr" rel="icon" type="image/png" size="32" data-hid="favicon-32"
        href="../img/icons8-monkey-32.png">
    <link rel="stylesheet" href="../css/düzenle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding-top: 40px;
            color: #393E46;
            background-color: #393E46;
            position: relative;
            height: 100%;
        }

        .account-settings .user-profile {
            margin: 0 0 1rem 0;
            padding-bottom: 1rem;
            text-align: center;
        }

        .account-settings .user-profile .user-avatar {
            margin: 0 0 1rem 0;
        }

        .account-settings .user-profile .user-avatar img {
            width: 90px;
            height: 90px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
        }

        .account-settings .user-profile h5.user-name {
            margin: 0 0 0.5rem 0;
        }

        .account-settings .user-profile h6.user-email {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 400;
            color: #9fa8b9;
        }

        .account-settings .about {
            margin: 2rem 0 0 0;
            text-align: center;
        }

        .account-settings .about h5 {
            margin: 0 0 15px 0;
            color: #007ae1;
        }

        .account-settings .about p {
            font-size: 0.825rem;
        }

        .form-control {
            border: 1px solid #cfd1d8;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            font-size: .825rem;
            background: #ffffff;
            color: #2e323c;
        }

        .card {

            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }


        .imgp {
            border: 0px;
        }

        .card {
            background-color: EEEEEE;
            box-shadow: 20px 20px 8px 0px rgba(43, 46, 50, 1);
            transition: 0.5s;

        }

        #submit {
            background-color: #393E46;
            color: white;
        }

        #submit1 {
            background-color: #2087cd;
            color: white;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f0f0f0;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="d-flex align-items-center mt-5">
            <div class="row ">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <form action="{{ route('imggüncelle') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="account-settings">
                                    <div class="user-profile">
                                        <div class="user-avatar dropdown">
                                            <img src="{!! $profilurl !!}" alt="Maxwell Admin">
                                            <div class="dropdown-content">

                                                <button type="submit" id="img1" class="imgp" name="img1" value="1"><img
                                                        src="../img/icons8-person-female-skin-type-1-and-2-80.png"
                                                        alt="" srcset=""></button>

                                                <button type="submit"id="img2" class="imgp" name="img5" value="1"> <img
                                                        src="../img/icons8-person-female-skin-type-5-80.png"
                                                        alt="" srcset="" ></button>

                                                <button type="submit" id="img3" class="imgp" name="img2" value="1"> <img
                                                        src="../img/icons8-person-male-skin-type-6-80.png"
                                                        alt="" srcset="" ></button>

                                                <button type="submit" id="img4" class="imgp" name="img3" value="1"> <img
                                                        src="../img/icons8-person-male-skin-type-4-80.png"
                                                        alt="" srcset="" ></button>
                                                <button type="submit" id="img5" class="imgp" name="img4" value="1"> <img
                                                        src="../img/icons8-person-male-skin-type-3-80.png"
                                                        alt="" srcset="" ></button>
                                            </div>
                                        </div>
                                        <h5 class="user-name">{!! $name !!}</h5>
                                        <h6 class="user-email">{!! $mail !!}</h6>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">

                <div class="card h-100">
                    <form action="{{ route('güncelle') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mb-2 text-primary">Profil Düzenle</h6>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="fullName">Ad Soyad</label>
                                            <input type="text" class="form-control" id="fullName"
                                                placeholder="Ad Soyad Giriniz" name="ad_soyad" value="{!! $name !!}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="eMail">Email</label>
                                            <input type="email" class="form-control" id="eMail"
                                                placeholder="Email Giriniz" name="gmail" value="{!! $mail !!}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="phone">Tel no</label>
                                            <input type="text" class="form-control" id="phone"
                                                placeholder="Telefon Numarası Giriniz" name="tel" value="{!! $tel !!}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Görev</label>
                                            <input class="form-control" id="website" placeholder="Görev Giriniz"
                                                name="görev" value="{!! $görev !!}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right">
                                            <a id="submit" name="submit" class="btn" href="{{route('ProfilController')}}">Geri
                                                Dön</a>

                                            <button type="submit1" name="submit" class="btn btn-primary">Güncelle</button>

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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>
