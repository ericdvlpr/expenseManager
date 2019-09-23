@extends('layouts.app')
@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
        var analytics = <?php echo json_encode($data['charts']); ?>
     

        google.charts.load('current', {'packages':['corechart']},{'packages':['table']});

        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawTable);

        function drawChart() {
        var data = google.visualization.arrayToDataTable(analytics);
        var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
        chart.draw(data);
        }
</script>
        <div class="card">
            <div class="card-header">Dashboard</div>
    
            <div class="card-body">
              
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-stripped table-responsive">
                            <tr>
                                <th>Expense Category</th>
                                <th>Total</th>
                            </tr>
                          
                                @foreach($data['table'] as $value)
                                 <tr>
                                    <th>{{ $value['category_name'] }}</th>
                                    <th>{{ $value['total'] }}</th>
                                </tr>
                                @endforeach
                        </table>
                       
                    </div>
                    <div class="col-md-6">
                            <div id="pie_chart" style="width:550px; height:450px;"></div>
                    </div>
                </div>
                
                
            </div>
        </div>



@endsection
