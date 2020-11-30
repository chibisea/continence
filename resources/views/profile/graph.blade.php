 {{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- profile.blade.phpの@yield('title')に'患者一覧'を埋め込む --}}
@section('title', 'BS/下剤推移')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
<canvas id="bsChart" style="width: 100%; height: 300px;"></canvas>
<script>
var complexChartOption = {
    responsive: true,
    scales: {
        yAxes: [{
            id: "y-axis-1",
            type: "linear", 
            position: "left",
            ticks: {
                max: 7,
                min: 1,
                stepSize: .5
            },
        }, {
            id: "y-axis-2",
            type: "linear", 
            position: "right",
            ticks: {
                max: 100,
                min: 0,
                stepSize: 10
            },
            gridLines: {
                drawOnChartArea: false, 
            },
        }],
    }
};
var ctx = document.getElementById("bsChart");
var mixedChart = new Chart(ctx, {
  type: 'bar',
  data: {
    datasets: [
          {
          label: '下剤の使用量',
          data: [{{$total5}}, {{$total4}}, {{$total3}}, {{$total2}}, {{$total1}},],
          borderColor : "rgba(254,97,132,0.8)",
          pointBackgroundColor:"rgba(254,97,132,0.8)",
          fill: false, 
          yAxisID: "y-axis-2",
          type: 'line'
          },
          {
          label: 'ブリストルスケール',
          data: [{{$averagebs5}}, {{$averagebs4}}, {{$averagebs3}}, {{$averagebs2}}, {{$averagebs1}}],
          borderColor : "rgba(4, 239, 122,0.8)",
          backgroundColor : "rgba(4, 239, 122,0.5)",
          yAxisID: "y-axis-1"
          }, ],
    labels: ['{{$prev4Week."～"}}','{{$prev3Week."～"}}','{{$prev2Week."～"}}','{{$prevWeek."～"}}','{{$startDate."～"}}']
  },
  options: complexChartOption
});

</script>
<button type="button" onclick="location.href='/profile/index'">戻る</button>
@endsection