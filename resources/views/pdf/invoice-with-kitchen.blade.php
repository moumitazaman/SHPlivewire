<!DOCTYPE html>
<html lang="en">

<head>
    <title> ভাউচারঃ {{-- $invoice->custom_counter ?? '---' --}} </title>
    <style>
        @page {
            background-color: #ffffff;
            sheet-size: 70mm 180mm;
            /* size: auto; */
            /* background-color: azure; */
            vertical-align: top;
            margin-top: 0;
            /* <any of the usual CSS values for margins> */
            margin-left: 1mm;
            /* <any of the usual CSS values for margins> */
            margin-right: 1mm;
            /* <any of the usual CSS values for margins> */
            margin-bottom: 0;
            /* <any of the usual CSS values for margins> */
            margin-header: 0;
            /* <any of the usual CSS values for margins> */
            margin-footer: 0;
            /* <any of the usual CSS values for margins> */
            marks: cross;
            /*crop | cross | none*/
            /*https://mpdf.github.io/css-stylesheets/supported-css.html*/
            /*https://mpdf.github.io/paging/different-page-sizes.html*/
        }

        body {
            font-family: bengali_englisg, sans-serif;
        }

        #invoice-POS {
            box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.5);
            padding: 0;
            margin: 0 auto;
            width: 0;
            background: #fff;
        }
        #invoice-POS ::selection {
            background: #f31544;
            color: #fff;
        }
        #invoice-POS ::moz-selection {
            background: #f31544;
            color: #fff;
        }
        #invoice-POS h1 {
            font-size: 1em;
            color: #222;
        }
        #invoice-POS h2 {
            font-size: 0.9em;
        }
        #invoice-POS h3 {
            font-size: 1em;
            font-weight: 300;
            line-height: 2em;
        }
        #invoice-POS p {
            font-size: 0.7em;
            color: #666;
            line-height: 1em;
        }
        #invoice-POS #top,
        #invoice-POS #mid,
        #invoice-POS #bot {
            /* Targets all id with 'col-' */
            border-bottom: 0px solid #eee;
        }
        #invoice-POS #top {
            min-height: 0px;
        }
        #invoice-POS #mid {
            min-height: 0px;
        }
        #invoice-POS #bot {
            min-height: 0px;
        }
        #invoice-POS .info {
            display: block;
            margin-left: 0;
        }
        #invoice-POS .title {
            float: right;
        }
        #invoice-POS .title p {
            text-align: right;
        }
        #invoice-POS table {
            width: 100%;
            border-collapse: collapse;
        }
        #invoice-POS .tabletitle {
            font-size: 0.5em;
            background: #eee;
        }
        #invoice-POS .service {
            border-bottom: 1px solid #eee;
        }
        #invoice-POS .item {
            width: 2in;
        }
        #invoice-POS .itemtext {
            font-size: 0.5em;
        }
        h3 {
            font-size: 10px;
        }
        h2 {
            font-size: 16px;
        }

    </style>
</head>

