<div class="max-w-sm mx-auto p-10 rounded-xl bg-white shadow-md dark:bg-gray-800">
    <form wire:submit.prevent='consultarMatricula'>
        <div class="mb-5 flex items-end">
            <div>
                <label for="matricula"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matricula</label>
                <input style="text-transform: uppercase;" wire:model.live.debounce.250ms='matricula' type="text"
                    id="matricula"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="1234MNC" />
                <div class="dark:text-gray-300">
                    @error('matricula')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <button type="submit"
                class="inline-flex items-center h-10 ml-2 bg-black dark:bg-gray-200 border border-transparent rounded-md text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">Consultar</button>
        </div>
    </form>
    <div class="text-gray-200">
        @if ($result)
            <h1>Esta matricula se ha encontrado en nuestros registros:</h1>
            <ul class="mt-5 list-disc">
                <li>Matrícula: {{ $this->matricula }}</li>
                <li>Latitud: {{ $this->lat }}</li>
                <li>Longitud: {{ $this->lon }}</li>
                <li>Mapa: <iframe 
                    width="200" 
                    height="170" 
                    frameborder="0" 
                    marginheight="0" 
                    marginwidth="0" 
                    allowfullscreen
                    src="https://maps.google.com/maps?q={{ $this->lat }},{{ $this->lon }}&hl=es&z=14&output=embed"
                  >
                  </iframe></li>
                <li>Estado: {{ $this->status }}</li>
                <li>¿Habían personas? {{ $this->personas ? 'desgraciadamente, si' : 'no' }}</li>
                <li>Observaciones: {{ $this->observaciones }}</li>
            </ul>
        @endif
        @if ($notFound)
            <h1>Esta matricula no se encuentra en nuestros registros</h1>
        @endif
    </div>
    <div class="flex flex-col items-center">
        <a class="inline-flex items-center px-4 py-2 bg-black dark:bg-gray-200 border border-transparent rounded-md font-semibold text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150' mt-5"
            href="{{ route('index') }}">
            Volver a inicio
        </a>
    </div>
</div>
