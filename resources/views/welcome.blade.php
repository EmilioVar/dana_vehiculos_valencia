<x-layout>
    <header class="h-screen w-screen flex justify-center items-center flex-col">
        <section class="flex justify-center p-10p">
            <h1 class="text-4xl font-bold text-center">
                PROGRAMA DE BÚSQUEDA VEHÍCULOS DESAPARECIDOS POR LA DANA EN VALENCIA
            </h1>
        </section>
        <main>
            <!-- acciones vehículo -->
            <section class="flex justify-center items-center flex-col w-full">
                <a href="{{ route('avistamientos.create') }}" aria-label="reportar avistamiento" class="my-10 p-5 text-4xl font-bold text-white bg-blue-700 rounded-xl w-full hover:bg-blue-800 transition-all">Reportar avistamiento</a>
                <a href="{{ route('matriculas.create') }}" aria-label="buscar vehículo" class="text-center my-10 p-5 text-4xl font-bold text-white bg-green-700 rounded-xl w-full hover:bg-green-800 transition-all">Buscar vehículo</a>
            </section>
        </main>
        <section>
            <button class="p-3 text-white bg-orange-700 hover:bg-orange-800 transition-all rounded-xl font-bold">
                consultar estado de la búsqueda
            </button>
        </section>
    </header>
</x-layout>