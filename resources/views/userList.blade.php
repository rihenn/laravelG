<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grup Arge · Kullanici Listele</title>
    <link rel="icon" href="https://www.gruparge.com/wp-content/uploads/2022/07/grup-arge-favicon.png" type="image/png"
        sizes="32x32">
    <link rel="icon" href="https://www.gruparge.com/wp-content/uploads/2022/07/grup-arge-favicon.png"
        type="image/png" sizes="16x16">
  

    <link href="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet" />

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

    <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet" />
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
                {{-- <li class="nav-item">
                    <a id="btn" class="btn mt-2" href="{{ route('excel') }}">Veri
                        Ekleme</a>
                </li> --}}




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
                        Veritabanına Yazdır
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
                    Cihazdaki kullanıcıları Yazdır
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
            <div class="d-flex" style="justify-content: center">
                <h1> {{ $cihazname }}   Cihazı </h1>

            </div>




        </div>




        <div class="d-flex justify-content-center">
            <div class="row col-12 w-70">
                <div id="mydiv" class="d-flex justify-content-center col">

                    <form action="{{ route('diveceUserUpdate') }}" method="post" id="updateform" class="d-none">

                        @csrf
                    </form>
                    <form action="{{ route('diveceUserRemove') }}" method="post" id="removeform" class="d-none">
                        <input type="hidden" name="CihazName" value="{{ $cihazname }}">
                        @csrf
                    </form>
                    <table class="table bg-white table-responsive-sm" id="disp">
                        <thead>
                            <tr>
                                <th scope="col">UID</th>
                                <th scope="col">Kullanıcı ID</th>
                                <th scope="col">Ad Soyad</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Şifre</th>
                                <th scope="col">Kart No</th>
                                <th scope="col">Eylemler</th>
                            </tr>

                        </thead>


                        <tbody></tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.13.4/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
          
            let mydata = {!! json_encode($users) !!};
            datatableData = [];
            Object.keys(mydata).forEach(function(key) {
                datatableData.push(mydata[key])
           

            });
           

            $('#disp').DataTable({

                data: datatableData,
                columns: [

                    {


                        data: function(data, type) {
                            if (type == "display") {
                                return `  <input type="text" name="uid" style='border:none;' value='${data.uid}'>`;
                            } else {
                                return data.uid
                            }
                        }


                    },
                    {
                        data: function(data, type) {
                            // console.log(data);
                            if (type == 'display') {
                                return `<input type='text' name="userid" style='border:none;' value='${data.userid}'> `

                            } else {

                                return data.userid
                            }
                        }
                    },

                    {
                        data: function(data, type) {
                            if (type == 'display') {
                                return `<input type='text' name="name" id="name" style='border:none;' value='${data.name}'> `

                            } else {

                                return data.name
                            }
                        }
                    },
                    {
                        data: function(data, type) {
                            if (type == 'display') {
                                return `<input type='text' name="role" style='border:none;' value='${data.role}'> `

                            } else {

                                return data.role
                            }
                        }
                    },
                    {
                        data: function(data, type) {
                            if (type == 'display') {
                                return `<input type='text' name="password" style='border:none;' value='${data.password}'> `

                            } else {

                                return data.password
                            }
                        }
                    },
                    {
                        data: function(data, type) {
                            if (type == 'display') {
                                return `<input type='text' name='cardno' style='border:none;' value='${data.cardno}'> `

                            } else {

                                return data.cardno
                            }
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            if (type === 'display') {
                                return `<input type="button" name="btn-k" class="btn btn-primary btn-k" value="kaydet">
								<input type="button" name="btn-s" class="btn btn-danger m-3 btn-s" value="Sil">`;
                            }
                            return data;
                        }
                    }

                ],  language: {
                    "emptyTable": "Tabloda herhangi bir veri mevcut değil",
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

            $('#disp').on('click', '.btn-k', function() {
                var row = $(this).closest('tr').clone().appendTo('#updateform');
                $('#updateform').submit();
                console.log(row);
                // Seçilen satırı kullan
            });
            $('#disp').on('click', '.btn-s', function() {
                var row = $(this).closest('tr').clone().appendTo('#removeform');
                $('#removeform').submit();
                console.log(row);
        
            });


            const turkishChars = {
                'ç': 'c',
                'ğ': 'g',
                'ı': 'i',
                'ö': 'o',
                'ş': 's',
                'ü': 'u',
                'Ç': 'C',
                'Ğ': 'G',
                'İ': 'I',
                'Ö': 'O',
                'Ş': 'S',
                'Ü': 'U'
            };
            $('#disp').on('keyup','input#name', function() {
                
                const inputValue = $(this).val();
  let updatedValue = '';

  for (let i = 0; i < inputValue.length; i++) {
    const char = inputValue.charAt(i).toUpperCase();
    if (Object.keys(turkishChars).includes(char)) {
      updatedValue += turkishChars[char];
    } else {
      updatedValue += char;
    }
  }

  $(this).val(updatedValue);
            });

        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>
