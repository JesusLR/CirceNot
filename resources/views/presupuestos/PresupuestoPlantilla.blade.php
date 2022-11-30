<?php

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Presupuesto</title>
    <style type="text/css">
        @page {
            margin: 20px 50px;
        }

        #header {
            position: fixed;
            top: -8px;
            left: 0px;
            right: 0px;
            height: 100px;
            font-family: 'Barlow-Regular';
            /* background-color: orange; */
        }

        #footer {
            position: fixed;
            bottom: 0px;
            left: 0px;
            right: 0px;
            height: 80px;
            /*background-color: lightblue; */
        }

        .table {
            width: 100%;
            margin-bottom: 10px;
        }

        .table>thead>tr>th,
        .table>tbody>tr>th,
        .table>tfoot>tr>th,
        .table>thead>tr>td,
        .table>tbody>tr>td,
        .table>tfoot>tr>td {
            border-top: none;
            font-family: 'Barlow-Regular' !important;
            /*font-family: Arial;*/
            font-size: 10px;
            /*line-height: 1;*/
        }

        .firma {
            font-size: 10px;
            overflow-wrap: break-word;
            word-wrap: break-word;
            hyphens: auto;
            text-align: justify;
        }

        .watermark {
            position: fixed;

            /**
        Set a position in the page for your image
        This should center it vertically
      **/
            bottom: 1px;
            left: 1px;

            /** Change image dimensions**/
            width: 700px;
            height: 900px;

            /** Your watermark should be behind every content**/
            z-index: -1000;
        }
    </style>
</head>

<body style='margin-top:100px;margin-left:0;margin-right:0; margin-bottom: 10px;'>
    @if ($lMarcaAgua == true)
        <div class="watermark">
            <img src="img/Marca_Agua_VistaPrevia.png" height="100%" width="100%" style="opacity: 0.5;" />
        </div>
    @endif
    <div id="header">
        <div>
            <img class="logo" src="img/R.png" width="240" height="60">
            <table class="table" width="100%" style="border: hidden;">
                <tr>
                    <td width="15%" style="border: hidden;"></td>
                    <td width="70%" text-align="center" valign="top"
                        style="text-align: center; font-size: 16px; line-height: 20px; border: hidden;">
                        <!--<h3>Documento emitido por el Departamento de Validación Catastral, Acervo y Enlace Municipal de la
                            Dirección del Catastro del Instituto de Seguridad Jurídica Patrimonial de Yucatán.</h3>-->
                        <h3>PRESUPUESTO </h3>
                    </td>
                    <td width="15%" style="border: hidden;"></td>
                </tr>
            </table>
        </div>
    </div>
    <div id="footer">
        <p class="page" style="text-align: left; font-size: 12px; line-height: 10px; font-family: 'Barlow-Regular';">
            footer
        </p>
        <p style="text-align: right; font-size: 12px; line-height: 10px; font-family: 'Barlow-Regular';">
            footer2
        </p>
    </div>
    <div id="content">
        <div class="row">
            <table>

                {{-- <tr>
                <td style="text-align: right; font-size: 16px;">{{ $presupuesto->idClient}}<br /><br /></td>
            </tr> --}}
                <tr>
                    <td style="font-size: 16px;">Nombre Notaria: </td>
                </tr>

                <tr>
                    <td style="font-size: 16px;">Datos:</td>
                </tr>

            </table>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <caption>Lista de Servicios:</caption>
                    <hr style="border:0px; border-top: 5px double #000;">
                <table class="table">

                    <thead>
                        <tr>
                            <th scope="col">Servicio</th>
                            <th scope="col">Costo</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicios as $serv)
                            <tr>
                                <th scope="row">{{ $serv->name }}</th>
                                <td>{{ $serv->Price }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <caption>Lista de Totales:</caption>
                    <hr style="border:0px; border-top: 5px double #000;">
                <table class="table">

                    <thead>
                        <tr><td scope="col">Honorarios</td><td scope="row">{{ $presupuesto->honorarios }}</td></tr>
                        <tr><td scope="col">IVA</td><td scope="row">{{ $presupuesto->ivaHonorarios }}</td></tr>
                        <tr><td scope="col">Total</td><td scope="row">{{ $presupuesto->totalHonorarios }}</td></tr>
                        <tr><td scope="col">subtotal Servicios</td><td scope="row">{{ $presupuesto->subtotalServicios }}</td></tr>
                        <tr><td scope="col">Totales</td><td scope="row">{{ $presupuesto->totales }}</td></tr>


                    </thead>
                    {{-- <tbody>
                            <tr></tr>
                            <tr></tr>
                            <tr></tr>
                            <tr></tr>
                            <tr></tr>

                    </tbody> --}}
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            {!! $idPresupuestoPDF !!}
            </div>
        </div>
    </div>
</body>

</html>
