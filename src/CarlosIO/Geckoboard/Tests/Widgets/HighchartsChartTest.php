<?php

namespace CarlosIO\Geckoboard\Widgets;

class HighchartsChartTest extends \PHPUnit_Framework_TestCase
{
    public function testJsonForSingleSeriesData()
    {
        $myWidget = new HighchartsChart();
        $myWidget->setId('56797-7e3d4237-f798-433a-abe7-ac1857dfdf0f');

        $myWidget->setType('line');
        $myWidget->setTitle('Monthly Average Temperature');
        $myWidget->setSubtitle('Source: WorldClimate.com');
        $myWidget->setXAxisLabels(array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'));
        $myWidget->setYAxisTitle('Temperature (°C)');
        $myWidget->setSingleSerie('Tokyo', array(7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6));
        $myWidget->setSingleSerie('London', array(3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8));

        $data = $myWidget->getData();
        $json = json_encode($data);
        $testJson = <<<JSON
{"highchart":{"chart":{"type":"line","style":{"color":"#b9bbbb"},"renderTo":"container","backgroundColor":{"linearGradient":[0,0,0,400],"stops":[[0,"rgb(96, 96, 96)"],[1,"rgb(16, 16, 16)"]]},"borderWidth":0,"borderRadius":15,"lineColor":"rgba(35,37,38,100)","plotShadow":false,"defaultSeriesType":"line","plotBackgroundColor":null,"borderColor":null,"plotBorderColor":null,"plotBorderWidth":0,"zoomType":"x"},"title":{"text":"Monthly Average Temperature","style":{"color":"#FFF","font":"16px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif"}},"subtitle":{"text":"Source: WorldClimate.com","style":{"color":"#DDD","font":"12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif"}},"credits":{"enabled":false},"colors":["#DDDF0D","#7798BF","#55BF3B","#DF5353","#aaeeee","#ff0066","#eeaaee","#55BF3B","#DF5353","#7798BF","#aaeeee"],"xAxis":{"categories":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"gridLineColor":"rgba(255,255,255,0.05)","gridLineWidth":0,"lineColor":"#999","tickColor":"#999","labels":{"style":{"color":"#999","fontWeight":"bold"}},"title":{"style":{"color":"#AAA","font":"bold 12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif"}}},"yAxis":{"title":{"text":"Temperature (\u00b0C)"}},"plotOptions":{"line":{"dataLabels":{"color":"#CCC","enabled":false},"marker":{"lineColor":"#333"}},"spline":{"marker":{"lineColor":"#333"}},"scatter":{"marker":{"lineColor":"#333"}}},"tooltip":{"backgroundColor":{"linearGradient":[0,0,0,50],"stops":[[0,"rgba(96, 96, 96, .8)"],[1,"rgba(16, 16, 16, .8)"]]},"borderWidth":0,"style":{"color":"#FFF"}},"legend":{"itemStyle":{"color":"#CCC"},"itemHoverStyle":{"color":"#FFF"},"itemHiddenStyle":{"color":"#333"}},"toolbar":{"itemStyle":{"color":"#CCC"}},"labels":{"style":{"color":"#CCC"}},"series":[{"name":"Tokyo","data":[7,6.9,9.5,14.5,18.4,21.5,25.2,26.5,23.3,18.3,13.9,9.6],"type":"line"},{"name":"London","data":[3.9,4.2,5.7,8.5,11.9,15.2,17,16.6,14.2,10.3,6.6,4.8],"type":"line"}]}}
JSON;

        $this->assertEquals($testJson, $json);
    }

    public function testJsonForFullData()
    {
        $myWidget = new HighchartsChart();
        $myWidget->setId('56797-7e3d4237-f798-433a-abe7-ac1857dfdf0f');

        $myWidget->setType('line');
        $myWidget->setTitle('Monthly Average Temperature');
        $myWidget->setSubtitle('Source: WorldClimate.com');
        $myWidget->setXAxisLabels(array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'));
        $myWidget->setXAxisTitle('Month');
        $series = array(
            'Tokyo' => array(7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6),
            'London' => array(3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8),
        );
        $myWidget->setSeries($series);

        $data = $myWidget->getData();
        $json = json_encode($data);

        $testJson = <<<JSON
{"highchart":{"chart":{"type":"line","style":{"color":"#b9bbbb"},"renderTo":"container","backgroundColor":{"linearGradient":[0,0,0,400],"stops":[[0,"rgb(96, 96, 96)"],[1,"rgb(16, 16, 16)"]]},"borderWidth":0,"borderRadius":15,"lineColor":"rgba(35,37,38,100)","plotShadow":false,"defaultSeriesType":"line","plotBackgroundColor":null,"borderColor":null,"plotBorderColor":null,"plotBorderWidth":0,"zoomType":"x"},"title":{"text":"Monthly Average Temperature","style":{"color":"#FFF","font":"16px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif"}},"subtitle":{"text":"Source: WorldClimate.com","style":{"color":"#DDD","font":"12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif"}},"credits":{"enabled":false},"colors":["#DDDF0D","#7798BF","#55BF3B","#DF5353","#aaeeee","#ff0066","#eeaaee","#55BF3B","#DF5353","#7798BF","#aaeeee"],"xAxis":{"categories":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"gridLineColor":"rgba(255,255,255,0.05)","gridLineWidth":0,"lineColor":"#999","tickColor":"#999","labels":{"style":{"color":"#999","fontWeight":"bold"}},"title":{"style":{"color":"#AAA","font":"bold 12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif"},"text":"Month"}},"plotOptions":{"line":{"dataLabels":{"color":"#CCC","enabled":false},"marker":{"lineColor":"#333"}},"spline":{"marker":{"lineColor":"#333"}},"scatter":{"marker":{"lineColor":"#333"}}},"tooltip":{"backgroundColor":{"linearGradient":[0,0,0,50],"stops":[[0,"rgba(96, 96, 96, .8)"],[1,"rgba(16, 16, 16, .8)"]]},"borderWidth":0,"style":{"color":"#FFF"}},"legend":{"itemStyle":{"color":"#CCC"},"itemHoverStyle":{"color":"#FFF"},"itemHiddenStyle":{"color":"#333"}},"toolbar":{"itemStyle":{"color":"#CCC"}},"labels":{"style":{"color":"#CCC"}},"series":[{"name":"Tokyo","data":[7,6.9,9.5,14.5,18.4,21.5,25.2,26.5,23.3,18.3,13.9,9.6],"type":"line"},{"name":"London","data":[3.9,4.2,5.7,8.5,11.9,15.2,17,16.6,14.2,10.3,6.6,4.8],"type":"line"}]}}
JSON;

        $this->assertEquals($testJson, $json);
    }

    public function testJsonAddingData()
    {
        $myWidget = new HighchartsChart();
        $myWidget->setId('56797-7e3d4237-f798-433a-abe7-ac1857dfdf0f');

        $myWidget->setType('line');
        $myWidget->setTitle('Monthly Average Temperature');
        $myWidget->setSubtitle('Source: WorldClimate.com');
        $myWidget->setYAxisLabels(array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'));
        $myWidget->setYAxisTitle('Temperature (°C)');

        $series = array(
            'Tokyo' => array(7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6),
            'London' => array(3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8),
        );

        foreach ($series as $city => $values) {
            foreach ($values as $val) {
                $myWidget->addItemSerie($city, $val);
            }
        }

        $data = $myWidget->getData();
        $json = json_encode($data);

        $testJson = <<<JSON
{"highchart":{"chart":{"type":"line","style":{"color":"#b9bbbb"},"renderTo":"container","backgroundColor":{"linearGradient":[0,0,0,400],"stops":[[0,"rgb(96, 96, 96)"],[1,"rgb(16, 16, 16)"]]},"borderWidth":0,"borderRadius":15,"lineColor":"rgba(35,37,38,100)","plotShadow":false,"defaultSeriesType":"line","plotBackgroundColor":null,"borderColor":null,"plotBorderColor":null,"plotBorderWidth":0,"zoomType":"x"},"title":{"text":"Monthly Average Temperature","style":{"color":"#FFF","font":"16px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif"}},"subtitle":{"text":"Source: WorldClimate.com","style":{"color":"#DDD","font":"12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif"}},"credits":{"enabled":false},"colors":["#DDDF0D","#7798BF","#55BF3B","#DF5353","#aaeeee","#ff0066","#eeaaee","#55BF3B","#DF5353","#7798BF","#aaeeee"],"yAxis":{"categories":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"alternateGridColor":null,"minorTickInterval":null,"gridLineColor":"rgba(255, 255, 255, .1)","lineWidth":"rgba(255, 255, 255, .1)","tickWidth":"rgba(255, 255, 255, .1)","labels":{"style":{"color":"#999","fontWeight":"bold"}},"title":{"style":{"color":"#AAA","font":"bold 12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif"},"text":"Temperature (\u00b0C)"},"min":0},"plotOptions":{"line":{"dataLabels":{"color":"#CCC","enabled":false},"marker":{"lineColor":"#333"}},"spline":{"marker":{"lineColor":"#333"}},"scatter":{"marker":{"lineColor":"#333"}}},"tooltip":{"backgroundColor":{"linearGradient":[0,0,0,50],"stops":[[0,"rgba(96, 96, 96, .8)"],[1,"rgba(16, 16, 16, .8)"]]},"borderWidth":0,"style":{"color":"#FFF"}},"legend":{"itemStyle":{"color":"#CCC"},"itemHoverStyle":{"color":"#FFF"},"itemHiddenStyle":{"color":"#333"}},"toolbar":{"itemStyle":{"color":"#CCC"}},"labels":{"style":{"color":"#CCC"}},"series":[{"name":"Tokyo","data":[7,6.9,9.5,14.5,18.4,21.5,25.2,26.5,23.3,18.3,13.9,9.6],"type":"line"},{"name":"London","data":[3.9,4.2,5.7,8.5,11.9,15.2,17,16.6,14.2,10.3,6.6,4.8],"type":"line"}]}}
JSON;

        $this->assertEquals($testJson, $json);
    }

    public function testJsonForPieChart()
    {
        $myWidget = new HighchartsChart();
        $myWidget->setId('56797-7e3d4237-f798-433a-abe7-ac1857dfdf0f');

        $myWidget->setType('pie');
        $myWidget->setTitle('Browser market shares January, 2015 to May, 2015');

        $series = [
          'name' => 'Brands',
          'colorByPoint' => true,
          'data' => [
            [
              'name' => 'Microsoft Internet Explorer',
              'y' => 56.33,
            ],
            [
              'name' => 'Chrome',
              'y' => 24.03,
              'sliced' => true,
              'selected' => true,
            ],
            [
              'name' => 'Firefox',
              'y' => 10.38,
            ],
            [
              'name' => 'Safari',
              'y' => 4.77,
            ],
            [
              'name' => 'Opera',
              'y' => 0.91,
            ],
            [
              'name' => 'Proprietary or Undetectable',
              'y' => 0.2,
            ],
          ]
        ];

        $myWidget->setSeries($series);

        $data = $myWidget->getData();
        $json = json_encode($data);

        $testJson = <<<JSON
{"highchart":{"chart":{"type":"pie","style":{"color":"#b9bbbb"},"renderTo":"container","backgroundColor":{"linearGradient":[0,0,0,400],"stops":[[0,"rgb(96, 96, 96)"],[1,"rgb(16, 16, 16)"]]},"borderWidth":0,"borderRadius":15,"lineColor":"rgba(35,37,38,100)","plotShadow":false,"defaultSeriesType":"line","plotBackgroundColor":null,"borderColor":null,"plotBorderColor":null,"plotBorderWidth":0,"zoomType":"x"},"title":{"text":"Browser market shares January, 2015 to May, 2015","style":{"color":"#FFF","font":"16px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif"}},"subtitle":{"text":null,"style":{"color":"#DDD","font":"12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif"}},"credits":{"enabled":false},"colors":["#DDDF0D","#7798BF","#55BF3B","#DF5353","#aaeeee","#ff0066","#eeaaee","#55BF3B","#DF5353","#7798BF","#aaeeee"],"plotOptions":{"line":{"dataLabels":{"color":"#CCC","enabled":false},"marker":{"lineColor":"#333"}},"spline":{"marker":{"lineColor":"#333"}},"scatter":{"marker":{"lineColor":"#333"}}},"tooltip":{"backgroundColor":{"linearGradient":[0,0,0,50],"stops":[[0,"rgba(96, 96, 96, .8)"],[1,"rgba(16, 16, 16, .8)"]]},"borderWidth":0,"style":{"color":"#FFF"}},"legend":{"itemStyle":{"color":"#CCC"},"itemHoverStyle":{"color":"#FFF"},"itemHiddenStyle":{"color":"#333"}},"toolbar":{"itemStyle":{"color":"#CCC"}},"labels":{"style":{"color":"#CCC"}},"series":[{"name":"Brands","colorByPoint":true,"data":[{"name":"Microsoft Internet Explorer","y":56.33},{"name":"Chrome","y":24.03,"sliced":true,"selected":true},{"name":"Firefox","y":10.38},{"name":"Safari","y":4.77},{"name":"Opera","y":0.91},{"name":"Proprietary or Undetectable","y":0.2}]}]}}
JSON;

        $this->assertEquals($testJson, $json);
    }
}
