<table>
    <thead>
        <tr>
            <th style="width: 30px;text-align:center">
                <b>#</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>COORDINADOR</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>FECHA</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>HORA</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>MUNICIPIO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>CORREGIMIENTO/VEREDA</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>MONITOR</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>DISCIPLINA</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>ESCENARIO DEPORTIVO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>COBERTURA DEL BENEFICIARIO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>DESCRIPCIÓN</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>OBSERVACIONES</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>ESTADO</b>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($visitCoordinador as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->Coordinator }}</td>
                <td>{{ $value->Date }}</td>
                <td>{{ $value->Hour }}</td>
                <td>{{ $value->Municipality }}</td>
                <td>{{ $value->Sidewalk }}</td>
                <td>{{ $value->Monitor }}</td>
                <td>{{ $value->Discipline }}</td>
                <td>{{ $value->sports_scene }}</td>
                <td>{{ $value->beneficiary_coverage }}</td>
                <td>{{ $value->description }}</td>
                <td>{{ $value->observations }}</td>
                <td>{{ $value->Status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
