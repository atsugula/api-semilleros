<table>
    <thead>
        <tr>
            <th style="width: 30px;text-align:center">
                <b>#</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>PSICOSOCIAL</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>BENEFICIARIO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>MUNICIPIO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>MES</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>TEMA DE LA VISITA</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>CONOCIMIENTO DE LOS PADRES SOBRE EL PROYECTO</b>
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
        @foreach ($psychologicalVisits as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->name . ' ' . $value->lastname }}</td>
                <td>{{ $value->full_name }}</td>
                <td>{{ $value->municipality }}</td>
                <td>{{ $value->date }}</td>
                <td>{{ $value->agreemnets }}</td>
                <td>{{ $value->topic }}</td>
                <td>{{ $value->status }}</td>
                <td>{{ $value->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
