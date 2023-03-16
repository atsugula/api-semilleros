<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex,nofollow" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0;" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        body {
            font-family: Verdana;
            margin-top: 150px;
        }

        .even {
            background: #fbf8f0;
        }

        .odd {
            background: #fefcf9;
        }

        .page
        {
            page-break-after: auto;
            page-break-inside: auto;
        }

        .ocultarcolumnas {
            visibility: hidden;
        }

        table,
        td,
        th {
            border: 1px solid #595959;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 3.5px;
            width: 30px;
            height: 25px;
        }

        th {
            background: #f0e6cc;
        }

        .even {
            background: #fbf8f0;
        }

        .odd {
            background: #fefcf9;
        }

        p {
            white-space: normal;
            font-size: 17px;
            text-rendering: geometricPrecision;
        }
    </style>
</head>

<body>
    <table width="100%" style="">
        <thead>
            <tr>
                <td class="ocultarcolumnas" style="width: 2%">1</td>
                <td class="ocultarcolumnas" style="width: 2%">2</td>
                <td class="ocultarcolumnas" style="width: 2%">3</td>
                <td class="ocultarcolumnas" style="width: 2%">4</td>
                <td class="ocultarcolumnas" style="width: 2%">5</td>
                <td class="ocultarcolumnas" style="width: 2%">6</td>
                <td class="ocultarcolumnas" style="width: 2%">7</td>
                <td class="ocultarcolumnas" style="width: 2%">8</td>
                <td class="ocultarcolumnas" style="width: 2%">9</td>
                <td class="ocultarcolumnas" style="width: 2%">10</td>
                <td class="ocultarcolumnas" style="width: 2%">11</td>
                <td class="ocultarcolumnas" style="width: 2%">12</td>
                <td class="ocultarcolumnas" style="width: 2%">13</td>
                <td class="ocultarcolumnas" style="width: 2%">14</td>
                <td class="ocultarcolumnas" style="width: 2%">15</td>
                <td class="ocultarcolumnas" style="width: 2%">16</td>
                <td class="ocultarcolumnas" style="width: 2%">17</td>
                <td class="ocultarcolumnas" style="width: 2%">18</td>
                <td class="ocultarcolumnas" style="width: 2%">19</td>
                <td class="ocultarcolumnas" style="width: 2%">20</td>
                <td class="ocultarcolumnas" style="width: 2%">21</td>
                <td class="ocultarcolumnas" style="width: 2%">22</td>
                <td class="ocultarcolumnas" style="width: 2%">23</td>
                <td class="ocultarcolumnas" style="width: 2%">24</td>
                <td class="ocultarcolumnas" style="width: 2%">25</td>
                <td class="ocultarcolumnas" style="width: 2%">26</td>
                <td class="ocultarcolumnas" style="width: 2%">27</td>
                <td class="ocultarcolumnas" style="width: 2%">28</td>
                <td class="ocultarcolumnas" style="width: 2%">29</td>
                <td class="ocultarcolumnas" style="width: 2%">30</td>
                <td class="ocultarcolumnas" style="width: 2%">31</td>
                <td class="ocultarcolumnas" style="width: 2%">32</td>
                <td class="ocultarcolumnas" style="width: 2%">33</td>
                <td class="ocultarcolumnas" style="width: 2%">34</td>
            </tr>
        </thead>
        <tbody>
            <tr class="">
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>Entidad <br> contratante:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: left;margin-top: 0%;margin-bottom:0%">
                        CORPORACIÓN DEPARTAMENTAL DE RECREACIÓN
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>Nit:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: left;margin-top: 0%;margin-bottom:0%">
                        800215293-7
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>Contratista:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: left;margin-top: 0%;margin-bottom:0%">
                        {{ $data->lastname }} {{ $data->name }}
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>Identificación:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: left;margin-top: 0%;margin-bottom:0%">
                        {{ $data->identification_type }} {{ $data->identification }}
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>Razón Social:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: left;margin-top: 0%;margin-bottom:0%">
                        N.A.
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>Nit:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: left;margin-top: 0%;margin-bottom:0%">
                        N.A.
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>Valor Contrato:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: left;margin-top: 0%;margin-bottom:0%">
                        {{ number_format($data->contract_value,0,'.',',') }}
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>Asignación <br> presupuestal:</b>
                    </p>
                </td>
                <td colspan="8" rowspan="2">
                    <p style="text-align: left;margin-top: 0%;margin-bottom:0%">
                        22-130109
                    </p>
                </td>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>Certificado de <br> Asignación presupuestal:</b>
                    </p>
                </td>
                <td colspan="8" rowspan="2">
                    <p style="text-align: left;margin-top: 0%;margin-bottom:0%">
                        2407 de 14/10/2022
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="34" rowspan="2">
                    <p style="text-align: justify;margin-top: 0%;margin-bottom:0%;line-height: 1.2;word-spacing:1px;">
                        <b>WILBER YAIR ASPRILLA LAGAREJO</b> identificado como aparece al pie de su firma, en calidad de Gerente,
                        actuando en nombre y representación de la <b>CORPORACIÓN DEPARTAMENTAL DE RECREACIÓN</b>, entidad
                        sin ánimo de lucro, inscrita en la Cámara de comercio de Cali, bajo el No. 879 del libro |, con personería Jurídica
                        reconocida por la Gobernación del Valle del Cauca, mediante Resolución No. 00177 del 23 de diciembre de 1993,
                        con domicilio en Cali y NIT. <b>800215293-7</b> en uso de las facultades y funciones, quien para los efectos del presente
                        documento se denominará <b>RECREAVALLE</b>, por una parte; y por la otra, <b>ADOLFO LEON HIDALGO GOMEZ</b>,
                        quien se denominará EL <b>CONTRATISTA</b> y declara que tiene capacidad para celebrar este contrato, que no
                        incurre en causal de inhabilidad e incompatibilidad de las previstas en los estatutos de <b>RECREAVALLE</b> y demás
                        normas constitucionales y legales, hemos acordado celebrar el presente contrato, el cual se regirá por las siguientes:
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="34" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>CLAUSULAS:</b>
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>1. Objeto:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause1
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>2. Plazo:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%" >
                        @php
                        echo $data->clause2
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>3. Obligaciones <br>generales de <br>las partes:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause3
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>4. Actividades <br>específicas de <br>la Contratista</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause4
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>5. Valor:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause5
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>6. Forma de <br>pago:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%;">
                        @php
                        echo $data->clause6
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>7. Garantía:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        <b>EL CONTRATISTA</b>, NO debe constituir a favor y a satisfacción de <b>RECREAVALLE</b> la
                        garantía única de cumplimiento, expedida por una compañía de seguros legalmente
                        establecida en Colombia, fiducia mercantil en garantía o garantía bancaria a primer
                        requerimiento, la cual amparará los riesgos descritos a continuación y con las siguientes
                        condiciones:
                        <table>
                            <thead>
                                <tr class="">
                                    <td class="ocultarcolumnas" style="width: 2%">1</td>
                                    <td class="ocultarcolumnas" style="width: 2%">2</td>
                                    <td class="ocultarcolumnas" style="width: 2%">3</td>
                                    <td class="ocultarcolumnas" style="width: 2%">4</td>
                                    <td class="ocultarcolumnas" style="width: 2%">5</td>
                                    <td class="ocultarcolumnas" style="width: 2%">6</td>
                                    <td class="ocultarcolumnas" style="width: 2%">7</td>
                                    <td class="ocultarcolumnas" style="width: 2%">8</td>
                                    <td class="ocultarcolumnas" style="width: 2%">9</td>
                                    <td class="ocultarcolumnas" style="width: 2%">10</td>
                                    <td class="ocultarcolumnas" style="width: 2%">11</td>
                                    <td class="ocultarcolumnas" style="width: 2%">12</td>
                                    <td class="ocultarcolumnas" style="width: 2%">13</td>
                                    <td class="ocultarcolumnas" style="width: 2%">14</td>
                                    <td class="ocultarcolumnas" style="width: 2%">15</td>
                                    <td class="ocultarcolumnas" style="width: 2%">16</td>
                                    <td class="ocultarcolumnas" style="width: 2%">17</td>
                                    <td class="ocultarcolumnas" style="width: 2%">18</td>
                                    <td class="ocultarcolumnas" style="width: 2%">19</td>
                                    <td class="ocultarcolumnas" style="width: 2%">20</td>
                                    <td class="ocultarcolumnas" style="width: 2%">21</td>
                                    <td class="ocultarcolumnas" style="width: 2%">22</td>
                                    <td class="ocultarcolumnas" style="width: 2%">23</td>
                                    <td class="ocultarcolumnas" style="width: 2%">24</td>
                                    <td class="ocultarcolumnas" style="width: 2%">25</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td colspan="8" rowspan="2">
                                        <p style="text-align: left;margin-top: 0%;margin-bottom:0%">
                                            <b>Amparo</b>
                                        </p>
                                    </td>
                                    <td colspan="8" rowspan="2">
                                        <p style="text-align: left;margin-top: 0%;margin-bottom:0%">
                                            <b>Vigencia</b>
                                        </p>
                                    </td>
                                    <td colspan="9" rowspan="2">
                                        <p style="text-align: left;margin-top: 0%;margin-bottom:0%">
                                            <b>Monto Asegurado</b>
                                        </p>
                                    </td>
                                </tr>
                                <tr></tr>
                                <tr class="">
                                    <td colspan="8" rowspan="2">
                                        <p style="text-align: left;margin-top: 0%;margin-bottom:0%">
                                            N.A.
                                        </p>
                                    </td>
                                    <td colspan="8" rowspan="2">
                                        <p style="text-align: left;margin-top: 0%;margin-bottom:0%">
                                            N.A.
                                        </p>
                                    </td>
                                    <td colspan="9" rowspan="2">
                                        <p style="text-align: left;margin-top: 0%;margin-bottom:0%">
                                            N.A.
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table>
                            <thead>
                                <tr class="">
                                    <td class="ocultarcolumnas" style="width: 2%">1</td>
                                    <td class="ocultarcolumnas" style="width: 2%">2</td>
                                    <td class="ocultarcolumnas" style="width: 2%">3</td>
                                    <td class="ocultarcolumnas" style="width: 2%">4</td>
                                    <td class="ocultarcolumnas" style="width: 2%">5</td>
                                    <td class="ocultarcolumnas" style="width: 2%">6</td>
                                    <td class="ocultarcolumnas" style="width: 2%">7</td>
                                    <td class="ocultarcolumnas" style="width: 2%">8</td>
                                    <td class="ocultarcolumnas" style="width: 2%">9</td>
                                    <td class="ocultarcolumnas" style="width: 2%">10</td>
                                    <td class="ocultarcolumnas" style="width: 2%">11</td>
                                    <td class="ocultarcolumnas" style="width: 2%">12</td>
                                    <td class="ocultarcolumnas" style="width: 2%">13</td>
                                    <td class="ocultarcolumnas" style="width: 2%">14</td>
                                    <td class="ocultarcolumnas" style="width: 2%">15</td>
                                    <td class="ocultarcolumnas" style="width: 2%">16</td>
                                    <td class="ocultarcolumnas" style="width: 2%">17</td>
                                    <td class="ocultarcolumnas" style="width: 2%">18</td>
                                    <td class="ocultarcolumnas" style="width: 2%">19</td>
                                    <td class="ocultarcolumnas" style="width: 2%">20</td>
                                    <td class="ocultarcolumnas" style="width: 2%">21</td>
                                    <td class="ocultarcolumnas" style="width: 2%">22</td>
                                    <td class="ocultarcolumnas" style="width: 2%">23</td>
                                    <td class="ocultarcolumnas" style="width: 2%">24</td>
                                    <td class="ocultarcolumnas" style="width: 2%">25</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td colspan="10" rowspan="2">
                                        <p style="text-align: left;margin-top: 0%;margin-bottom:0%">
                                            <b>Beneficiario / Asegurado:</b>
                                        </p>
                                    </td>
                                    <td colspan="15" rowspan="2">
                                        <p style="text-align: left;margin-top: 0%;margin-bottom:0%">
                                            N.A.
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>8. Información <br> bancaria:</b>
                    </p>
                </td>
                <td colspan="5" rowspan="2">
                    <p style="text-align: justify;margin-top: 0%;margin-bottom:0%">
                        {{ $data->namebank }}
                    </p>
                </td>
                <td colspan="5" rowspan="2">
                    <p style="text-align: justify;margin-top: 0%;margin-bottom:0%">
                        <b>Tipo de <br>cuenta </b>
                    </p>
                </td>
                <td colspan="5" rowspan="2">
                    <p style="text-align: justify;margin-top: 0%;margin-bottom:0%">
                        {{ $data->typenamebank }}
                    </p>
                </td>
                <td colspan="5" rowspan="2">
                    <p style="text-align: justify;margin-top: 0%;margin-bottom:0%">
                        <b>Cuenta</b>
                    </p>
                </td>
                <td colspan="5" rowspan="2">
                    <p style="text-align: justify;margin-top: 0%;margin-bottom:0%">
                        {{ $data->account_number }}
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>9. Independencia:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause9
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>10. Supervisión:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause10
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>11. Causales de <br>Terminación:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause11
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>12. Prorrogas:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause12
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>13. Suspensión Del <br>Contrato:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause13
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>14. Cesión del <br>contrato:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause14
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>15. Propiedad <br>intelectual:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause15
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>16. Multas:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause16
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>17. Cláusula penal:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause17
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>18. Confidencialidad:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause18
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>19. Controversias:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause19
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>20. Documentos <br>integrantes del <br>contrato:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause20
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>21. Requisitos de <br>perfeccionamiento y <br>ejecución:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause21
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>22. Declaraciones:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause22
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>23. Domicilio:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause23
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="9" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>24. Notificaciones:</b>
                    </p>
                </td>
                <td colspan="25" rowspan="2">
                    <p style="text-align: justify;margin-top: 3%;margin-bottom:3%">
                        @php
                        echo $data->clause24
                        @endphp
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="17" rowspan="2">
                    <p style="text-align: center;margin-top: 2%;margin-bottom:0%">
                        <b>POR RECREVALLE</b>
                    </p>
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                    </p>
                    <p style="text-align: center;margin-top: 14%;margin-bottom:6%">
                        <b>WILBER YAIR ASPRILLA LAGAREJO <br> C.C. 16848687 <br> Gerente</b>
                    </p>
                </td>
                <td colspan="17" rowspan="2">
                    <p style="text-align: center;margin-top: 2%;margin-bottom:0%">
                        <b>POR EL CONTRATISTA</b>
                    </p>
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                    </p>
                    <p style="text-align: center;margin-top: 12%;margin-bottom:6%">
                        <b>{{ $data->lastname }} {{ $data->name }} <br> {{ $data->identification_type }} {{ $data->identification }} <br> Contratista</b>
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="6" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>Transcribió:</b>
                    </p>
                </td>
                <td colspan="28" rowspan="2">
                    <p style="text-align: justify;margin-top: 0%;margin-bottom:0%">
                        {{ $data->name_transcribe }} {{ $data->lastname_transcribe }}
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="6" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>Revisó:</b>
                    </p>
                </td>
                <td colspan="28" rowspan="2">
                    <p style="text-align: justify;margin-top: 0%;margin-bottom:0%">
                        {{ $data->name_reviewer }} {{ $data->lastname_reviewer }}
                    </p>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="6" rowspan="2">
                    <p style="text-align: center;margin-top: 0%;margin-bottom:0%">
                        <b>Aprobó:</b>
                    </p>
                </td>
                <td colspan="28" rowspan="2">
                    <p style="text-align: justify;margin-top: 0%;margin-bottom:0%">
                        {{ $data->name_approve }} {{ $data->lastname_approve }}
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
