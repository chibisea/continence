 {{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- profile.blade.phpの@yield('title')に'患者一覧'を埋め込む --}}
@section('title', 'BS/下剤推移')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
<canvas id="bsChart"></canvas>
<script>
var mixedChart = new Chart(ctx, {
  type: 'bar',
  data: {
    datasets: [{
          label: 'ブリストルスケール',
          data: [10, 20, 30, 40]
        }, {
          label: '下剤の使用量',
          data: [50, 50, 50, 50],

          // このデータセットを線グラフにする
  type: 'line'
        }],
    labels: ['1月', '2月', '3月', '4月']
  },
  options: options
});
</script>
<button type="button" onclick="location.href='/profile/index'">戻る</button>
@endsection