
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <title>anasayfa</title>
    <link rel="icon" href="https://www.gruparge.com/wp-content/uploads/2022/07/grup-arge-favicon.png" type="image/png"
        sizes="32x32">
    <link rel="icon" href="https://www.gruparge.com/wp-content/uploads/2022/07/grup-arge-favicon.png" type="image/png"
        sizes="16x16">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
    <style>
        #div1 {
            margin-left: 30px;
            margin-right: 30px;

        }

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
                    <a id="btn" class="btn mx-2 mt-2" href="{{route('anasayfa')}}">Ana Sayfa</a>
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
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                
                <div class="card">
                    <div class="card-header">
                            <h4>how to import excel data into database in php</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('excel')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="import_file" class="form-control">
                            <button class="btn btn-primary mt-3" name="save_excel_data">import</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>