<x-mail::message>
# Tu vehículo ha sido encontrado

Se acaba de reportar un vehículo con tu matricula {{ $avistamiento->matricula }}

Los datos son los siguientes:

<ul>
    <li>Matricula: {{ $avistamiento->matricula }}</li>
    <li>Latitud: {{ $avistamiento->lat }}</li>
    <li>Estado: {{ $avistamiento->status }}</li>
    <li>¿Habían personas? {{ $avistamiento->personas ? 'desgraciadamente, si' : 'no' }}</li>
    <li>Observaciones: {{ $avistamiento->observaciones }}</li>
    <li>Fecha: {{ $avistamiento->created_at }}</li>
</ul>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
