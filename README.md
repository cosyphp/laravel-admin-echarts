# laravel-admin-echarts
laravel-admin的echarts统计图表扩展包
## 安装

```
$ composer require cosyphp/laravel-admin-echarts

$ php artisan vendor:publish --tag=laravel-admin-echarts
```
## 使用
- 折线图
```
public function line(Content $content)
{
    return $content->header('echarts')
        ->row(function(Row $row){
            $row->column(8, function (Column $column) {
                $chartData = [
                    'title' => '示例折线图',
                    'legend' => [
                        'data' => ['已付款订单','未付款订单','待发货订单','已完成订单'],
                        'selected' => ['已付款订单' => true, '未付款订单' => false, '待发货订单' => true, '已完成订单' => true]
                    ],
                    'yAxisName' => '订单量',
                    'xAxisData' => ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
                    'seriesData' => [
                        [
                            'name' => '已付款订单',
                            'type' => 'line',
                            'stack' => '总量',
                            'data' => [120, 132, 101, 134, 90, 230, 210, 134, 90, 230, 210, 300]
                        ],
                        [
                            'name' => '未付款订单',
                            'type' => 'line',
                            'stack' => '总量',
                            'data' => [220, 182, 191, 234, 290, 330, 310, 101, 134, 90, 230, 210]
                        ],
                        [
                            'name' => '待发货订单',
                            'type' => 'line',
                            'stack' => '总量',
                            'data' => [150, 232, 201, 154, 190, 330, 410, 182, 191, 234, 290, 330]
                        ],
                        [
                            'name' => '已完成订单',
                            'type' => 'line',
                            'stack' => '总量',
                            'data' => [320, 332, 301, 334, 390, 330, 320, 201, 154, 190, 330, 410]
                        ]
                    ]
                ];
                $options = [
                    'chartId' => str_random(),
                    'height' => '600px',
                    'chartJson' => json_encode($chartData)
                ];
                $column->row(new Box('折线图', ECharts::line($options)));
            });
        });
}
```
- 饼状图
```
public function pie(Content $content)
{
    return $content->header('echarts')
        ->row(function (Row $row) {
            $row->column(6, function (Column $column) {
                $chartData = [
                    'title' => '示例饼状图',
                    'legends' => ["未充值人数（221105）", "总充值人数（18315）"],
                    'seriesName' => '总充值占比',
                    'seriesData' => [
                        [
                            'name' => '未充值人数',
                            'value' => 221105,
                        ],
                        [
                            'name' => '总充值人数',
                            'value' => 18315,
                        ]
                    ]
                ];
                $options = [
                    'chartId' => str_random(),
                    'height' => '500px',
                    'chartJson' => json_encode($chartData)
                ];
                $column->row(new Box('饼状图', ECharts::pie($options)));
            });
        });
}
```
## 提示
上面使用说明中的数据，可以从数据库或者其他地方获取后进行组装整理成相应的格式，然后传参给 `ECharts` 即可。
## 联系我
在使用中有任何问题，欢迎反馈给我，可以通过以下联系方式跟我交流

* 邮箱: `cosyphp@qq.com`
* QQ: `85082368`

License
------------
Licensed under [The MIT License (MIT)](LICENSE).