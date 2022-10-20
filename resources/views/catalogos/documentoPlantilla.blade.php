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

    <div id="headerDoc">
        {{-- <div>
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
        </div> --}}
    </div>
    <div id="contentDoc">
        {{!! $plantilla->cPlantilla !!}}
     </div>
    <div id="footerDoc">
        <p class="page" style="text-align: left; font-size: 12px; line-height: 10px; font-family: 'Barlow-Regular';">
            footer
        </p>
        <p style="text-align: right; font-size: 12px; line-height: 10px; font-family: 'Barlow-Regular';">
            footer2
        </p>
    </div>
</body>

</html>
