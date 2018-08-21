@extends('principal')

@section('conteudo')

<div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3><font style="vertical-align: inherit;"><small><font style="vertical-align: inherit;">Subtítulo do título do Gráfico de</font></small><font style="vertical-align: inherit;"> Atividades de Rede</font></font><small><font style="vertical-align: inherit;"></font></small></h3>
                  </div>
                  <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">14 de junho de 2018 - 13 de julho de 2018</font></font></span> <b class="caret"></b>
                    </div>
                  </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div id="chart_plot_01" class="demo-placeholder" style="padding: 0px; position: relative;"><canvas class="flot-base" width="791" height="280" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 791px; height: 280px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 98px; top: 264px; left: 122px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">02 de janeiro</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 98px; top: 264px; left: 247px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">03 de janeiro</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 98px; top: 264px; left: 372px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">04 de janeiro</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 98px; top: 264px; left: 497px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">05 de janeiro</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 98px; top: 264px; left: 622px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">06 de janeiro</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 98px; top: 264px; left: 747px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">07 de janeiro</font></font></div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 252px; left: 13px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 232px; left: 7px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 213px; left: 7px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 194px; left: 7px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">30</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 174px; left: 7px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">40</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 155px; left: 7px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">50</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 136px; left: 7px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">60</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 116px; left: 7px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">70</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 97px; left: 7px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">80</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 78px; left: 7px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">90</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 58px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">100</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 39px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">110</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 20px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">120</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">130</font></font></div></div></div><canvas class="flot-overlay" width="791" height="280" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 791px; height: 280px;"></canvas></div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                  <div class="x_title">
                    <h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Melhor desempenho da campanha</font></font></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Campanha no Facebook</font></font></p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80" aria-valuenow="79" style="width: 80%;"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Campanha do Twitter</font></font></p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60" aria-valuenow="59" style="width: 60%;"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mídia Convencional</font></font></p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40" aria-valuenow="39" style="width: 40%;"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Placas de Bill</font></font></p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50" aria-valuenow="49" style="width: 50%;"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="clearfix"></div>
              </div>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
