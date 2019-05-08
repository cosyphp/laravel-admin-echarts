<?php

namespace Encore\ECharts;

use Encore\Admin\Extension;

class ECharts extends Extension
{
    public $name = 'echarts';
	public $views = __DIR__ . '/../resources/views';
    public $assets = __DIR__.'/../resources/assets';

	public static function __callStatic($name, $arguments)
    {
        return view('echarts::'.$name, $arguments[0]);
    }

}