<?php

namespace CarlosIO\Geckoboard\Widgets;

/**
 * Class LineChart.
 */
class HighchartsChart extends Widget
{
    protected $type;

    protected $title;

    protected $subtitle;

    protected $series = array();

    protected $xAxisTitle;

    protected $xAxisLabels = array();

    protected $yAxisTitle;

    protected $yAxisLabels = array();

    /**
     * @var array
     */
    protected $defaultStyle = [];

    /**
     * @var string | array
     */
    protected $backgroundColor = '#FFFFFF';

    /**
     * @var integer
     */
    protected $borderWidth = 0;

    /**
     * @var integer
     */
    protected $borderRadius = 0;

    /**
     * @return array
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @param array $series
     *
     * @return $this
     */
    public function setSeries($series)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param mixed $subtitle
     *
     * @return $this
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return array
     */
    public function getXAxisLabels()
    {
        return $this->xAxisLabels;
    }

    /**
     * @param array $xAxisLabels
     *
     * @return $this
     */
    public function setXAxisLabels($xAxisLabels)
    {
        $this->xAxisLabels = $xAxisLabels;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getXAxisTitle()
    {
        return $this->xAxisTitle;
    }

    /**
     * @param mixed $xAxisTitle
     *
     * @return $this
     */
    public function setXAxisTitle($xAxisTitle)
    {
        $this->xAxisTitle = $xAxisTitle;

        return $this;
    }

    /**
     * @return array
     */
    public function getYAxisLabels()
    {
        return $this->yAxisLabels;
    }

    /**
     * @param array $yAxisLabels
     *
     * @return $this
     */
    public function setYAxisLabels($yAxisLabels)
    {
        $this->yAxisLabels = $yAxisLabels;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getYAxisTitle()
    {
        return $this->yAxisTitle;
    }

    /**
     * @param mixed $yAxisTitle
     *
     * @return $this
     */
    public function setYAxisTitle($yAxisTitle)
    {
        $this->yAxisTitle = $yAxisTitle;

        return $this;
    }

    public function setSingleSerie($serieName, $serie)
    {
        $this->series[$serieName] = $serie;

        return $this;
    }

    public function addItemSerie($serieName, $item)
    {
        if (!isset($this->series[$serieName])) {
            $this->setSingleSerie($serieName, array());
        }
        $this->series[$serieName][] = $item;
    }

    public function setDefaultStyle($styles)
    {
        $this->defaultStyle = $styles;
        return $this;
    }

    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;
        return $this;
    }

    public function setBorderWidth($borderWidth)
    {
        $this->borderWidth = $borderWidth;
        return $this;
    }

    public function setBorderRadius($borderRadius)
    {
        $this->borderRadius = $borderRadius;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        $returnValues = [
            'chart' => [
                'type' => $this->getType(),
                'style' => $this->defaultStyle,
                'renderTo' => 'container',
                'backgroundColor' => $this->backgroundColor,
                'borderWidth' => $this->borderWidth,
                'borderRadius' => $this->borderRadius,
                'lineColor' => 'rgba(35,37,38,100)',
                'plotShadow' => false,
                'defaultSeriesType' => 'line',
                'plotBackgroundColor' => null,
                'borderColor' => null,
                'plotBorderColor' => null,
                'plotBorderWidth' => 0,
                'zoomType' => 'x',
            ],
            'title' => [
                'text' => $this->getTitle(),
                'style' => [
                    'color' => '#FFF',
                    'font' => '16px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif',
                ],
            ],
            'subtitle' => [
                'text' => $this->getSubtitle(),
                'style' => [
                    'color' => '#DDD',
                    'font' => '12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif',
                ],
            ],
            /*Criar Método*/
            'credits' => [
                'enabled' => false,
            ],
        ];

        $returnValues['colors'] = [
            "#DDDF0D", "#7798BF", "#55BF3B", "#DF5353", "#aaeeee", "#ff0066",
            "#eeaaee", "#55BF3B", "#DF5353", "#7798BF", "#aaeeee",
        ];

        if ($this->getXAxisLabels()) {
            $returnValues['xAxis']['categories'] = $this->getXAxisLabels();

            /*Criar método*/
            $returnValues['xAxis']['gridLineColor'] = 'rgba(255,255,255,0.05)';
            $returnValues['xAxis']['gridLineWidth'] = 0;
            $returnValues['xAxis']['lineColor'] = '#999';
            $returnValues['xAxis']['tickColor'] = '#999';
            $returnValues['xAxis']['labels'] = [
                'style' => [
                    'color' => '#999',
                    'fontWeight' => 'bold',
                ],
            ];
            $returnValues['xAxis']['title'] = [
                'style' => [
                    'color' => '#AAA',
                    'font' => 'bold 12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif',
                ],
            ];
        }

        if ($this->getYAxisLabels()) {
            $returnValues['yAxis']['categories'] = $this->getYAxisLabels();
            $returnValues['yAxis']['alternateGridColor'] = null;
            $returnValues['yAxis']['minorTickInterval'] = null;
            $returnValues['yAxis']['gridLineColor'] = 'rgba(255, 255, 255, .1)';
            $returnValues['yAxis']['lineWidth'] = 'rgba(255, 255, 255, .1)';
            $returnValues['yAxis']['tickWidth'] = 'rgba(255, 255, 255, .1)';
            $returnValues['yAxis']['labels'] = [
                'style' => [
                    'color' => '#999',
                    'fontWeight' => 'bold',
                ],
            ];
            $returnValues['yAxis']['title'] = [
                'style' => [
                    'color' => '#AAA',
                    'font' => 'bold 12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif',
                ],
            ];
            $returnValues['yAxis']['min'] = 0;
        }

        if ($this->getXAxisTitle()) {
            $returnValues['xAxis']['title']['text'] = $this->getXAxisTitle();
        }

        if ($this->getYAxisTitle()) {
            $returnValues['yAxis']['title']['text'] = $this->getYAxisTitle();
        }

        $returnValues['plotOptions'] = [
            'line' => [
                'dataLabels' => [
                    'color' => '#CCC',
                    'enabled' => false,
                ],
                'marker' => [
                    'lineColor' => '#333',
                ],
            ],
            'spline' => [
                'marker' => [
                    'lineColor' => '#333',
                ],
            ],
            'scatter' => [
                'marker' => [
                    'lineColor' => '#333',
                ],
            ],
        ];

        $returnValues['tooltip'] = [
            'backgroundColor' => [
                'linearGradient' => [0, 0, 0, 50],
                'stops' => [
                    [0, 'rgba(96, 96, 96, .8)'],
                    [1, 'rgba(16, 16, 16, .8)'],
                ],
            ],
            'borderWidth' => 0,
            'style' => [
                'color' => '#FFF',
            ],
        ];

        /*Criar Métodos*/
        $returnValues['legend'] = [
            'itemStyle' => [
                'color' => '#CCC',
            ],
            'itemHoverStyle' => [
                'color' => '#FFF',
            ],
            'itemHiddenStyle' => [
                'color' => '#333',
            ],
        ];

        $returnValues['toolbar'] = [
            'itemStyle' => [
                'color' => '#CCC',
            ],
        ];

        $returnValues['labels'] = [
            'style' => [
                'color' => '#CCC',
            ],
        ];

        return array('highchart' => $this->addSeriesData($returnValues));
    }

    /**
     * @param $returnValues
     *
     * @return mixed
     */
    private function addSeriesData($returnValues)
    {
        switch ($this->getType()) {
            case 'line':
                foreach ($this->getSeries() as $serieName => $serieValues) {
                    $returnValues['series'][] = array(
                        'name' => (isset($serieValues['name']) && $serieValues['name']) ? $serieValues['name'] : $serieName,
                        'data' => (isset($serieValues['data']) && $serieValues['data']) ? $serieValues['data'] : $serieValues,
                        'type' => (isset($serieValues['type']) && $serieValues['type']) ? $serieValues['type'] : 'line',
                    );
                }
                break;
            case 'pie':
                $returnValues['series'][] = $this->series;
                break;
            default:
                # code...
                break;
        }

        return $returnValues;
    }
}
