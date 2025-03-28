<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recibo</title>
</head>
<style>

    header{
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        text-align: center;
    }

    header img{
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    body{
        margin-top: 120px;
        margin-bottom: 40px;
        counter-reset: page;
        height: 100%;
        background-image: url("storage/img/escudo_fondo.png");
        background-size: cover;
        background-position: 0 -50px !important;
        font-family: sans-serif;
        font-weight: normal;
        line-height: 1.5;
        text-transform: uppercase;
        font-size: 9px;
    }

    footer{
        position: fixed;
        bottom: 0cm;
        left: 0cm;
        right: 0cm;
        background: #5E1D45;
        color: white;
        font-size: 12px;
        text-align: right;
        padding-right: 10px;
        text-transform: lowercase;
    }

    .fot{
        display: flex;
        padding: 2px;
        text-align: center;
    }

    .fot p{
        display: inline-block;
        width: 33%;
        margin: 0;
    }

    h1{
        font-size: 11;
        font:bold;
        margin: 0;
    }

    .header{
        margin-bottom: 5px;
        width: 100%;
        table-layout: fixed;
    }

    .data{
        text-align: right;
    }

    .table{
        width: 100%;
        table-layout: auto;
    }

    .th_table{
        background: #e2e2e2;
        padding: 5 0;
    }

    .content{
        border-bottom: 1px solid #ddd;
        padding: 5 20;
    }

    p{
        margin: 0;
    }

    img{
        width: 200px;
    }

    .text_center{
        text-align: center;
    }

    .footer{
        margin-top: 150px;
        width: 100%;
        table-layout: fixed;
        text-align: center;

    }

    .footer tbody {
        vertical-align: top;
    }

    .linea{
        width: 50%;
        border-top: 1px solid black;
        text-align: center;
    }

</style>

<body >

    <header>

        <table class="header">

            <thead>

                <tr>

                    <th>

                        <img src="{{ public_path('storage/img/logo2.png') }}" alt="Logo">

                    </th>

                    <th>

                        <h1>Recibo de entrega</h1>
                        <p>Sistema de Almacén</p>

                    </th>

                    <th class="data">

                        <p>Solicitud número: {{ $solicitud->folio }}</p>
                        <p>Impreso por:</p>
                        <p>{{ auth()->user()->name }}</p>

                    </th>

                </tr>

            </thead>

        </table>

    </header>

    <main>

        <div>

            <table class="table">

                <thead class="th_table">

                    <tr >

                        <th>Cantidad</th>
                        <th>Artículo</th>

                    </tr>

                </thead>


                <tbody >

                    @foreach($solicitud->detalles as $detalle)

                        <tr>

                            <td class="content text_center">
                                <p >{{ $detalle->cantidad }}</p>
                            </td>

                            <td class="content">
                                {{ $detalle->articuloDisponible->articulo->nombre }}
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

            <table class="footer">

                <thead></thead>

                <tbody>

                    <tr>

                        <td>
                            <div style="width: 100%;text-align: center;">
                                <p class="linea" style="margin-left: auto; margin-right: auto;">Sello</p>
                        </td>

                        <td>

                            <div class="linea" style="margin-left: auto; margin-right: auto;">
                                <p>Solicitante</p>
                                <p>{{ $solicitud->creadoPor->name }}</p>
                            </div>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </main>

    <footer>

        <div class="fot">
            <p>www.irycem.michoacan.gob.mx</p>
        </div>

    </footer>

</body>
</html>
