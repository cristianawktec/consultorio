<!--/span-->
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
                <div class="span3">
                    <div class="chart" data-values="[['june',28,38,75,50,38,40,37],['jully',50,22,42,34,37,45,41]]" ><?php echo count($medicos); ?></div>
                    <div class="chart-bottom-heading"><span class="label label-info">Medicos Cadastrados</span>

                    </div>
                </div>
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
