<html>

<head>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <title>Home</title>
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
                </li>

                <li class="nav-item">
                    <a id="btn" class="btn mx-2 mt-2" href="#">Ana Sayfa</a>
                </li>
                <li class="nav-item">
                    <a id="btn" class="btn mt-2" href="{{route('excelekleme')}}">Veri
                        Ekleme</a>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle mt-2 mx-2" style=" background-color: #2087cd;color:white"
                            type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown button
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('DayTime')}}">Günlük</a>
                            <a class="dropdown-item" href="/GIRISCIKIS/ders/admin/hsürler.php">Haftalık</a>
                        </div>
                    </div>
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
                                    <img src="" width="40" height="40" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="./profil.php">profil</a>

                                    <a class="dropdown-item" href="cıkıs.php">çıkış yap</a>
                                </div>
                            </li>
                        </ul>
                    </div>
            </ul>


    </nav>

    <table id="users-table" class="display">
        <thead>
            <tr>
                <th>İd</th>
                <th>Ad Soyad</th>
                <th>firma</th>
                <th>Cihaz</th>
                <th>Tarih</th>
                <th>Saat</th>
                <th>Giris Cıkıs</th>
            </tr>
        </thead>
    </table>
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'ad_soyad',
                        name: 'ad_soyad'
                    },
                    {
                        data: 'firma',
                        name: 'firma'
                    },
                    {
                        data: 'firmaGC',
                        name: 'firmaGC'
                    },
                    {
                        data: 'tarih',
                        name: 'tarih'
                    },
                    {
                        data: 'saat',
                        name: 'saat'
                    },
                    {
                        data: 'GC',
                        name: 'GC'
                    }
                ],
                language: {
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
            })
        });
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
