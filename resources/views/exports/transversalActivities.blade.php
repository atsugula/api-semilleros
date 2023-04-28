<table>
    <thead>
        <tr>
            <th style="width: 30px;text-align:center">
                <b>#</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>PSICÓLOGO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>MUNICIPIO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>ACTIVIDAD</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>FECHA</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>OBJETIVO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>ESCENARIO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>NUMERO DE ASISTENTES</b>
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
        @foreach ($transversalActivities as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->name . ' ' . $value->lastname }}</td>
                <td>{{ $value->municipality }}</td>
                <td>{{ $value->activity_name }}</td>
                <td>{{ $value->date_visit }}</td>
                <td>{{ $value->objective_activity }}</td>
                <td>{{ $value->scene }}</td>
                <td>{{ $value->nro_assistants }}</td>
                <td>{{ $value->status }}</td>
                <td>{{ $value->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
