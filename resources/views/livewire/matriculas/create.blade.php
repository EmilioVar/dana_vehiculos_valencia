<div>
    @if ($matriculaCargada)
        <div class="dark:text-gray-300 p-10 rounded-xl shadow-md bg-white dark:bg-gray-800">
            <h1 class="text-4xl">¡Matrícula cargada correctamente!</h1>
            <p class="text-xl mt-5">
                A partir de ahora, podrás consultar el estado de tu busqueda en el apartado de "consultar estado de la
                búsqueda".
            </p>
            <p>Además, recibirás un correo electrónico en caso de encontrarse tu vehículo, con todos los detalles.</p>
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
        <form class="max-w-sm mx-auto p-10 rounded-xl bg-white shadow-md dark:bg-gray-800"
            wire:submit.prevent='guardarMatricula'>
            <div class="mb-5">
                <label for="matricula"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matricula</label>
                <input wire:model.live.debounce.250ms='matricula' type="text"
                    id="matricula"
                    class="shadow-sm uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="1234MNC" />
                <div class="dark:text-gray-300">
                    @error('matricula')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!-- email -->
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo electrónico</label>
                <input style="text-transform: uppercase;" wire:model='email' type="email"
                    id="email"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="jose@gmail.com" />
                <div class="dark:text-gray-300">
                    @error('email')
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
            <p class="dark:text-gray-300 text-sm mb-3">
                El email <b>sólamente se usará con fines comunicativos del estado del vehículo</b>, no serán compartidos
                con terceros ni usados para ningún otro fin aparte del mencionado anteriormente.
            </p>
            <p class="dark:text-gray-300 text-sm mb-3 font-bold">
                El mismo email servirá como identificador para comprobar el estado del vehículo.
            </p>
            <p class="dark:text-gray-300 text-sm mb-10 font-bold">
                Más información en la sección <a class="font-bold" href="{{ url('politica-de-privacidad') }}">Política de privacidad</a>
            </p>
            <div class="flex flex-col items-center">
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
