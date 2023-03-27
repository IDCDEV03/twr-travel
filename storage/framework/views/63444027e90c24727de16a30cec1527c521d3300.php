
<?php $__env->startSection('title', 'รายงาน'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>รายงานยอดขาย</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 box-col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>สรุปยอดรายเดือน (ปี <?php echo e(now()->year); ?>)</h5>
                    </div>
                    <div class="card-body chart-block">
                        <div class="chart-overflow" id="line-chart"></div>
                    </div>
                </div>
            </div> 
                                    
            <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Column Chart <span class="digits">1 </span></h5>
                    </div>
                    <div class="card-body chart-block">
                        <div class="chart-overflow" id="column-chart1"></div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Pie Chart <span class="digits">1</span></h5>
                    </div>
                    <div class="card-body p-0 chart-block">
                        <div class="chart-overflow" id="pie-chart-twr"></div>
                    </div>
                </div>
            </div>
                 
          
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?> 
<script src="<?php echo e(asset('assets/js/chart/google/google-chart-loader.js')); ?>"></script>
<script>
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.load('current', {'packages':['line']});
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawBasic);
function drawBasic() {
      if ($("#pie-chart-twr").length > 0) {
      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work',     5],
        ['Eat',      10],
        ['Commute',  15],
        ['Watch TV', 20],
        ['Sleep',    25]
      ]);
      var options = {
        title: 'My Daily Activities',
        width:'100%',
        height: 300,
       colors: ["#f8d62b", "#51bb25" , "#a927f9"  , CubaAdminConfig.secondary , CubaAdminConfig.primary ]
      };
      var chart = new google.visualization.PieChart(document.getElementById('pie-chart-twr'));
      chart.draw(data, options);
  }
  if ($("#column-chart1").length > 0) {
      var a = google.visualization.arrayToDataTable([
        ["Year", "ทัวร์", "เช่ารถ"],
        ["2018", 1e3, 400],
        ["2019", 1170, 460],
        ["2020", 660, 1120],
        ["2021", 1030, 540]
      ]),
      b = {
        chart: {
          title: "รายงานยอดสั่งจองแพ็คเกจรายปี",
          subtitle: "Sales, Expenses, and Profit: 2014-2017"
        },
        bars: "vertical",
        vAxis: {
          format: "decimal"
        },
        height: 400,
        width:'100%',
          colors: [CubaAdminConfig.primary, CubaAdminConfig.secondary , "#51bb25"]


      },
    c = new google.charts.Bar(document.getElementById("column-chart1"));
    c.draw(a, google.charts.Bar.convertOptions(b))
  }
  if ($("#line-chart").length > 0) {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'เดือน');
      data.addColumn('number', 'ทัวร์');
      data.addColumn('number', 'เช่ารถ');
      data.addRows([
        ['ม.ค.',  37.8, 80.8],
        ['ก.พ.',  30.9, 10.5],
        ['มี.ค.',  40.4,   57],
        ['เม.ย.',  11.7, 18.8],
        ['พ.ค.',  20, 17.6],
        ['มิ.ย.',   8.8, 13.6],
        ['ก.ค.',   7.6, 12.3],
        ['ส.ค.',  12.3, 29.2],
        ['ก.ย.',  16.9, 42.9],
        ['ต.ค.', 12.8, 30.9],
        ['พ.ย.',  5.3,  7.9],
        ['ธ.ค.',  6.6,  8.4],
      ]);
      var options = {
        chart: {
          title: 'ยอดสั่งจองบริการเกจรายเดือน',
          subtitle: 'เฉพาะยอดที่สั่งจองและชำระเงินงวดที่ 1 แล้ว'
        },
        colors: [CubaAdminConfig.primary , CubaAdminConfig.secondary , "#51bb25"],
        height: 500,
        width:'100%',
      };
      var chart = new google.charts.Line(document.getElementById('line-chart'));
      chart.draw(data, google.charts.Line.convertOptions(options));
  }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/admin/admin_report.blade.php ENDPATH**/ ?>