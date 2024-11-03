<div>
    @if ($matriculaCargada)
        <div class="dark:text-gray-300 p-10 rounded-xl shadow-md bg-white dark:bg-gray-800">
            <h1 class="text-4xl">¡Matrícula cargada correctamente!</h1>
            <p class="text-xl mt-5">
                A partir de ahora, el dueño del vehículo podrá saber donde se enecuentra.
            </p>
            <p>¡Muchísimas gracias por tu colaboración y por contribuir a la comunidad!</p>
            <div class="flex justify-center">
                <a class="inline-flex items-center px-4 py-2 bg-black dark:bg-gray-200 border border-transparent rounded-md font-semibold text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150' mt-10"
                    href="{{ route('consultar-estado-busqueda') }}">
                    Consular estado de búsqueda
                </a>

                <a class="inline-flex items-center px-4 ml-10 py-2 bg-black dark:bg-gray-200 border border-transparent rounded-md font-semibold text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150' mt-10"
                    href="{{ route('index') }}">
                    Volver a inicio
                </a>
            </div>
        </div>
    @else
        <form class="max-w-sm mx-auto p-10 rounded-xl bg-white shadow-md dark:bg-gray-800 mt-5"
            wire:submit.prevent='guardarMatriculaAvistamiento'>
            <div class="mb-5">
                <label for="matricula"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matricula</label>
                <input wire:model.live.debounce.250ms='matricula' type="text"
                    id="matricula"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="1234MNC" />
                <div class="dark:text-gray-300">
                    @error('matricula')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            @if($buscado)
            <p class="dark:text-gray-200 p-2 rounded-r-md bg-gray-100 dark:bg-gray-900 border-l-4 my-2 border-gray-400">
                <b>IMPORTANTE:</b> este vehículo ya está en búsqueda y <b> {{ $buscadoTienePersonas ? 'si' : 'no' }} </b> se han reportado personas dentro. Termina de reportar el registro notificar al dueño.
            </p>
            @endif
            <!-- status -->
            <div class="mb-5">
                <label for="status"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                <select wire:model.live.debounce.250ms='status' id="status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected></option>
                    <option value="aparcado">Aparcado</option>
                    <option value="siniestro">Siniestro</option>
                </select>
                <div class="dark:text-gray-300">
                    @error('status')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!-- personas -->
            <div class="mb-5">
                <div class="flex items-center mb-4">
                    <input wire:model.live.debounce.250ms='personas' id="personas" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="personas" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">¿Había personas en el vehículo?</label>
                </div>
            </div>
            <!-- observaciones -->
            <label for="observaciones"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observaciones</label>
            <textarea wire:model.live.debounce.250ms='observaciones' id="observaciones" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Aquí puedes especificar más informacion de ser necesario"></textarea>
            <div class="dark:text-gray-300">
                @error('observaciones')
                    {{ $message }}
                @enderror
            </div>
            <!-- buttons -->
            <div class="flex flex-col items-center mt-5">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-black dark:bg-gray-200 border border-transparent rounded-md font-semibold text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">Registrar
                    matrícula para búsqueda</button>
                <a class="inline-flex items-center px-4 py-2 bg-black dark:bg-gray-200 border border-transparent rounded-md font-semibold text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150' mt-5"
                    href="{{ route('index') }}">
                    Volver a inicio
                </a>
            </div>
        </form>
    @endif
</div>
