@extends('layout')

@section('styles')
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
<link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
<link href="assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
@endsection

@section('content')


<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="widget widget-chart-two">
                <div class="widget-heading">
                    <h5 class="text-center">Total Nurses</h5>
                </div>
                <div class="widget-content">
                    <div id="chart-1" class=""></div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="widget widget-chart-two">
                <div class="widget-heading">
                    <h5 class="text-center">Total Users</h5>
                </div>
                <div class="widget-content">
                    <div id="chart-2" class=""></div>
                </div>
            </div>
        </div>
        
       
        

    </div>
</div>

@endsection

@section('scripts')
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="plugins/apex/apexcharts.min.js"></script>
{{-- <script src="assets/js/dashboard/dash_1.js"></script> --}}
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->


<script>

    var chart1_value = "{{App\Models\User::where('genre',2)->count()}}";
    var chart1_name = "nurses";
    var chart1_color = "#FF0000";
    
    var chart2_value = "{{App\Models\User::where('genre',1)->count()}}";
    var chart2_name = "users";
    var chart2_color = "#0000FF";
    
    var chart3_value = "000";
    var chart3_name = "PKR";
    var chart3_color = "#008000";

</script>

<script src="{{asset('charts/chart1.js')}}"></script>
<script src="{{asset('charts/chart2.js')}}"></script>
<script src="{{asset('charts/chart3.js')}}"></script>
@endsection