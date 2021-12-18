<html>
    <title>Print Report - 5th Gen Creations</title>
    <head>
        <style>
             @page {
                margin: 100px 25px;
             }
             #header {
                margin-top: -2.3cm;
                left: 0px;
                right: 0px;
                height: 50px;
                line-height: 35px;
                text-align: center;
            }
            #address {
                margin-top: -4cm;
                left: 0px;
                right: 0px;
                text-align: center;
            }
            .table-bordered {
                border: 1px solid #ddd;
                text-align: left;
            }
            .table {
                width: 100%;
                max-width: 100%;
                font-family: Arial, Helvetica, sans-serif;
            }
            .small, small {
                font-size: 80%;
            }
            #payments td, #payments th {
                border: 1px solid #ddd;
                font-size: 80%;
            }
            #payments {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
           
            .col-7 {
                float: left;
                width: 70%;
                padding: 10px;
                /* height: 300px;  */
                font-size: 80%;
            }
            .col-5 {
                float: left;
                width: 30%;
                padding: 10px;
                font-size: 80%;
            }
            .col-6 {
                float: left;
                width: 30%;
                padding: 10px;
                font-size: 80%;
            }
            .row:after {
                display: table;
                clear: both;
            }
        </style>
    </head>
    <body>
        <div id="header">
           <h1>Print Report - 5th Gen Creations</h1>
       </div>
       <div id="address">
            <small style="color:gray;font-size:15px;">FROM: {{date('F d,Y',strtotime($data['start-date']))}} | TO: {{date('F d,Y',strtotime($data['end-date']))}} </small>
       </div>
       <div>
           
           
       </div>
       <div id="body">
                <table id="payments">
                    <thead>
                        <tr>
                            <th>Date Created</th>
                            <th>Name</th>
                            <th>Contact Details</th>
                            <th>Items</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($selectQuery as $order)
                            <tr>
                                <td>{{date('F d,Y',strtotime($order->created_at))}}</td>
                                <td>{{$order->name}}</td>
                                <td>
                                    <b>Contact #:</b> {{$order->phone_number}} <br class="m-0">
                                    <b>Email:</b> {{$order->email}} <br class="m-0">
                                    <b>Address:</b> {{$order->address}} <hr class="m-0">
                                    {{$order->house_number}},{{$order->lot_blk}},{{$order->barangay}},{{$order->city}},{{$order->landmark}}
                                </td>
                                <th>{{$order->items}}</th>
                                <td>
                                    <b>Shipping Fee :</b>{{number_format($order->shipping_fee,2)}} <br>
                                    <b>Total :</b>{{number_format($order->grand_total+$order->shipping_fee,2)}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            
            <div class="row">
                <div class="col-5">
                   
                </div>
            </div>
            
       </div>
    </body>
</html>