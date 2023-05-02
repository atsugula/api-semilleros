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
                <b>MONITOR</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>MUNICIPIO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>FECHA</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>NUMERO DE BENEFICIARIOS</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>DISIPLINA</b>
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
                <td>{{ $value->creator_name . ' ' . $value->creator_lastname }}</td>
                <td>{{ $value->monitor_name . ' ' . $value->monitor_lastname }}</td>
                <td>{{ $value->municipality }}</td>
                <td>{{ $value->date_visit }}</td>
                <td>{{ $value->number_beneficiaries }}</td>
                <td>{{ $value->dicipline }}</td>
                <td>{{ $value->status }}</td>
                <td>{{ $value->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