<body>
    <div style="width: 100%; text-align:center;">
        <img src="{{ asset('assets/images/mid-logo.png') }}" width="116" height="80" alt=""> <br>
        <p style="font-size: 18px; margin:5px 0px 0px 0px;">Eric's Bistro</p>
        <p style="font-size: 14px; margin:0px 0px 5px 0px;">Coffee shop</p>
        <p style="font-size: 10px; margin:0px 0px 5px 0px;">13/1 Fatema Arcade ,</p>
        <p style="font-size: 10px; margin:0px 0px 0px 0px;">Mirpur Road, Dhanmondi 1205</p>
        <p style="font-size: 10px; margin:0px 0px 0px 0px;">Phone: 02-9661515</p>
        <p style="font-size: 10px; margin:0px 0px 0px 0px;">Email: ericsbistro@yahoo.com</p>
        <h2 style="margin-top: 5px;">
            Sales Receipt:  {{ $invoice->id }}
        </h2>
    </div>
    <table style="font-size: 10px; width:100%; margin-bottom:5px;">
        <tr>
            <td>
                Date: {{  $invoice->created_at->format('d.m.y') }} Time: {{  $invoice->created_at->format('h:i:s A') }}
            </td>
            <td style="text-align: right;">
                Type: @if($invoice->parcel == true) Parcel @else No Parcel @endif
            </td>
        </tr>
    </table>
    <div id="invoice-POS">
        <div id="bot">
            <div id="table">
                <table style="width: 100%; font-size: 10px; margin-bottom:5px;">
                    <tr class="tabletitle">
                        <td class="item" style="width: 5%">
                            <h3>#</h3>
                        </td>
                        <td class="Rate" style="width: 60%; text-align:left;">
                            <h3>Item</h3>
                        </td>
                        <td class="Rate" style="width: 15%; text-align:right;">
                            <h3>Price</h3>
                        </td>
                        <td class="Rate" style="width: 10%; text-align:right;">
                            <h3>QTY</h3>
                        </td>
                        <td class="Rate" style="width: 10%; text-align:right;">
                            <h3>Total</h3>
                        </td>
                    </tr>
                    @foreach ($invoice->items as $item)
                        <tr class="item @if ($loop->last) last @endif">
                            <td style="text-align:left;">{{$loop->iteration }}</td>
                            <td style="text-align:left;">{{ $item->product->name ?? '#' }}</td>
                            <td style="text-align:right;"> {{ $item->price }} </td>
                            <td style="text-align:right;"> {{ $item->quantity }} </td>
                            <td style="text-align:right;"> {{ round($item->price * $item->quantity, 2) }} </td>
                        </tr>
                    @endforeach
                </table>
                <table>
                    <tr class="">
                        <td class="Rate" style="width: 50%; text-align:left;">
                            <h3>Total price</h3>
                        </td>
                        <td class="payment" style="width: 50%; text-align:right;">
                            {{ $invoice->total_price() }}
                        </td>
                    </tr>
                    <tr class="">
                        <td class="Rate">
                            <h3>Discount</h3>
                        </td>
                        <td class="payment" style="text-align:right;">
                           {{ $invoice->discount_amount }}
                        </td>
                    </tr>
                    <tr class="">
                        <td class="Rate">
                            <h3> Discount price:</h3>
                        </td>
                        <td class="payment" style="text-align:right;">
                            {{ $invoice->total_price_after_discount() }}
                        </td>
                    </tr>
                    <tr class="">
                        <td class="Rate">
                            <h3> Paid amount:</h3>
                        </td>
                        <td class="payment" style="text-align:right;">
                            {{ $invoice->paid_amount }}
                        </td>
                    </tr>
                    <tr class="">
                        <td class="Rate">
                            <h3> Return amount:</h3>
                        </td>
                        <td class="payment" style="text-align:right;">
                            {{ $invoice->paid_amount - $invoice->total_price_after_discount() }}
                        </td>
                    </tr>
                </table>
                <div style="margin-top: 20px;">
                    <p style="text-align: center; margin-top:10px;">
                        Developed By <a href="https://www.iciclecorporation.com/" target="_blank">iciclecorporation.com</a>
                    </p>
                </div>
            </div>
            <!--End Table-->
        </div>
        <!--End InvoiceBot-->
    </div>
    <pagebreak>
        <div style="width: 100%; text-align:center;">
            <p style="font-size: 18px; margin:20px 0px 5px 0px;">
               <b>Kitchen</b>
            </p>
            <h2 style="margin-top: 5px;">
                Sales Receipt:  {{ $invoice->id }}
            </h2>
        </div>
        <table style="font-size: 10px; width:100%; margin-bottom:5px;">
            <tr>
                <td>
                    Date: {{  $invoice->created_at->format('d.m.y') }} Time: {{  $invoice->created_at->format('h:i:s A') }}
                </td>
                <td style="text-align: right;">
                    Type: @if($invoice->parcel == true) Parcel @else No Parcel @endif
                </td>
            </tr>
        </table>
        <div id="invoice-POS">
            <div id="bot">
                <div id="table">
                    <table style="width: 100%; font-size: 10px; margin-bottom:5px;">
                        <tr class="tabletitle">
                            <td class="item" style="width: 5%">
                                <h3>#</h3>
                            </td>
                            <td class="Rate" style="width: 60%; text-align:left;">
                                <h3>Item</h3>
                            </td>
                            <td class="Rate" style="width: 10%; text-align:right;">
                                <h3>QTY</h3>
                            </td>
                        </tr>
                        @foreach ($invoice->items as $item)
                            <tr class="item @if ($loop->last) last @endif">
                                <td style="text-align:left;">{{$loop->iteration }}</td>
                                <td style="text-align:left;">{{ $item->product->name ?? '#' }}</td>
                                <td style="text-align:right;"> {{ $item->quantity }} </td>
                            </tr>
                        @endforeach
                    </table>
                    <table cellpadding="0" cellspacing="0" style="margin-top: 20px;">
                        <tr>
                            <th>
                                Developed By <br> <a href="https://www.iciclecorporation.com/" target="_blank">iciclecorporation.com</a>
                            </th>
                        </tr>
                    </table>
                </div>
                <!--End Table-->
            </div>
            <!--End InvoiceBot-->
        </div>
</body>
</html>




