<div id="chart-{{$chartId}}" style="height:{{$height}};">加载中....</div>
<script>
$(function () {
    var chartJson = '{!! $chartJson !!}';
    var chartData = JSON.parse(chartJson);
	var myChart_{{$chartId}} = echarts.init(document.getElementById('chart-{{$chartId}}'),null,{renderer: 'canvas'});
	myChart_{{$chartId}}.setOption({
        color: [
            '#ff7f50', '#87cefa', '#ff00ff', '#32cd32', '#7b68ee',
            '#0A0A0A', '#b8860b', '#cd5c5c', '#ffd700', '#00fa9a'
        ],
		title: {
            show: false,
			text: chartData.title
		},
		legend: {
            left: 'left',
			data: chartData.legend.data,
            selected: chartData.legend.selected
		},
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'cross'
            }
        },
		toolbox: {
            show: true,
            feature: {
                magicType : {show: true, type: ['line','bar']},
            }
		},
        calculable: true,
		xAxis: {
			type: 'category',
			boundaryGap: false,
			data: chartData.xAxisData
		},
        yAxis: [
            {
                name: chartData.yAxisName,
                type: 'value',
                position: 'left'
            }
        ],
		series: chartData.seriesData,
        dataZoom:{
            show:true
        }
	});
});
</script>