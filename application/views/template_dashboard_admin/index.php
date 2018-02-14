<!--/span
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
-->
<?php //echo"<pre>";print_r($GLOBALS);echo"</pre>"; ?>
<div class="span12" id="content">
    <div class="row-fluid">
        <div class="navbar">
            <div class="navbar-inner">
                <ul class="breadcrumb">
                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
                    <li>
                        <a href="#">Dashboard</a> <span class="divider">/</span>
                    </li>
                    <li>
                        <a href="#">Settings</a> <span class="divider">/</span>
                    </li>
                    <li class="active">Tools</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Statistics</div>

            </div>
            <div class="block-content collapse in">

                <script src="../../../assets/Highcharts/code/highcharts.js"></script>
                <script src="../../../assets/Highcharts/code/highcharts-3d.js"></script>
                <script src="../../../assets/Highcharts/code/modules/exporting.js"></script>

                <div id="container" class="span3" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

                <script type="text/javascript">
                    // Radialize the colors
                    Highcharts.setOptions({
                        colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
                            return {
                                radialGradient: {
                                    cx: 0.5,
                                    cy: 0.3,
                                    r: 0.7
                                },
                                stops: [
                                    [0, color],
                                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                                ]
                            };
                        })
                    });

                    // Build the chart
                    Highcharts.chart('container', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: 'Médicos Cadastrados'
                        },
                        tooltip: {
                            pointFormat: '{point.y}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: false,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.y}</b>: {point.percentage:.1f} %',
                                    style: {
                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                    },
                                    connectorColor: 'silver'
                                }
                            }
                        },
                        series: [{
                            name: 'Brands',
                            data: [
                                { name: 'Basico', y: <?php echo $plano2; ?> },
                                {
                                    name: 'Free',
                                    y: <?php echo $plano1; ?>,
                                    sliced: true,
                                    selected: true
                                },
                                { name: 'Premium', y: <?php echo $plano3; ?> }
                            ]
                        }]
                    });
                </script>

                <div class="span3">
                    <div class="chart" data-values="[['june',28,38,75,50,38,40,37],['jully',50,22,42,34,37,45,41]]"><?php echo count($especialidades); ?></div>
                    <div class="chart-bottom-heading"><span class="label label-info">Especialidades Medicas</span>

                    </div>
                </div>
                <div class="span3">
                    <div class="chart" data-values="[['june',28,38,75,50,38,40,37],['jully',50,22,42,34,37,45,41]]"><?php echo count($pacientes); ?></div>
                    <div class="chart-bottom-heading"><span class="label label-info">Pacientes Cadastrados</span>

                    </div>
                </div>
                <div class="span3">
                    <div class="chart" data-values="[['june',28,38,75,50,38,40,37],['jully',50,22,42,34,37,45,41]]"><?php echo count($consultas); ?></div>
                    <div class="chart-bottom-heading"><span class="label label-info">Consultas</span>

                    </div>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
