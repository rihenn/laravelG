
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/datatables.min.js"></script>

    <style>
        #div2 {
            background-color: #393E46;
        }

        body {
            background-color: #e9e7e5;

        }

        #btn {
            background-color: #2087cd;
            color: white;
        }

        body {
            background-color: #1A1C20;

        }

        #btn {
            background-color: #2087cd;
            color: white;
        }

        .bg-custom-1 {
            background-color: #85144b;
        }

        .bg-custom-2 {
            background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
        }

        .card {
            width: 300px;

            margin: 20px;
            background-image: linear-gradient(163deg, #00ff75 0%, #3700ff 100%);
            border-radius: 20px;
            transition: all .3s;
            color: white;
        }

        .card1 {
            width: 300px;

            margin-left: 85px;
            background-image: linear-gradient(163deg, #00ff75 0%, #3700ff 100%);
            border-radius: 20px;
            transition: all .3s;
            color: white;
        }

        .card2 {


            padding: 15px;
            background-color: #1a1a1a;
            border-radius: 20px;
            transition: all .2s;
            display: inline-flex;
        }

        .card3 {


            padding: 15px;
            background-color: #1a1a1a;
            border-radius: 20px;
            transition: all .2s;
            display: inline-flex;
        }

        .card2:hover {
            transform: scale(0.98);
            border-radius: 20px;
        }
        .card1 {
            width: 300px;

            margin-left: 200px;
            background-image: linear-gradient(163deg, #00ff75 0%, #3700ff 100%);
            border-radius: 20px;
            transition: all .3s;
            color: white;
        }
        .card3:hover {
            transform: scale(0.98);
            border-radius: 20px;
        }

        .card:hover {
            box-shadow: 0px 0px 30px 1px rgba(0, 255, 117, 0.30);
        }

        .card1:hover {
            box-shadow: 0px 0px 30px 1px rgba(0, 255, 117, 0.30);
        }

        body {
            margin: 0px;
        }

        .Text {
            color: #00ffb7;
            font-family: 'Roboto', sans-serif;
        }

        #btn1 {

            background-color: #1a1a1a;
            border-radius: 20px;
            transition: all .2s;
            display: inline-flex;
            width: 292px;
        }

        #btn1 :hover {
            transform: scale(0.98);
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <nav id="div2" class="navbar navbar-expand" style="width:100%;">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav mr-auto">
                <li>
                    <img decoding="async" src="https://www.gruparge.com/wp-content/uploads/2022/07/grup-arge-logo-114-r-w.png" width="90px" data-lazy-src="https://www.gruparge.com/wp-content/uploads/2022/07/grup-arge-logo-114-r-w.png" data-ll-status="loaded" class="entered lazyloaded" style="margin-left:10px">
                </li>

                <li class="nav-item">
                    <a id="btn" class="btn mx-2 mt-2" href="/GIRISCIKIS/ders/admin/datatables.php">Ana Sayfa</a>
                </li>
                <li class="nav-item">
                    <a id="btn" class="btn mt-2" href="/GIRISCIKIS/ders/admin/excelDosyasıOkuma.php">Veri Ekleme</a>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle mt-2 mx-2" style=" background-color: #2087cd;color:white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown button
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/GIRISCIKIS/ders/admin/süreler.php">Günlük</a>
                            <a class="dropdown-item" href="/GIRISCIKIS/ders/admin/hsürler.php">Haftalık</a>
                        </div>
                    </div>
                </li>



                <div class="d-flex position-absolute top-0 end-0">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

            </ul>


    </nav>
    <form action="" method="post">
        <table style="margin-left:101.01px ;" class="flex mb-2 mr-2" cellspacing="5" cellpadding="5">
            <tbody>
                <tr>
                    <td style="color:white">Minimum date:</td>
                    <td><input class="date-picker form-control form-control-sm" type="date" id="min" name="min"></td>
                </tr>
                <tr>
                    <td style="color:white">Maximum date:</td>
                    <td><input class="form-control form-control-sm" type="date" id="max" name="max"></td>

                </tr>
                <tr>
                    <td style="color: white;">Kullanıcı</td>

                    <td>
                        <select name="kullad" id="cars">

                            
                        </select>
                    </td>
                </tr>
            </tbody>
            <?php echo '<h2  class="flex text-center Text">' . "Mesai Saati(" . ucwords(mb_strtolower("Yusuf Can Yüce" . " admin", 'UTF-8')) . ')</h2>'; ?>
        </table>

        <div class="flex card1"><input style="margin-left: 8px;background-color: #E2DED0;color:#4E4F50;" id="btn1" class="btn" type="submit" value="search"></div>





    </form>
   
   

        @section('body')
    
        {{$süre}}
        @endsection

     
    <div class="container">
        <div class="row justify-content-center">
           
           
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>