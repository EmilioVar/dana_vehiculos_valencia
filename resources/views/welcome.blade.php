<x-layout>
    <header class="flex justify-center items-center flex-col">
        <section class="flex justify-center p-10">
            <h1 class="text-4xl font-bold text-center dark:text-gray-200">
                PROGRAMA DE BÚSQUEDA VEHÍCULOS DESAPARECIDOS POR LA DANA EN VALENCIA
            </h1>
        </section>
        <!-- estadisticas -->
        <section>
                @php
                    $matriculasRegistradas = App\Models\Matricula::count();
                    $avistamientosRegistrados = App\Models\Avistamiento::count();
                    $matriculasComunes = App\Models\Matricula::whereIn('matricula', App\Models\Avistamiento::pluck('matricula'))->pluck('matricula')->count();
                @endphp
            <div class="flex flex-col text-2xl p-5 bg-gray-200 rounded-xl">
                <p>Matriculas registradas: {{ $matriculasRegistradas }}</p>
                <p>Avistamientos registrados: {{ $avistamientosRegistrados }}</p>
                <p>Matriculas relacionadas con sus dueños: {{ $matriculasComunes }}</p>
            </div>
            <div></div>
        </section>
        <main class="m-10">
            <!-- acciones vehículo -->
            <section class="flex justify-center items-center flex-col w-full">
                <a href="{{ route('avistamientos.create') }}" aria-label="reportar avistamiento" class="my-2 p-5 text-4xl font-bold text-white bg-blue-700 rounded-xl w-full text-center hover:bg-blue-800 transition-all">Reportar avistamiento</a>
                <a href="{{ route('matriculas.create') }}" aria-label="buscar vehículo" class="text-center my-2 p-5 text-4xl font-bold text-white bg-green-700 rounded-xl w-full hover:bg-green-800 transition-all">Buscar vehículo</a>
            </section>
        </main>
        <section>
            <a href="{{ route('matricula.status') }}" class="p-3 text-white bg-orange-700 hover:bg-orange-800 transition-all rounded-xl font-bold">
                consultar estado de la búsqueda
            </a>
        </section>
    </header>
</x-layout>