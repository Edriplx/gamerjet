@extends('adminlte::page')

@section('title', __('Dashboard'))
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5><span class="text-center fa fa-home"></span> @yield('title')</h5>
                </div>
                <div class="card-body">
                    <h5>Hola <strong>{{ Auth::user()->name }},</strong>
                        {{ __('Bienvenido a Gamer Fest') }}</h5>
                    </br>
                    <hr>
                    <div class="row w-100">
                        <div class="col-md-3">
                            <div class="card border-info mx-sm-1 p-3">
                                <div class="card border-info text-info p-3"><span class="text-center fas fa-user"
                                        aria-hidden="true"></span></div>
                                <div class="text-info text-center mt-3">
                                    <h4>Total de jugadores</h4>
                                </div>
                                <div class="text-info text-center mt-2">
                                    <h1>{{ $sumas['total_jugadores'] }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-success mx-sm-1 p-3">
                                <div class="card border-success text-success p-3 my-card"><span
                                        class="text-center fas fa-door-closed" aria-hidden="true"></span></div>
                                <div class="text-success text-center mt-3">
                                    <h4>Inscripciones totales</h4>
                                </div>
                                <div class="text-success text-center mt-2">
                                    <h1>{{ $sumas['total_inscripciones'] }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-danger mx-sm-1 p-3">
                                <div class="card border-danger text-danger p-3 my-card"><span
                                        class="text-center fas fa-users" aria-hidden="true"></span></div>
                                <div class="text-danger text-center mt-3">
                                    <h4>Equipos totales</h4>
                                </div>
                                <div class="text-danger text-center mt-2">
                                    <h1>{{ $sumas['total_equipos'] }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-warning mx-sm-1 p-3">
                                <div class="card border-warning text-warning p-3 my-card"><span
                                        class="text-center fas fa-calendar-plus" aria-hidden="true"></span></div>
                                <div class="text-warning text-center mt-3">
                                    <h4>Total de horarios creados</h4>
                                </div>
                                <div class="text-warning text-center mt-2">
                                    <h1>{{ $sumas['total_horarios'] }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Juegos de carreras mas populares</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="grafico1"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Juegos de shooters mas populares</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="grafico2"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	window.livewire.on('closeModal', () => {
		$('#createDataModal').modal('hide');
	});
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
	const grafico1 = JSON.parse(`<?php echo $data; ?>`);
	const grafico1ChartCanvas = document.getElementById('grafico1').getContext('2d');
	const grafico1Chart = new Chart(grafico1ChartCanvas, {
		type: 'bar',
		data: {
			labels: grafico1.label,
			datasets: [{
				data: grafico1.data,
				backgroundColor: [
					'red',
					'yellow',
					'black',
					'green',
					'pink',
					'brown'
				],
				borderWidth: 1
			}]
		},
		options: {
            responsive: true,
            maintainAspectRatio: false,
			scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            },
            plugins: {
				legend: {
					display: false
				}
			}
		}
	});
	/////////////////////////////
	const grafico2 = JSON.parse(`<?php echo $data; ?>`);
	const grafico2ChartCanvas = document.getElementById('grafico2').getContext('2d');
	const grafico2Chart = new Chart(grafico2ChartCanvas, {
		type: 'bar',
		data: {
			labels: grafico2.labelc,
			datasets: [{
				data: grafico2.datac,
				backgroundColor: [
					'yellow',
					'green',
					'red',
					'black',
					'brown',
					'pink'
				],
				borderWidth: 1
			}]
		},
		options: {
            responsive: true,
            maintainAspectRatio: false,
			scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            },
            plugins: {
				legend: {
					display: false
				}
			}
		}
	});
</script>
@stop