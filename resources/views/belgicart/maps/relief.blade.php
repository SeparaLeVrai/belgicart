<x-guest-layout>
    {{-- <div class="categories-menu">
        <ul class="categories-menu-ul">
            <li><a href="#relief" class="category-link" data-category="relief">Relief</a></li>
            <li><a href="#hydrographie" class="category-link" data-category="hydrographie">Hydrographie</a></li>
            <li><a href="#monuments" class="category-link" data-category="monuments">Monuments</a></li>
            <li><a href="#population" class="category-link" data-category="population">Population</a></li>
            <li><a href="#lieux-insolites" class="category-link" data-category="lieux-insolites">Lieux insolites</a>
            </li>
        </ul>
    </div> --}}
    <div class="category-div w-full z-1 grid sm:grid-cols-3 py-20 sm:py-0" data-category="relief">
        <p class="font-classic text-white text-2xl text-center sm:col-span-1">Lorem ipsum dolor
            sit amet
            consectetur adipisicing elit. Hic temporibus explicabo doloremque voluptate
            reprehenderit atque sint. Deserunt quo architecto possimus assumenda praesentium facilis nihil dolore
            et! Ab
            eum, incidunt iste quos architecto totam ullam perspiciatis ad minima facere dignissimos assumenda.</p>
        <x-maps-leaflet class="z-1 h-full rounded-full border-4 border-yellow-300" :centerPoint="['lat' => 50.5029639, 'long' => 6.0864066]" :zoomLevel=7.92
            :markers="[['lat' => 50.5026844, 'long' => 6.0861383]]"></x-maps-leaflet>
        <p class="font-classic text-white text-2xl text-center sm:col-span-1">Lorem ipsum, dolor sit amet
            consectetur adipisicing elit. Nesciunt illum, nulla corrupti excepturi
            possimus
            amet. Ducimus, corrupti. Odio distinctio commodi similique assumenda culpa.</p>
        <div class="font-classic text-2xl text-center sm:col-span-3 text-white">
            <h1 class="text-2xl ">Quid ?</h1>
            <p class="text-xl text-white">Lorem ipsum dolor sit amet
                consectetur, adipisicing elit. Sapiente totam enim nam impedit beatae
                voluptate
                est natus? Eum magni eos ipsa doloribus ad eveniet, quod optio voluptates hic itaque adipisci magnam,
                libero
                cum. Vero corrupti tempora sint nulla blanditiis, odit at reiciendis quis dolorum? Incidunt, quia quis.
                Quod
                accusantium libero doloribus debitis. Fugiat voluptatibus voluptate ipsa!</p>
        </div>
    </div>
</x-guest-layout>

<style>
    .category-div {
        z-index: 1;
    }
</style>

<{{-- <script>
    // Attendez que le DOM soit prêt
    document.addEventListener('DOMContentLoaded', function() {
        // Sélectionnez tous les liens de catégorie
        var categoryLinks = document.querySelectorAll('.category-link');

        // Ajoutez un gestionnaire d'événement de clic à chaque lien de catégorie
        categoryLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Empêche le comportement de lien par défaut

                var category = this.getAttribute('data-category');

                // Masquer toutes les divs de catégorie
                var divs = document.querySelectorAll('.category-div');
                divs.forEach(function(div) {
                    div.style.display = 'none';
                });

                // Afficher la div correspondant à la catégorie sélectionnée
                var selectedDiv = document.querySelector('.category-div[data-category="' +
                    category + '"]');
                if (selectedDiv) {
                    selectedDiv.style.display = 'block';
                }
            });
        });
    });
</script> --}}
