<x-layout>
    <div>
        <div class="flex justify-center items-center flex-col p-10">
            <h1 class="dark:text-gray-300 text-xl text-balance mt-10 md:text-center">
                En este apartado, debes introducir la mátricula que deseas buscar.
                Tras ello, podrás utilizar tu correo electrónico para poder realizar consultas posteriores al estado de
                tu
                búsqueda.
            </h1>
            <div id="geolocation-denied" style="display: none;">
                <h3 href="" class="dark:text-red-500 text-balance my-10 md:text-center">
                    Has decidido denegar la geolocalización. Ayudaría mucho que el usuario pueda ver la ubicación del vehículo.
                    <br>
                    Si es posible, añade en observaciones algo más de información para la persona afectada.
                </h3>
            </div>
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
                            document.querySelector('#geolocation-denied').style.display = 'block';
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
