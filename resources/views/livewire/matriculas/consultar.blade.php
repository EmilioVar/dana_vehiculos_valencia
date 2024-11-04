<div class="max-w-sm mx-auto p-10 rounded-xl bg-white shadow-md dark:bg-gray-800">
    <form wire:submit.prevent='consultarMatriculasPorEmail'>
        <div class="mb-5 flex flex-col items-center">
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo
                    electrónico</label>
                <input wire:model.live.debounce.250ms='email' type="email"
                    id="email"
                    class="shadow-sm uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="ejemplo@gmail.com" />
                <div class="dark:text-gray-300">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <button type="submit"
                class="inline-flex mt-2 items-center justify-center h-10 p-5 ml-2 bg-black dark:bg-gray-200 border border-transparent rounded-md text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">Consultar</button>
        </div>
    </form>
    <div class="dark:text-gray-200">
        @if ($result)
            <h1>Esta matricula se ha encontrado en nuestros registros:</h1>
            @foreach ($matriculasResult as $matricula)
            <div class="my-5 p-5 shadow-md rounded-xl dark:bg-gray-900 dark:text-gray-200">
                <ul>
                    <li>Matrícula: {{ $matricula->matricula }}</li>
                    <li>Latitud: {{ $matricula->lat }}</li>
                    <li>Longitud: {{ $matricula->lon }}</li>
                    <li>Mapa: <iframe width="200" height="170" frameborder="0" marginheight="0" marginwidth="0"
                            allowfullscreen
                            src="https://maps.google.com/maps?q={{ $matricula->lat }},{{ $matricula->lon }}&hl=es&z=14&output=embed">
                        </iframe></li>
                    <li>Estado: {{ $matricula->status }}</li>
                    <li>¿Habían personas? {{ $matricula->personas ? 'desgraciadamente, si' : 'no' }}</li>
                    <li>Observaciones: {{ $matricula->observaciones }}</li>
                </ul>
            </div>
            @endforeach
        @endif
        @if ($notFound)
            <h1>No hay registros para ese correo electrónico</h1>
        @endif
    </div>
    <div class="flex flex-col items-center">
        <a class="inline-flex items-center px-4 py-2 bg-black dark:bg-gray-200 border border-transparent rounded-md font-semibold text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150' mt-5"
            href="{{ route('index') }}">
            Volver a inicio
        </a>
    </div>
</div>
