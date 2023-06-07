<html>

<head>


    <title>anasayfa</title>
    <link rel="icon" href="https://www.gruparge.com/wp-content/uploads/2022/07/grup-arge-favicon.png" type="image/png"
        sizes="32x32">
    <link rel="icon" href="https://www.gruparge.com/wp-content/uploads/2022/07/grup-arge-favicon.png" type="image/png"
        sizes="16x16">



    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.4.1/css/dataTables.dateTime.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
    <style>
        #modalOverlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            display: none;
        }

        #modalCard {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            z-index: 10000;
        }

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

        .bg-custom-1 {
            background-color: #85144b;

        }

        .bg-custom-2 {
            background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
        }

        .three-body {
            --uib-size: 35px;
            --uib-speed: 0.8s;
            --uib-color: #5D3FD3;
            position: relative;
            display: inline-block;
            height: var(--uib-size);
            width: var(--uib-size);
            animation: spin78236 calc(var(--uib-speed) * 2.5) infinite linear;
        }

        .three-body__dot {
            position: absolute;
            height: 100%;
            width: 30%;
        }

        .three-body__dot:after {
            content: '';
            position: absolute;
            height: 0%;
            width: 100%;
            padding-bottom: 100%;
            background-color: var(--uib-color);
            border-radius: 50%;
        }

        .three-body__dot:nth-child(1) {
            bottom: 5%;
            left: 0;
            transform: rotate(60deg);
            transform-origin: 50% 85%;
        }

        .three-body__dot:nth-child(1)::after {
            bottom: 0;
            left: 0;
            animation: wobble1 var(--uib-speed) infinite ease-in-out;
            animation-delay: calc(var(--uib-speed) * -0.3);
        }

        .three-body__dot:nth-child(2) {
            bottom: 5%;
            right: 0;
            transform: rotate(-60deg);
            transform-origin: 50% 85%;
        }

        .three-body__dot:nth-child(2)::after {
            bottom: 0;
            left: 0;
            animation: wobble1 var(--uib-speed) infinite calc(var(--uib-speed) * -0.15) ease-in-out;
        }

        .three-body__dot:nth-child(3) {
            bottom: -5%;
            left: 0;
            transform: translateX(116.666%);
        }

        .three-body__dot:nth-child(3)::after {
            top: 0;
            left: 0;
            animation: wobble2 var(--uib-speed) infinite ease-in-out;
        }

        @keyframes spin78236 {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes wobble1 {

            0%,
            100% {
                transform: translateY(0%) scale(1);
                opacity: 1;
            }

            50% {
                transform: translateY(-66%) scale(0.65);
                opacity: 0.8;
            }
        }

        @keyframes wobble2 {

            0%,
            100% {
                transform: translateY(0%) scale(1);
                opacity: 1;
            }

            50% {
                transform: translateY(66%) scale(0.65);
                opacity: 0.8;
            }
        }
    </style>
</head>

<body>
    <nav id="div2" class="navbar navbar-expand mb-4" style="width:100%;">

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
                    </a>
                </li>




                <li>
                    @if (session('adminlik') == 1)
                        <div class="dropdown">
                            <button class="btn dropdown-toggle mt-2 mx-2 btn-primary text-white" type="button"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Admin
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('UserData') }}">kullanıcılar</a>
                                <a class="dropdown-item" href="{{ route('timeData') }}">kullanıcılar Mesai</a>
                                <a class="dropdown-item" href="{{ route('webadduser') }}">Kullanıcı Ekle (web)</a>
                                <a class="dropdown-item" href="{{ route('userUpdate') }}">Kullanıcı Ekle (Cihaz)</a>
                                <a class="dropdown-item" href="{{ route('deviceSelect') }}">Cihaz Seç</a>
                                <a class="dropdown-item" href="{{ route('DiveceAdd') }}">Cihaz Ekle</a> 
                            </div>
                        </div>
                    @endif
                </li>





                <div class="d-flex position-absolute top-0 end-0">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div style="margin-right: 25px;margin-top:7px;" class="collapse navbar-collapse" id="navbar-list-4">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a style="color: #2087cd;" class="nav-link dropdown-toggle" href="#"
                                    id="navbarDropdownMenuLink" role="button" aria-haspopup="true"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{!! $profilurl !!}" width="40" height="40"
                                        class="rounded-circle">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('ProfilController') }}">profil</a>

                                    <a class="dropdown-item" href="{{ route('cikis') }}">çıkış yap</a>
                                </div>
                            </li>
                        </ul>
                    </div>
            </ul>


    </nav>
    <form id="detayform" action="{{ route('detaylar') }}" method="post" class="d-none">
        @csrf
        @if (isset($id))
        <input type="hidden" name="idDetay" value="{{ $id }}">
        @endif

    </form>
    <div class="container">

        @if (session('adminlik') == 1)


            <div class="container w-50">
                @if (isset($mesaj))
                    {!! $mesaj !!}
                @endif
                <button class="btn btn-primary" id="openModalButton" data-toggle="collapse"
                    data-target="#myCard">Kullanıcı Ara</button>

                <div id="modalOverlay">
                    <div id="modalCard" class="card">
                        <a id="closeModalButton" class="text-end">
                            <img src="../img/icons8-x-30.png" style="height:1.5rem ;width:1.5rem"
                                class="text-end"></a>
                        <form action="{{ route('anasayfa') }}" method="get">
                            <div class="form-group m-3">
                                <label for="inputEmail">id</label>
                                <input type="text" class="form-control" name="id" placeholder="id">
                            </div>
                            <div class="form-group">




                                <div class="form-group m-3">
                                    <label for="inputName">Ad Soyad</label>
                                    <select class="form-control" name="nameSurname" id="inputList">
                                        
                                        <option value=""></option> 
                                        @if (isset($namelist))
                                            @foreach ($namelist as $data)
                                                @if (isset($data['name']))
                                                
                                                    <option value="{{ $data['personID'] }}">{{ $data['name'] }}</option>    
                                                @endif
                            
                                            @endforeach
                                        @endif
                                    </select>
    </div>
    </div>
    <div class="form-group m-3">
        <label for="inputEmail">Kart Numarası</label>
        <input type="text" class="form-control" name="cardNo" placeholder="Kart Numarası">
    </div>
    <input type="submit" class="btn btn-primary mx-3 mb-2" name="search" value="Ara">

    </form>
    </div>
    </div>
    </div>
    @endif

    @php
        
     
    @endphp

    <form action="{{ route('anasayfa') }}" method="get">
        @if (isset($_GET["search"]))
            <input type="text" name="ay" value="{{ $ay }}" hidden>
            <input type="text" name="yil" value="{{ $yil }}" hidden>

            @csrf
            @if (isset($id))
            <input type="hidden" name="idDetay" value="{{ $id }}">
            @endif

            <input type="hidden" name="nameSurname" id="nameSurname" value="">
            <input type="hidden" name="cardNo" id="cardNo" value="">
            <input type="hidden" name="search" id="search" value="">

            <input type="submit" class="btn btn-primary" name="önce" value="Önceki">
            <input type="submit" class="btn btn-primary" name="bu_ay" value="Bu ay">
            <input type="submit" class="btn btn-primary" name="sonra" value="Sonraki">
        @endif


    </form>


    <table id="users-table" class="display">

    </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>


    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

    <script>
        $(function() {
            let data = {!! json_encode($namelist) !!};
            console.log(data);
            if(typeof namelist == 'null'){
                $("#openModalButton").click(function(){
                    alert("kullanlar bulunmamaktadır mesai sürelerini database  yazdırırnız");
                    this.off("click");
                })
            }
            
            let usersalert ={!! json_encode(session('userAlert')) !!}
   
           
            if(usersalert == true){       
                 usersalert=false;
                alert("Cihaz bulunmamaktadır önce cihaz ekle sayfasından cihaz ekleyiniz");
            }
            let ConnectError ={!! json_encode(session('ConnectError')) !!}
   
           
            if(ConnectError == true){       
                ConnectError=false;
                alert("İp ve ya Port'unuz hatalıdır lütfen düzenleyiniz");
            }
            let TimeDataAlert ={!! json_encode(session('TimedataAlert')) !!}
       
           
            if(TimeDataAlert == true){       
                TimeDataAlert=false;
                alert("Cihaz bulunmamaktadır önce cihaz ekle sayfasından cihaz ekleyiniz");
            }
            let AddUserAlert ={!! json_encode(session('AddUserAlert')) !!}
   
           
            if(AddUserAlert == true){       
                AddUserAlert=false;
                alert("Cihaz bulunmamaktadır önce cihaz ekle sayfasından cihaz ekleyiniz");
            }



            var currentUrl = window.location.href;
            var urlParams = new URLSearchParams(currentUrl);

            $('#id').val(urlParams.get('id') || '');
            $('#nameSurname').val(urlParams.get('nameSurname') || '');
            $('#cardNo').val(urlParams.get('cardNo') || '');
            $('#search').val(urlParams.get('search') || '');



            $(document).ready(function() {
                $("#openModalButton").click(function() {
                    $("#modalOverlay").fadeIn();
                });

                $("#closeModalButton").click(function() {
                    $("#modalOverlay").fadeOut();
                });
            });
            $("#closeModalButton, #modalOverlay").click(function(event) {
                if (event.target.id === "modalOverlay" || event.target.id === "closeModalButton") {
                    $("#modalOverlay").fadeOut();
                }
            });

            let mydata = {!! json_encode($veri[0]) !!};

            datatableData = [];
            Object.keys(mydata).forEach(function(key) {
                datatableData.push(mydata[key]);
            });
            console.log(datatableData);
            $('#users-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf'
                ],
                data: datatableData,
                columns: [

                    {
                        data: function(data, type) {
                            if (type == 'display') {
                                return `<input type='text' name='adSoyad' style=' pointer-events: none;border:none; background-color: rgba(0, 0, 0, 0);' value='${data.ad_soyad}' disable> `

                            } else {

                                return data.ad_soyad
                            }
                        },
                        title: 'ad soyad'
                    },
                    {
                        data: function(data, type) {
                            if (type == 'display') {
                                return `<input type='text' name='tarih' style=' pointer-events: none;border:none; background-color: rgba(0, 0, 0, 0);' value='${data.trh}' disable> `

                            } else {

                                return data.trh
                            }
                        },
                       
                        title: 'tarih'
                    },

                    {
                        data: function(data, type) {
                            if (type == 'display') {
                                return `<input type='text' name='girist' style=' pointer-events: none;border:none; background-color: rgba(0, 0, 0, 0);' value='${data.giris}' disable> `

                            } else {

                                return data.giris
                            }
                        },
             
                        title: 'Giriş'
                    },
                    {
                        data: function(data, type) {
                            if (type == 'display') {
                                return `<input type='text' name='cikist' style=' pointer-events: none;border:none; background-color: rgba(0, 0, 0, 0);' value='${data.cikis}' disable> `

                            } else {

                                return data.cikis
                            }
                        },
                    
                        title: 'Çıkış'
                    },
                    {
                        data: function(data, type) {
                            if (type == 'display') {
                                return `<input type='text' name='mesaiS' style='background-color: rgba(0, 0, 0, 0);pointer-events: none;border:none; ' value='${data.mesaiSüresi}' disable> `

                            } else {

                                return data.mesaiSüresi
                            }
                        },
             
                        title: 'Mesai'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            if (type === 'display') {
                                return `<input type="button" id= "btn-detay" name="btn-d" class="btn btn-primary btn-d" value="detay...">
								`;
                            }
                            return data;
                        },
                        title: "eylemler"
                    },

                ],
                language: {
                    "emptyTable": "Bu ay giriş çıkış bulunmamaktadır",
                    "info": "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                    "infoEmpty": "Kayıt yok",
                    "infoFiltered": "(_MAX_ kayıt içerisinden bulunan)",
                    "infoThousands": ".",
                    "lengthMenu": "Sayfada _MENU_ kayıt göster",
                    "loadingRecords": '\n<div class="three-body"><div class="three-body__dot"></div><div class="three-body__dot"></div><div class="three-body__dot"></div></div>\n\n',

                    "processing": '\n<div class="three-body"><div class="three-body__dot"></div><div class="three-body__dot"></div><div class="three-body__dot"></div></div>\n\n',
                    "search": "Ara:",
                    "zeroRecords": "Eşleşen kayıt bulunamadı",
                    "paginate": {
                        "first": "İlk",
                        "last": "Son",
                        "next": "Sonraki",
                        "previous": "Önceki"
                    },
                    "aria": {
                        "sortAscending": ": artan sütun sıralamasını aktifleştir",
                        "sortDescending": ": azalan sütun sıralamasını aktifleştir"
                    },
                    "select": {
                        "rows": {
                            "_": "%d kayıt seçildi",
                            "1": "1 kayıt seçildi"
                        },
                        "cells": {
                            "1": "1 hücre seçildi",
                            "_": "%d hücre seçildi"
                        },
                        "columns": {
                            "1": "1 sütun seçildi",
                            "_": "%d sütun seçildi"
                        }
                    },
                    "autoFill": {
                        "cancel": "İptal",
                        "fillHorizontal": "Hücreleri yatay olarak doldur",
                        "fillVertical": "Hücreleri dikey olarak doldur",
                        "fill": "Bütün hücreleri <i>%d<\/i> ile doldur"
                    },
                    "buttons": {
                        "collection": "Koleksiyon <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                        "colvis": "Sütun görünürlüğü",
                        "colvisRestore": "Görünürlüğü eski haline getir",
                        "copySuccess": {
                            "1": "1 satır panoya kopyalandı",
                            "_": "%ds satır panoya kopyalandı"
                        },
                        "copyTitle": "Panoya kopyala",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Bütün satırları göster",
                            "_": "%d satır göster"
                        },
                        "pdf": "PDF",
                        "print": "Yazdır",
                        "copy": "Kopyala",
                        "copyKeys": "Tablodaki veriyi kopyalamak için CTRL veya u2318 + C tuşlarına basınız. İptal etmek için bu mesaja tıklayın veya escape tuşuna basın.",
                        "createState": "Şuanki Görünümü Kaydet",
                        "removeAllStates": "Tüm Görünümleri Sil",
                        "removeState": "Aktif Görünümü Sil",
                        "renameState": "Aktif Görünümün Adını Değiştir",
                        "savedStates": "Kaydedilmiş Görünümler",
                        "stateRestore": "Görünüm -&gt; %d",
                        "updateState": "Aktif Görünümün Güncelle"
                    },
                    "searchBuilder": {
                        "add": "Koşul Ekle",
                        "button": {
                            "0": "Arama Oluşturucu",
                            "_": "Arama Oluşturucu (%d)"
                        },
                        "condition": "Koşul",
                        "conditions": {
                            "date": {
                                "after": "Sonra",
                                "before": "Önce",
                                "between": "Arasında",
                                "empty": "Boş",
                                "equals": "Eşittir",
                                "not": "Değildir",
                                "notBetween": "Dışında",
                                "notEmpty": "Dolu"
                            },
                            "number": {
                                "between": "Arasında",
                                "empty": "Boş",
                                "equals": "Eşittir",
                                "gt": "Büyüktür",
                                "gte": "Büyük eşittir",
                                "lt": "Küçüktür",
                                "lte": "Küçük eşittir",
                                "not": "Değildir",
                                "notBetween": "Dışında",
                                "notEmpty": "Dolu"
                            },
                            "string": {
                                "contains": "İçerir",
                                "empty": "Boş",
                                "endsWith": "İle biter",
                                "equals": "Eşittir",
                                "not": "Değildir",
                                "notEmpty": "Dolu",
                                "startsWith": "İle başlar",
                                "notContains": "İçermeyen",
                                "notStartsWith": "Başlamayan",
                                "notEndsWith": "Bitmeyen"
                            },
                            "array": {
                                "contains": "İçerir",
                                "empty": "Boş",
                                "equals": "Eşittir",
                                "not": "Değildir",
                                "notEmpty": "Dolu",
                                "without": "Hariç"
                            }
                        },
                        "data": "Veri",
                        "deleteTitle": "Filtreleme kuralını silin",
                        "leftTitle": "Kriteri dışarı çıkart",
                        "logicAnd": "ve",
                        "logicOr": "veya",
                        "rightTitle": "Kriteri içeri al",
                        "title": {
                            "0": "Arama Oluşturucu",
                            "_": "Arama Oluşturucu (%d)"
                        },
                        "value": "Değer",
                        "clearAll": "Filtreleri Temizle"
                    },
                    "searchPanes": {
                        "clearMessage": "Hepsini Temizle",
                        "collapse": {
                            "0": "Arama Bölmesi",
                            "_": "Arama Bölmesi (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown}\/{total}",
                        "emptyPanes": "Arama Bölmesi yok",
                        "loadMessage": "Arama Bölmeleri yükleniyor ...",
                        "title": "Etkin filtreler - %d",
                        "showMessage": "Tümünü Göster",
                        "collapseMessage": "Tümünü Gizle"
                    },
                    "thousands": ".",
                    "datetime": {
                        "amPm": [
                            "öö",
                            "ös"
                        ],
                        "hours": "Saat",
                        "minutes": "Dakika",
                        "next": "Sonraki",
                        "previous": "Önceki",
                        "seconds": "Saniye",
                        "unknown": "Bilinmeyen",
                        "weekdays": {
                            "6": "Paz",
                            "5": "Cmt",
                            "4": "Cum",
                            "3": "Per",
                            "2": "Çar",
                            "1": "Sal",
                            "0": "Pzt"
                        },
                        "months": {
                            "9": "Ekim",
                            "8": "Eylül",
                            "7": "Ağustos",
                            "6": "Temmuz",
                            "5": "Haziran",
                            "4": "Mayıs",
                            "3": "Nisan",
                            "2": "Mart",
                            "11": "Aralık",
                            "10": "Kasım",
                            "1": "Şubat",
                            "0": "Ocak"
                        }
                    },
                    "decimal": ",",
                    "editor": {
                        "close": "Kapat",
                        "create": {
                            "button": "Yeni",
                            "submit": "Kaydet",
                            "title": "Yeni kayıt oluştur"
                        },
                        "edit": {
                            "button": "Düzenle",
                            "submit": "Güncelle",
                            "title": "Kaydı düzenle"
                        },
                        "error": {
                            "system": "Bir sistem hatası oluştu (Ayrıntılı bilgi)"
                        },
                        "multi": {
                            "info": "Seçili kayıtlar bu alanda farklı değerler içeriyor. Seçili kayıtların hepsinde bu alana aynı değeri atamak için buraya tıklayın; aksi halde her kayıt bu alanda kendi değerini koruyacak.",
                            "noMulti": "Bu alan bir grup olarak değil ancak tekil olarak düzenlenebilir.",
                            "restore": "Değişiklikleri geri al",
                            "title": "Çoklu değer"
                        },
                        "remove": {
                            "button": "Sil",
                            "confirm": {
                                "_": "%d adet kaydı silmek istediğinize emin misiniz?",
                                "1": "Bu kaydı silmek istediğinizden emin misiniz?"
                            },
                            "submit": "Sil",
                            "title": "Kayıtları sil"
                        }
                    },
                    "stateRestore": {
                        "creationModal": {
                            "button": "Kaydet",
                            "columns": {
                                "search": "Kolon Araması",
                                "visible": "Kolon Görünümü"
                            },
                            "name": "Görünüm İsmi",
                            "order": "Sıralama",
                            "paging": "Sayfalama",
                            "scroller": "Kaydırma (Scrool)",
                            "search": "Arama",
                            "searchBuilder": "Arama Oluşturucu",
                            "select": "Seçimler",
                            "title": "Yeni Görünüm Oluştur",
                            "toggleLabel": "Kaydedilecek Olanlar"
                        },
                        "duplicateError": "Bu Görünüm Daha Önce Tanımlanmış",
                        "emptyError": "Görünüm Boş Olamaz",
                        "emptyStates": "Herhangi Bir Görünüm Yok",
                        "removeJoiner": "ve",
                        "removeSubmit": "Sil",
                        "removeTitle": "Görünüm Sil",
                        "renameButton": "Değiştir",
                        "renameLabel": "Görünüme Yeni İsim Ver -&gt; %s:",
                        "renameTitle": "Görünüm İsmini Değiştir",
                        "removeConfirm": "Görünümü silmek istediğinize emin misiniz?",
                        "removeError": "Görünüm silinemedi"
                    },


                }

            });

            $('#users-table').on('click', '.btn-d', function() {
                var row = $(this).closest('tr').clone().appendTo('#detayform');
                $('#detayform').submit();
                console.log(row);
                // Seçilen satırı kullan
            });
            document.getElementById("myInput").disabled = true;
            // $("#min, #max").on("change", function() {
            //     table.draw();
            // });
        });
    </script>

</body>

</html>
