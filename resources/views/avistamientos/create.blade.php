<x-layout>
    <div>
        <div class="flex justify-center items-center flex-col p-10">
            <h1 class="dark:text-gray-300 text-xl text-balance my-10 md:text-center">
                En este apartado, debes introducir la mátricula que deseas buscar.
                Tras ello, podrás utilizar tu correo electrónico para poder realizar consultas posteriores al estado de
                tu
                búsqueda.
            </h1>
            <livewire:avistamientos.create />
        </div>
    </div>
    <x-slot:scripts>
        <script type="module">
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                } else {
                    document.getElementById("result").innerText =
                        "La geolocalización no es soportada en este navegador.";
                }

                function showPosition(position) {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    Livewire.dispatch('geolocation', {
                        lat: lat,
                        lon: lon
                    });
                }

                function showError(error) {
                    switch (error.code) {
                        case error.PERMISSION_DENIED:
                            alert("Se denegó la solicitud de geolocalización.");
                            break;
                        case error.POSITION_UNAVAILABLE:
                            alert("La ubicación no está disponible.");
                            break;
                        case error.TIMEOUT:
                            alert("La solicitud para obtener la ubicación ha expirado.");
                            break;
                        case error.UNKNOWN_ERROR:
                            alert("Un error desconocido ocurrió.");
                            break;
                    }
                }
            }

            getLocation();
        </script>
    </x-slot>
</x-layout>
