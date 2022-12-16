@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <!-- creamos una fila -->
    <div class="row">

        
        <div class="col-lg-2">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h4 id="totalCategorias"></h4>

                    <p>Categorias registradas</p>
                </div>
                
                <div class="icon">
                    <i class="ion ion-clipboard"></i>
                </div>
                <a style="cursor:pointer;" class="small-box-footer">Mas Información <i class="fas fa-arrow-circle-right"></i></a>
        </div>        
    </div>

    <div class="col-lg-2">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h4 id="totalVideojuegos"></h4>

                    <p>Juegos registrados</p>
                </div>
                
                <div class="icon">
                    <i class="ion ion-clipboard"></i>
                </div>
                <a style="cursor:pointer;" class="small-box-footer">Mas Información <i class="fas fa-arrow-circle-right"></i></a>
        </div>        
    </div>

    <div class="col-lg-2">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h4 id="totalAulas"></h4>

                    <p>Aulas registradas</p>
                </div>
                
                <div class="icon">
                    <i class="ion ion-clipboard"></i>
                </div>
                <a style="cursor:pointer;" class="small-box-footer">Mas Información <i class="fas fa-arrow-circle-right"></i></a>
        </div>        
    </div>

    <div class="col-lg-2">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h4 id="totalHorarios"></h4>

                    <p>Horarios registrados</p>
                </div>
                
                <div class="icon">
                    <i class="ion ion-clipboard"></i>
                </div>
                <a style="cursor:pointer;" class="small-box-footer">Mas Información <i class="fas fa-arrow-circle-right"></i></a>
        </div>        
    </div>
    
    
@stop


@section('css')
    <link rel="stylesheet" href="css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <script>
        $(document).ready(function(){
        $.ajax({
            url: "ajax/dashboard.ajax.php",
            method: 'POST',
            dataType: 'json', 
            success:function(respuesta) {
                console.log("respuesta",respuesta);
                $("#totalCategorias").html(respuesta[0]['totalCategorias']);
            }
        });
    })
@stop