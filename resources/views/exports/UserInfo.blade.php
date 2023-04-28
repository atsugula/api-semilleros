<table>
    <thead>
        <tr>
            <th style="width: 30px;text-align:center">
                <b>#</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>NOMBRES</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>APELLIDOS</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>NUMERO DOCUMENTO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>GENERO</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>VISITAS</b>
            </th>
            <th style="width: 30px;text-align:center">
                <b>FECHA CREACION</b>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $key => $user)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $user->name . ' ' . $user->lastname }}</td>
                <td>{{ $user->document_number }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ $user->visits }}</td>
                <td>{{ $user->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
