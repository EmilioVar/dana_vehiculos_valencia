<x-mail::message>
# Tu vehículo ha sido encontrado

Se acaba de reportar un vehículo con tu matricula {{ $avistamiento->matricula }}

Los datos son los siguientes:

<ul>
    <li>Matricula: {{ $avistamiento->matricula }}</li>
    <li>Latitud: {{ $avistamiento->lat }}</li>
    <li>Longitud: {{ $avistamiento->lon }}</li>
    <li>Estado: {{ $avistamiento->status }}</li>
    <li>¿Habían personas? {{ $avistamiento->personas ? 'desgraciadamente, si' : 'no' }}</li>
    <li>Observaciones: {{ $avistamiento->observaciones }}</li>
    <li>Fecha: {{ $avistamiento->created_at }}</li>
</ul>

<x-mail::button :url="route('matricula.status')">
Entra aquí e introduce tu correo para más información
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
