<html>

<head>
    <style>
        body {
            font-family: bengali_englisg, sans-serif;
        }
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .custom_style {
            border: 2px solid rgb(49, 4, 155);
            padding: 5px;
            border-radius: 2em / 5em;
            text-align: center;
            background-color: rgb(235, 231, 240);
            color: rgb(0, 0, 0);
            margin: 10px;
            width: 100%;
        }

       
    </style>
</head>

<body>
    <div style="width: 100%; text-align:center;">
        <img src="{{ asset('assets/images/mid-logo.png') }}" width="116" height="80" alt=""> <br>
        <p style="font-size: 26px; margin:5px 0px 0px 0px;">Eric's Bistro Coffee shop</p>
        <p style="font-size: 16px; margin:0px 0px 5px 0px;">13/1 Fatema Arcade , Mirpur Road, Dhanmondi 1205</p>
        <p style="font-size: 16px; margin:0px 0px 0px 0px;">Phone: 02-9661515</p>
        <p style="font-size: 16px; margin:0px 0px 0px 0px;">Email: ericsbistro@yahoo.com</p>
        <p style="font-size: 16px; margin:5px 0px 5px 0px;"> <b>Report generated at: {{ date('h:i:s d F Y') }}</b> </p>
    </div>
    <div class="custom_style">
        <h3>Income: {{  array_sum(array_column($data_set, 'income')) }} BDT & Expense: {{  array_sum(array_column($data_set, 'expense')) }} BDT</h3>
    </div>
    <table style="width: 100%;">
        <thead>
            <tr style="width: 100%;">
                <th>#</th>
                <th style="text-align: left;">Date</th>
                <th style="text-align: right;">Income</th>
                <th style="text-align: right;">Expense</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_set as $data)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $data['date'] }}</td>
                <td style="text-align: right;">{{ $data['income'] }}</td>
                <td style="text-align: right;">{{ $data['expense'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>