
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>

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