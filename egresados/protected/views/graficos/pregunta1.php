<?php
    Yii::app()->clientScript->registerCoreScript('jquery');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/highcharts/highcharts.js');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/highcharts/modules/exporting.js');
    Yii::app()->clientScript->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
    $this->pageTitle=Yii::app()->name . ' - Pregunta1';
?>


<h1>Pregunta 1</h1>

<?php $total = $pregunta1[0]+$pregunta1[1]+$pregunta1[2]+$pregunta1[3]+$pregunta1[4]+$pregunta1[5]; ?>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        
        var colors = Highcharts.getOptions().colors,
            categories = ['Antes de egresar.', '1 mes.', '2 a 3 meses.', '3 a 6 meses.', '6 meses a 1 año.','Más de 1 año.'],
            name = '',
            data = [{
                    y: <?php echo round(($pregunta1[0]/$total*100),2)?>,
                    color: colors[0]
                }, {
                    y: <?php echo round(($pregunta1[1]/$total*100),2)?>,
                    color: colors[1]
                }, {
                    y: <?php echo round(($pregunta1[2]/$total*100),2)?>,
                    color: colors[2]
                }, {
                    y: <?php echo round(($pregunta1[3]/$total*100),2)?>,
                    color: colors[3]
                }, {
                    y: <?php echo round(($pregunta1[4]/$total*100),2)?>,
                    color: colors[4]
                },{
                    y: <?php echo round(($pregunta1[5]/$total*100),2)?>,
                    color: colors[5]
                }
            ];
    
        function setChart(name, categories, data, color) {
			chart.xAxis[0].setCategories(categories, false);
			chart.series[0].remove(false);
			chart.addSeries({
				name: name,
				data: data,
				color: color || 'white'
			}, false);
			chart.redraw();
                        
        }
    
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: 'Tiempo requerido en encontrar trabajo.'
            },
            subtitle: {
                text: 'De un total de '+ <?php echo $total ?>+' encuestas.'
            },
            xAxis: {
                categories: categories
            },
            yAxis: {
                title: {
                    text: 'Porcentaje total.'
                }
            },
            plotOptions: {
                column: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function() {
                                var drilldown = this.drilldown;
                                if (drilldown) { // drill down
                                    setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                                } else { // restore
                                    setChart(name, categories, data);
                                }
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        color: colors[0],
                        style: {
                            fontWeight: 'bold'
                        },
                        formatter: function() {
                            return this.y +'%';
                        }
                    }
                }
            },
            tooltip: {
                formatter: function() {
               
                    var point = this.point,
                        s = this.x +':<b>'+ Math.round(this.y *<?php echo ($total/100)?>) +' personas </b><br/>';
                    if (point.drilldown) {
                        s += 'Click to view '+ point.category +' versions';
                    } else {
                        s += '';
                    }
                    return s;
                }
            },
            series: [{
                name: 'series',
                data: data,
                color: 'red',
                showInLegend: false
            }],
            exporting: {
                enabled: false
            }
        });
    });

});
		</script>
<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>