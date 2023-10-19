<table>
    <thead>
        <tr>
            <th style="width: 30px;text-align:center">
                <b>#</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>FECHA VISITA</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>HORA VISITA</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>MUNICIPIO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>VEREDA/CORREGIMIENTO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>MONITOR</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>DISCIPLINAS</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>ESCENA DEPORTE</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>COBERTURA</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>EVALUACION</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>APOYO A EVENTOS</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>PLAN DE CLASES</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>PLANTEA ACTIVIDADES</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>COMPONENTE TECNICO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>MANEJO DE GRUPO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>DESARROLLA EL COMPONENTE</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>PUNTUALIDAD</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>PRESENTACION PERSONAL</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>PACIENTE</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>DISCIPLINA</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>COMUNICACION ALUMNOS Y PADRES</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>VERBALIZACION</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>MODELO PEDAGOGICO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>CONDUCTUAL</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>ROMANTICO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>CONSTRUCTIVISTA</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>INTEGRADOR-GLOBALIZADOR</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>ESTADO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>FECHA CREACION</b>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->date_visit }}</td>
                <td>{{ $value->hour_visit }}</td>
                <td>{{ $value->municipalitie }}</td>
                <td>{{ $value->sidewalk }}</td>
                <td>{{ $value->monitor }}</td>
                <td>{{ $value->discipline }}</td>
                <td>{{ $value->sports_scene }}</td>
                <td>{{ $value->beneficiary_coverage }}</td>
                <td>{{ $value->evaluation }}</td>
                <td>{{ $value->event_supports }}</td>
                <td>{{ $value->swich_plans_r }}</td>
                <td>{{ $value->swich_plans_sc_1 }}</td>
                <td>{{ $value->swich_plans_sc_2 }}</td>
                <td>{{ $value->swich_plans_sc_3 }}</td>
                <td>{{ $value->swich_plans_sc_4 }}</td>
                <td>{{ $value->swich_plans_gm_1 }}</td>
                <td>{{ $value->swich_plans_gm_2 }}</td>
                <td>{{ $value->swich_plans_gm_3 }}</td>
                <td>{{ $value->swich_plans_gm_4 }}</td>
                <td>{{ $value->swich_plans_gm_5 }}</td>
                <td>{{ $value->swich_plans_gm_6 }}</td>
                <td>{{ $value->swich_plans_mp_1 }}</td>
                <td>{{ $value->swich_plans_mp_2 }}</td>
                <td>{{ $value->swich_plans_mp_3 }}</td>
                <td>{{ $value->swich_plans_mp_4 }}</td>
                <td>{{ $value->swich_plans_mp_5 }}</td>
                <td>{{ $value->statuse }}</td>
                <td>{{ $value->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
