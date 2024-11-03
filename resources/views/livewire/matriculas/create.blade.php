<div class="flex justify-center items-center flex-col p-10 md:text-center">
    <h1 class="dark:text-gray-300 text-xl text-balance my-10">
            En este apartado, debes introducir la mátricula que deseas buscar.
            Tras ello, se te asignará un identificador para poder realizar consultas posteriores al estado de tu consulta.
    </h1>
    <form class="max-w-sm mx-auto" wire:submit.prevent='guardarMatricula'>
        <div class="mb-5">
            <label for="matricula" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matricula</label>
            <input  style="text-transform: uppercase;" wire:model.live.debounce.250ms='matricula' type="matricula" id="matricula"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="1234MNC" required />
        </div>
        
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar matrícula para búsqueda</button>
    </form>

</div>
