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
                <td>{{ $value->month }}</td>
                <td>{{ $value->theme }}</td>
                @if($value->guardian_knows_semilleros=="true"||$value->guardian_knows_semilleros=="TRUE")
                    <td>SI</td>
                @elseif($value->guardian_knows_semilleros=="false"||$value->guardian_knows_semilleros=="FALSE")
                    <td>NO</td>
                @else
                    <td>{{$value->guardian_knows_semilleros}}</td>
                @endif
                <td>{{ $value->status }}</td>
                <td>{{ $value->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
