<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- <script src="js/bootstrap.min.js"></script>
 --><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">

    body {
  background: rgb(204,204,204); 
  position: relative;
}
* {
    font-size: 10px;
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size="A4"][layout="landscape"] {
  width: 29.7cm;
  height: 21cm;  
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="landscape"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="landscape"] {
  width: 21cm;
  height: 14.8cm;  
}
@media print {
  page[size="A4"] {
    margin: 0;
    box-shadow: 0;
        width: 21cm;
  height: 29.7cm;
  }
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}
    .invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
.panel.panel-default td
{

    border-right: 1px solid;
    padding: 0px 7px;

}

@media print {
  body {
    margin: 0;
    color: #000;
    background-color: #fff;
  }
  @page
  {
    margin: 0.5cm;
  }
}
.heding{
    position: absolute;
    width: 100%;
}
.heding .Back{
    float: left;
}
.heding .print{
    float: right;
}
.heding .btn{
    background-color: #555555;
    color: white;
    margin: 10px;
}

</style>
<!-- <body onload="window.print();"></body> -->
<body>
<!-- <div class="heding">
        <a onclick="window.print();" class="btn print">print</a>
        <a href="{{url('sell')}}" class="btn Back">Back</a>
    </div>  -->
    
    
    <page size="A4">
        <div class="container" style="width: 100%;height: 54px;display: inline-block;">
    <div class="row" style="padding: 0px 15px 0 14px;">
        <div class="col-xs-12" style="border: 1px solid;">
            <center>
            <div class="invoice-title">
                <h2 style="margin: 5px 34px;">{{sys_config('site_name')}}</h2>
            </div>
            </center>
            <div class="row" style="border-top: 1px solid;">

                <div class="col-xs-5" style="border-right: 1px solid;height: 70px;">
                    <address>
                       <!--  <strong>Sky Cooling System</strong><br> -->
                        <strong>Mobile No :-</strong>{{sys_config('mobile')}}<br>
                        <strong>GST NO :- </strong>{{sys_config('GST')}}<br>
                        <strong>Address :- </strong>{{sys_config('address')}}<br>

                    </address>
                </div>
                <div class="col-xs-4"style="border-right: 1px solid;height: 70px;">
                    <address>
                        <strong>Customer</strong><br>
                        <strong>Name :- </strong>{{ $sell->client_name }}<br>
                        <strong>Mobile No :-</strong>{{ $sell->client_Contact }}<br>
                        <strong>GST :- </strong>{{ $sell->client_gst_no }}<br>
                        <strong>Address :- </strong>{{ $sell->client_address }}<br>

                    </address>
                </div>
                <div class="col-xs-3 text-right" style="/* border-top: 1px solid; */height: 70px;padding: 2px;">
                    
                        <table  border="0">
                            <tr>
                                <th>Invoice No : </th>
                                <td>{{ sys_config('Sell_biill_start') + $sell->id }}</td>                                
                            </tr>
                            <tr>
                                
                                <th>Invoice Date : </th>
                                <td>{{ $sell->bill_date }}</td>
                            </tr>
                            <tr>
                                <th>Paymet Method : </th>
                                <td> {{ $sell->Payment_type }}</td>
                            </tr>
                        </table>
                    
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12" style="padding: 0px 14px;">
            <div class="panel panel-default" style="border-radius: 0;border-left: 1.5px solid;border-right: 1.5px solid;">
                
                <div class="panel-body" style="padding: 0px;">
                    <div>
                        <table style="width: 100%;">
                            <thead>
                                
                                    <tr style="border-bottom: 1px solid black;background: antiquewhite;">
                                        <td style="text-align: center;"><strong>No</strong></td>
                                        <td><strong>Item</strong></td>
                                        <td class="text-center"><strong>HSN</strong></td>
                                        <td class="text-center"><strong>Qty</strong></td>
                                        <td class="text-center"><strong>Amounts</strong></td>
                                        <td class="text-center"><strong>Taxes</strong></td>
                                        <td class="text-center"><strong>MRP</strong></td>
                                        <td style="border: none;" class="text-center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
                                    </tr>
                                    
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                @foreach($product as $val)
                                <tr>
                                    <td style="text-align: center;"><b>id</b></td>
                                    <td>{{ $val->name}}</td>
                                    <td class="text-center">{{ $val->HSN}}</td>
                                    <td class="text-center">{{ $val->quantity}}</td>
                                    <td class="text-center">{{ $val->totel_amount - $val->totel_gst}}</td>
                                    <td class="text-center">{{ $val->totel_gst}}</td>
                                    <td class="text-center">{{ $val->rate}}</td>
                                    <td class="text-center" style="border: none;">{{ $val->totel_amount}}</td>
                                </tr>
                                @endforeach
                                 <tr>
                                    <td style="width: 4%;text-align: center;">&nbsp;</td>
                                    <td class="text-center">&nbsp;</td>
                                    <td class="text-center">&nbsp;</td>
                                    <td class="text-right">&nbsp;</td>
                                    <td class="text-center">&nbsp;</td>
                                    <td class="text-center">&nbsp;</td>
                                    <td class="text-right">&nbsp;</td>

                                </tr>
                               
                                
                                <tr style="border-top: 1px solid;">                                 
                                    <td class="no-line" colspan="6" ><strong>Bank Details :-</strong></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right" style="border: none;">{{ $sell->sum_amount }}</td>
                                </tr>
                                <tr>
                                    <td class="no-line" colspan="6"><strong>Bank Name :- </strong>{{sys_config('bank_name')}}</td>
                                    <td class="no-line text-center"><strong>GST</strong></td>
                                    <td class="no-line text-right" style="border: none;">{{ $sell->Gst_Total }}</td>
                                </tr>
                                <tr>
                                    <td class="no-line" colspan="6"><strong>Bank Ac :- </strong>{{sys_config('bank_ac')}}</td>
                                    <td class="no-line text-center"><strong></td>
                                    <td class="no-line text-right" style="border: none;"></td>
                                </tr>
                                <tr>
                                <td class="no-line" colspan="6"><strong>Bank IFSC Code :- </strong>{{sys_config('Bank_IFSC_Code')}}</td>
                                    <td class="no-line text-center"><strong>Total Amount</strong></td>
                                    <td class="no-line text-right" style="border: none;">{{ $sell->totel_amount }}</td>
                                </tr>

                              



                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row"style="margin: 0;">

                <div class="col-xs-8" style="border-top: 1px solid;border-bottom: 1px solid;height: 45px;">
                    <strong>{{sys_config('Description1')}}</strong><br>
                    <strong>{{sys_config('Description2')}}</strong><br>
                </div>
                <div class="col-xs-4 text-right" style="border-bottom: 1px solid;border-left: 1px solid;border-top: 1px solid;height: 45px;">
                    
                       <strong>Signature</strong>
                    
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
    </page>
</body>
<script type="text/javascript">
    window.print();
    window.setTimeout(function() {
    window.location.href = '{{ url("/sell") }}';
}, 3000);
</script>