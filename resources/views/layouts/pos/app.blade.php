<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/eb6c3d0f96.js"></script>
    <title>POS</title>

    <style>
        .hoverable {
            border-radius: 4px;
            background: #fff;
            box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
            transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
            /* padding: 14px 80px 18px 36px; */
            cursor: pointer;
        }

        .hoverable:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
        }

        .product-card {
            height: 5.5in;
            overflow: auto;
            background: #fff;
        }

        .pointer {
            cursor: pointer;
        }

        .ck-button {
            margin: 4px;
            background-color: #EFEFEF;
            border-radius: 4px;
            border: 1px solid #D0D0D0;
            overflow: auto;
            float: left;
        }

        .ck-button {
            margin: 4px;
            background-color: #EFEFEF;
            border-radius: 4px;
            border: 1px solid #D0D0D0;
            overflow: auto;
            float: left;
        }

        .ck-button:hover {
            margin: 4px;
            background-color: #EFEFEF;
            border-radius: 4px;
            border: 1px solid red;
            overflow: auto;
            float: left;
            color: red;
        }

        #ck-button label {
            cursor: pointer;
            float: left;
            width: 4.0em;
        }

        #ck-button label span {
            cursor: pointer;
            text-align: center;
            padding: 3px 0px;
            display: block;
        }

        #ck-button label input {
            position: absolute;
            top: -20px;
        }

        #ck-button input:checked+span {
            background-color: #911;
            color: #fff;
        }

    </style>
    @livewireStyles
    @toastr_css
</head>

<body>

    {{-- livewire content start --}}
    {{ $slot }}
    {{-- livewire content end --}}

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @livewireScripts
        @jquery
        @toastr_js
        @toastr_render
        <script>
            window.addEventListener('alert', event => { 
                         toastr[event.detail.type](event.detail.message, 
                         event.detail.title ?? ''), toastr.options = {
                                "closeButton": true,
                                "progressBar": true,
                            }
                        });
            </script>
</body>

</html>
