@php
  $monthlyUserCounts = $user
      ->groupBy(function ($usr) {
          return $usr->getRegistrationMonth();
      })
      ->map(function ($group) {
          return $group->count();
      });

  $monthlyCountsArray = [];
  for ($month = 1; $month <= 12; $month++) {
      $monthlyCountsArray[$month] = $monthlyUserCounts->get($month, 0);
  }
@endphp

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    console.log(
      {{ $monthlyCountsArray[1] }},
      {{ $monthlyCountsArray[2] }},
      {{ $monthlyCountsArray[3] }},
      {{ $monthlyCountsArray[4] }},
      {{ $monthlyCountsArray[5] }},
      {{ $monthlyCountsArray[6] }},
      {{ $monthlyCountsArray[7] }},
      {{ $monthlyCountsArray[8] }},
      {{ $monthlyCountsArray[9] }},
      {{ $monthlyCountsArray[10] }},
      {{ $monthlyCountsArray[11] }},
      {{ $monthlyCountsArray[12] }},
    );

    var data = google.visualization.arrayToDataTable([
      ['Month', 'User Registered'],
      ['Jan', {{ $monthlyCountsArray[1] }}],
      ['Feb', {{ $monthlyCountsArray[2] }}],
      ['Mar', {{ $monthlyCountsArray[3] }}],
      ['Apr', {{ $monthlyCountsArray[4] }}],
      ['May', {{ $monthlyCountsArray[5] }}],
      ['Jun', {{ $monthlyCountsArray[6] }}],
      ['Jul', {{ $monthlyCountsArray[7] }}],
      ['Aug', {{ $monthlyCountsArray[8] }}],
      ['Sep', {{ $monthlyCountsArray[9] }}],
      ['Oct', {{ $monthlyCountsArray[10] }}],
      ['Nov', {{ $monthlyCountsArray[11] }}],
      ['Dec', {{ $monthlyCountsArray[12] }}]
    ]);

    var options = {
      title: '',
      legend: {
        position: 'bottom'
      },
      backgroundColor: '#F8F9FA',
      animation: {
        duration: 1000,
        startup: true,
        easing: 'inAndOut',
      }
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
  }
</script>
