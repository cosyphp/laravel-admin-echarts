<div id="chart-{{$chartId}}" style="height:{{$height}};">加载中....</div>
<script>
$(function () {
    var chartJson = '{!! $chartJson !!}';
    var chartData = JSON.parse(chartJson);
	var myChart_{{$chartId}} = echarts.init(document.getElementById('chart-{{$chartId}}'),null,{renderer: 'canvas'});
	myChart_{{$chartId}}.setOption({
		title: {
			text: chartJson.title,
            x: 'left'
		},
		tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
		},
		legend: {
            type: 'scroll',
            orient: 'vertical',
            right: 'left',
			data: chartData.legends
		},
		series: [
            {
                name: chartData.seriesName,
                type: 'pie',
                radius : '55%',
                center: ['50%', '50%'],
                data: chartData.seriesData,
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
	});
});
</script>