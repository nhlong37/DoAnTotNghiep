@extends('admin.index')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="bottom_dashboard">
                    <div class="panel-body">
                        <canvas id="line-chart"></canvas>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection


<script type="text/javascript">
    window.onload = function () 
    {
        var lineChart = document.getElementById('line-chart');
        var myChart = new Chart(lineChart, {
            type: 'line',
            data: {
                labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
                datasets: [
                    {
                        label: 'Doanh thu theo tháng của cửa hàng',
                        data: {{ $data_month_chart }},
                        backgroundColor: 'rgba(0, 128, 128, 0.3)',
                        borderColor: 'rgba(0, 128, 128, 0.7)',
                        borderWidth: 2
                    }
                ]
            },
        });
    };
</script>