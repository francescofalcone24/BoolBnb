@extends('layouts.admin')

@section('content')
<div class="container w-50 p-3">
  <h3 class="text-center">Your visuals statistics analizer</h3>
    <canvas id="myChart"></canvas>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <?php 
 $months = $visuals->pluck('month')->all();
 $counts = $visuals->pluck('visuals')->all();
 $currentMonth = date('n');
 $monthDue = [];
 $monthNames = [
    1 => 'January',
    2 => 'February',
    3 => 'March',
    4 => 'April',
    5 => 'May',
    6 => 'June',
    7 => 'July',
    8 => 'August',
    9 => 'September',
    10 => 'October',
    11 => 'November',
    12 => 'December'
];
// dd($currentMonth);
// array_push(array, value1, value2, ..., valueN)
$monthsInLetters = array_map(function($months) use ($monthNames) {
  return $monthNames[$months];}, $months);

 ?>
  <script>
    const ctx = document.getElementById('myChart');
    Chart.defaults.font.size = 20;
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php  echo json_encode($monthsInLetters);  ?>,
        // 
        datasets: [{
          label: 'Your Visuals',
          data: <?php   echo json_encode($counts); ?>,

          borderWidth: 2,
        }]
      },
      options: {
        // animations: { tension: { duration: 1000, easing: 'linear', from: 1, to: 0, loop: true }},
        scales: { y: { beginAtZero: true, }, x: {} },
      }
    });
  </script>
  

@endsection