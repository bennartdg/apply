@php
  $statusCounts = $user->groupBy('status')->map(function ($group) {
      return $group->count();
  });
@endphp
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Student', {{ $statusCounts['student'] ?? 0 }}],
      ['Fresh Graduated', {{ $statusCounts['fresh graduate'] ?? 0 }}],
      ['Experienced', {{ $statusCounts['experienced'] ?? 0 }}],
    ]);

    var options = {
      title: '',
      backgroundColor: '#F8F9FA',
      
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }
</script>
