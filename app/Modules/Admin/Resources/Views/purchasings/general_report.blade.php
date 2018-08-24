<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>

    {{ Html::style('assets/vendor/bootstrap/css/bootstrap.min.css') }}
    <link rel="shortcut icon" href="{{ asset('assets/img/icon.png') }}">    
    
    <style>
        @media print {
            @page { margin: 0; }
            body * {
                visibility: hidden;
            }
            .paper * {
                visibility: visible;
            }
            .paper {
                position: absolute;
                left: 0;
                top: 0;
                border: solid white !important;
                width: 100%;
            }
        }

        body {
            background-color: #eaeaea;
        }
        .wrap-paper {
            margin: 50px;
        }
        .paper {
            border: 1px solid rgba(0,0,0,.2);
            padding-top: 30px;
            padding-bottom: 30px;
            padding-left: 20px;
            padding-right: 20px;
            box-shadow: 0 3px 2px #aab2bd;
            background-color: #fff;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
        }

        .title {
            text-align: center;
        }

        .title p {
            font-size: 16px;
        }

    </style>
</head>
<body>
    <!-- WRAPPER -->
	<div id="wrapper">
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="wrap-paper">
                        <div class="col-lg-12 paper">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="title">
                                        <h1>
                                            Laporan Penjualan Rei Corporation
                                        </h1>
                                        <p>
                                            Bulan Januari
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Orderer</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Charges</th>
                                        <th>Phone Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchasings as $purchasing)
                                        <tr>
                                            <td>{{ $purchasing->user->first_name }}</td>
                                            <td>{{ $purchasing->first_name }}</td>
                                            <td>{{ $purchasing->last_name }}</td>
                                            <td>{{ $purchasing->charges }}</td>
                                            <td>{{ $purchasing->phone_number }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </div>

    {{ Html::script('assets/vendor/jquery/jquery.min.js') }}
    <script>
        $(function() {
            window.print();
        });
    </script>
</body>
</html>