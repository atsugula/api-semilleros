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
                <b>ESCENARIO DEPORTIVO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>OBJETIVO DEL ACOMPAÑAMIENTO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>RECONOCIMIENTO DE NOMBRE DE PROYECTO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>RECONOCIMIENTO DE VALOR</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>SE OBSERVA ORGANIZACIÓN, DISCIPLINA Y BUEN MANEJO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>DESCRIPCIÓN DE ACTIVIDADES</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>OBSERVACIONES</b>
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
                <td>{{ $value->scenery }}</td>
                <td>{{ $value->objetive }}</td>
                @php
                    $documentTypes = [
                        "true" => "Verdadero",
                        "false" => "Falso ",
                    ];
                    $documentType = $value->beneficiaries_recognize_name;
                @endphp
                @if(isset($documentTypes[$documentType]))
                    <td>{{ $documentTypes[$documentType] }}</td>
                @else
                    <td>Desconocido</td>
                @endif
                @php
                    $documentTypes = [
                        "true" => "Verdadero",
                        "false" => "Falso ",
                    ];
                    $documentType = $value->beneficiary_recognize_value;
                @endphp
                @if(isset($documentTypes[$documentType]))
                    <td>{{ $documentTypes[$documentType] }}</td>
                @else
                    <td>Desconocido</td>
                @endif
                @php
                    $documentTypes = [
                        "true" => "Verdadero",
                        "false" => "Falso ",
                    ];
                    $documentType = $value->all_ok;
                @endphp
                @if(isset($documentTypes[$documentType]))
                    <td>{{ $documentTypes[$documentType] }}</td>
                @else
                    <td>Desconocido</td>
                @endif
                <td>{{ $value->description }}</td>
                <td>{{ $value->observations }}</td>
                <td>{{ $value->status }}</td>
                <td>{{ $value->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
