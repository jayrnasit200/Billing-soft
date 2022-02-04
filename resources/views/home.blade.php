@extends('layouts.admin')

@section('css')
<style>
body{
    overflow-x: hidden;
}
</style>

@endsection

@section('content')
<!-- Content Header (Page header) -->

<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- box-1 -->
            <div class="col-lg-3">
                <div class="card bg-primary ">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Total Sales</h3>
                        </div>
                    </div>
                    <div class="small-box shadow-none">
                        <div class="inner">
                            <h3>{{$totale_sell}}</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-arrow-graph-up-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end box-1 -->
            <!-- box-2 -->
            <div class="col-lg-3">
                <div class="card bg-secondary">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Total Purchase</h3>
                        </div>
                    </div>
                    <div class="small-box shadow-none">
                        <div class="inner">
                            <h3>{{$totale_purchase}}</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end box-2 -->
            <!-- box-3 -->
            <div class="col-lg-3">
                <div class="card bg-warning">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Total Profit</h3>
                        </div>
                    </div>
                    <div class="small-box shadow-none">
                        <div class="inner">
                            <h3>{{$total_profit}}</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end box-3 -->
            <!-- box-4 -->
            <div class="col-lg-3">
                <div class="card bg-danger">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Happy Clients</h3>
                        </div>
                    </div>
                    <div class="small-box shadow-none">
                        <div class="inner">
                            <h3>{{$total_Clients}}</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-happy"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end box-4 -->
        </div>
        <!-- end row -->
        <div class="row">
            <!-- box-1 -->
            <div class="col-lg-3">
                <div class="card bg-success ">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Current Year Sales</h3>
                        </div>
                    </div>
                    <div class="small-box shadow-none">
                        <div class="inner">
                            <h3>{{$current_sell}}</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-social-usd"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end box-1 -->
            <!-- box-2 -->
            <div class="col-lg-3">
                <div class="card bg-orange">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Current Year Purchase</h3>
                        </div>
                    </div>
                    <div class="small-box shadow-none">
                        <div class="inner">
                            <h3>{{$current_purchase}}</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-clipboard"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end box-2 -->
            <!-- box-3 -->
            <div class="col-lg-3">
                <div class="card bg-info">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Total Brands</h3>
                        </div>
                    </div>
                    <div class="small-box shadow-none">
                        <div class="inner">
                            <h3>{{$total_brand}}</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pricetag"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end box-3 -->
            <!-- box-4 -->
            <div class="col-lg-3">
                <div class="card bg-purple">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Total Products</h3>
                        </div>
                    </div>
                    <div class="small-box shadow-none">
                        <div class="inner">
                            <h3>{{$total_product}}</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-tshirt-outline"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end box-4 -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
            <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Line Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <div id="chartContainer" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
                <!-- /.card -->
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Low Products</h3>
                         
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product Name</th>
                                    <th>Brand</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($low_stock_products as  $key=>$val)
                                @php $key++; @endphp
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$val->name}}</td>
                                    <td>{{$val->b_name}}</td>
                                    <td>{{$val->quantity}}</td>
                                    <td>{{$val->rate}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
            <div class="card bg-gradient-success">
              <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"><div class="bootstrap-datetimepicker-widget usetwentyfour"><ul class="list-unstyled"><li class="show"><div class="datepicker"><div class="datepicker-days" style=""><table class="table table-sm"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">February 2022</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td data-action="selectDay" data-day="01/30/2022" class="day old weekend">30</td><td data-action="selectDay" data-day="01/31/2022" class="day old">31</td><td data-action="selectDay" data-day="02/01/2022" class="day">1</td><td data-action="selectDay" data-day="02/02/2022" class="day">2</td><td data-action="selectDay" data-day="02/03/2022" class="day">3</td><td data-action="selectDay" data-day="02/04/2022" class="day active today">4</td><td data-action="selectDay" data-day="02/05/2022" class="day weekend">5</td></tr><tr><td data-action="selectDay" data-day="02/06/2022" class="day weekend">6</td><td data-action="selectDay" data-day="02/07/2022" class="day">7</td><td data-action="selectDay" data-day="02/08/2022" class="day">8</td><td data-action="selectDay" data-day="02/09/2022" class="day">9</td><td data-action="selectDay" data-day="02/10/2022" class="day">10</td><td data-action="selectDay" data-day="02/11/2022" class="day">11</td><td data-action="selectDay" data-day="02/12/2022" class="day weekend">12</td></tr><tr><td data-action="selectDay" data-day="02/13/2022" class="day weekend">13</td><td data-action="selectDay" data-day="02/14/2022" class="day">14</td><td data-action="selectDay" data-day="02/15/2022" class="day">15</td><td data-action="selectDay" data-day="02/16/2022" class="day">16</td><td data-action="selectDay" data-day="02/17/2022" class="day">17</td><td data-action="selectDay" data-day="02/18/2022" class="day">18</td><td data-action="selectDay" data-day="02/19/2022" class="day weekend">19</td></tr><tr><td data-action="selectDay" data-day="02/20/2022" class="day weekend">20</td><td data-action="selectDay" data-day="02/21/2022" class="day">21</td><td data-action="selectDay" data-day="02/22/2022" class="day">22</td><td data-action="selectDay" data-day="02/23/2022" class="day">23</td><td data-action="selectDay" data-day="02/24/2022" class="day">24</td><td data-action="selectDay" data-day="02/25/2022" class="day">25</td><td data-action="selectDay" data-day="02/26/2022" class="day weekend">26</td></tr><tr><td data-action="selectDay" data-day="02/27/2022" class="day weekend">27</td><td data-action="selectDay" data-day="02/28/2022" class="day">28</td><td data-action="selectDay" data-day="03/01/2022" class="day new">1</td><td data-action="selectDay" data-day="03/02/2022" class="day new">2</td><td data-action="selectDay" data-day="03/03/2022" class="day new">3</td><td data-action="selectDay" data-day="03/04/2022" class="day new">4</td><td data-action="selectDay" data-day="03/05/2022" class="day new weekend">5</td></tr><tr><td data-action="selectDay" data-day="03/06/2022" class="day new weekend">6</td><td data-action="selectDay" data-day="03/07/2022" class="day new">7</td><td data-action="selectDay" data-day="03/08/2022" class="day new">8</td><td data-action="selectDay" data-day="03/09/2022" class="day new">9</td><td data-action="selectDay" data-day="03/10/2022" class="day new">10</td><td data-action="selectDay" data-day="03/11/2022" class="day new">11</td><td data-action="selectDay" data-day="03/12/2022" class="day new weekend">12</td></tr></tbody></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2022</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month active">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month">Dec</span></td></tr></tbody></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year">2020</span><span data-action="selectYear" class="year">2021</span><span data-action="selectYear" class="year active">2022</span><span data-action="selectYear" class="year">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td></tr></tbody></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade" data-selection="2016">2010</span><span data-action="selectDecade" class="decade active" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td></tr></tbody></table></div></div></li><li class="picker-switch accordion-toggle"></li></ul></div></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->


@endsection

@section('js')
<!-- <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script>
window.onload = function() {
 
var dataPoints = [];
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	zoomEnabled: true,
	title: {
		text: "Bitcoin Price - 2017"
	},
	axisY: {
		title: "Price in USD",
		titleFontSize: 24,
		prefix: "$"
	},
	data: [{
		type: "line",
		yValueFormatString: "$#,##0.00",
		dataPoints: dataPoints
	}]
});
 
function addData(data) {
	var dps = data.price_usd;
	for (var i = 0; i < dps.length; i++) {
		dataPoints.push({
			x: new Date(dps[i][0]),
			y: dps[i][1]
		});
	}
	chart.render();
}
 
$.getJSON("https://canvasjs.com/data/gallery/php/bitcoin-price.json", addData);
 
}
</script> -->
<script>
window.onload = function () {
 var chartdata = @php echo json_encode($chart, JSON_NUMERIC_CHECK); @endphp

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Current Year Sales show by month"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: chartdata
	}]
});
chart.render();
 
}
</script>
<script src="{{url('assets/plugins/chart.js/canvasjs.min.js')}}"></script>

@endsection
