<x-guest-layout>
    <div class='h-3/5 py-20 text-center'>
        <h1 class='font-classic text-white text-8xl py-10'>
            @if (Auth::check())
                <span class="content-fr">Bon retour sur Belgicart, <span
                        class="font-title not-italic font-bold text-yellow-300">{{ auth()->user()->pseudo }}
                    </span></span>
                <span class="content-en">Welcome back to Belgicart, <span
                        class="font-title not-italic font-bold text-yellow-300">{{ auth()->user()->pseudo }}
                    </span></span>
                <span class="content-nl">Welkom terug bij Belgicart, <span
                        class="font-title not-italic font-bold text-yellow-300">{{ auth()->user()->pseudo }}
                    </span></span>
                <span class="content-de">Willkommen zurück bei Belgicart, <span
                        class="font-title not-italic font-bold text-yellow-300">{{ auth()->user()->pseudo }}</span></span>
            @else
                <span class="content-fr">Bienvenue sur <span
                        class="font-title not-italic font-bold text-yellow-300">Belgicart
                    </span></span>
                <span class="content-en">Welcome to <span
                        class="font-title not-italic font-bold text-yellow-300">Belgicart </span></span>
                <span class="content-nl">Welkom bij <span
                        class="font-title not-italic font-bold text-yellow-300">Belgicart </span></span>
                <span class="content-de">Willkommen bei <span
                        class="font-title not-italic font-bold text-yellow-300">Belgicart </span></span>
            @endif
        </h1>
        <p class='font-classic text-white text-4xl'>
            <span class="content-fr">Vous entrez en territoire belge, et avec lui ses <span
                    class="font-title   font-bold text-yellow-300">frites</span>, ses <span
                    class="font-title   font-bold text-yellow-300">guindailles</span> et son
                <span class="font-title   font-bold text-yellow-300">paysage...</span></span>
            <span class="content-en">You are entering Belgian territory, along with its <span
                    class="font-title   font-bold text-yellow-300">fries</span>, <span
                    class="font-title   font-bold text-yellow-300">festivities</span>, and
                <span class="font-title   font-bold text-yellow-300">landscapes...</span></span>
            <span class="content-nl">U betreedt Belgisch grondgebied, met zijn <span
                    class="font-title   font-bold text-yellow-300">frieten</span>, <span
                    class="font-title   font-bold text-yellow-300">festiviteiten</span> en
                <span class="font-title   font-bold text-yellow-300">landschappen...</span></span>
            <span class="content-de">Sie betreten belgisches Gebiet, zusammen mit
                seinen <span class="font-title   font-bold text-yellow-300">Pommes</span>, <span
                    class="font-title   font-bold text-yellow-300">Festlichkeiten</span> und
                <span class="font-title   font-bold text-yellow-300">Landschaften...</span></span>
        </p>
    </div>

    <section class="slider-wrapper z-10 hidden md:block">
        <ul class="slides-container" id="slides-container">
            @foreach ($sliders as $slider)
                <li class="slide">
                    @php
                        $imagePath = str_replace('storage/images/', '', $slider->path);
                    @endphp
                    <img src="{{ asset('/storage/images/' . $imagePath) }}" />
                </li>
            @endforeach
        </ul>
    </section>

    <div class="content grid sm:grid-cols-2 sm:grid-rows-2 place-items-center py-20">
        <h2 class="font-classic text-white text-8xl py-10 sm:col-span-1 text-center"><span class="content-fr">Qui
                suis-je
                ?</span><span class="content-en">About
                Me</span><span class="content-nl">Over mij</span><span class="content-de">Über mich</span></h2>
        <div class="photo sm:col-span-1">
            <img src='{{ asset('/storage/avatar/b1zG4qAGRaZGpgrtu6TYqTes7chCKBxaxep96ZHI.jpg') }}'
                class="rounded-full border-2 border-yellow-300" width="200" height='200' />
        </div>
        <div class="paragaphs sm:col-span-2 font-classic text-white text-2xl text-center">
            <p class='text-white'>
                <span class="content-fr">Je m'appelle Nicolas, j'ai 25 ans et je suis passionné de géographie. Je me
                    suis
                    tourné vers le développement web depuis bientôt 2 ans, avec la ferme intention de valoriser mon
                    amour
                    pour le globe terrestre à travers mes créations. Je suis né et vis en Belgique depuis un quart de
                    siècle. Belgicart existe afin de vulgariser le territoire belge et ses quelques pépites. Derrière
                    son
                    titre de <span class="italic">plat pays</span>, mon pays recense un bon nombre de pépites !</span>
                <span class="content-en">My name is Nicolas, I'm 25 years old, and I'm passionate about geography. I
                    turned
                    to web development almost 2 years ago with the firm intention of showcasing my love for the Earth
                    through my creations. I was born and have been living in Belgium for a quarter of a century.
                    Belgicart
                    aims to popularize the Belgian territory and its hidden gems. Behind its reputation as a <span
                        class="italic">flat country</span>, my country has quite a few hidden gems!</span>
                <span class="content-nl">Mijn naam is Nicolas, ik ben 25 jaar oud en ik ben gepassioneerd door
                    geografie. Ik
                    ben bijna 2 jaar geleden overgestapt op webontwikkeling met de duidelijke intentie om mijn liefde
                    voor
                    de aarde te laten zien door middel van mijn creaties. Ik ben geboren en woon al een kwart eeuw in
                    België. Belgicart heeft als doel het Belgische grondgebied en de verborgen pareltjes ervan te
                    populariseren. Achter de reputatie van een <span class="italic">vlak land</span> heeft mijn land
                    heel
                    wat verborgen pareltjes!</span>
                <span class="content-de">Ich heiße Nicolas, bin 25 Jahre alt und bin begeistert von Geographie. Ich habe
                    mich vor fast 2 Jahren dem Webentwicklung zugewandt, mit der festen Absicht, meine Liebe zur Erde
                    durch
                    meine Kreationen zu präsentieren. Ich wurde vor einem Vierteljahrhundert in Belgien geboren und lebe
                    dort. Belgicart hat zum Ziel, das belgische Territorium und seine versteckten Schätze bekannt zu
                    machen.
                    Hinter seinem Ruf als <span class="italic">flaches Land</span> hat mein Land so einige versteckte
                    Schätze!</span>
            </p>
            <p class='text-white'>
                <span class="content-fr">Ce site web est conçu via le framework <strong>Laravel</strong>, qui m'a
                    grandement
                    aidé dans ma tâche.</span>
                <span class="content-en">This website is built using the <strong>Laravel</strong> framework, which has
                    greatly assisted me in my task.</span>
                <span class="content-nl">Deze website is gebouwd met behulp van het <strong>Laravel</strong>-framework,
                    dat
                    me enorm heeft geholpen bij mijn taak.</span>
                <span class="content-de">Diese Website wurde mit dem <strong>Laravel</strong>-Framework erstellt, das
                    mir
                    bei meiner Aufgabe sehr geholfen hat.</span>
            </p>
        </div>
    </div>
</x-guest-layout>

<script>
    const slidesContainer = document.getElementById("slides-container");
    const slides = Array.from(document.querySelectorAll(".slide"));

    let currentSlideIndex = 0;
    let slideInterval;

    // Fonction pour passer à la diapositive suivante
    const nextSlide = () => {
        currentSlideIndex++;
        if (currentSlideIndex >= slides.length) {
            currentSlideIndex = 0;
        }
        const slideWidth = slides[0].clientWidth;
        slidesContainer.scrollLeft = currentSlideIndex * slideWidth;
    };

    // Fonction pour passer à la diapositive précédente
    const prevSlide = () => {
        currentSlideIndex--;
        if (currentSlideIndex < 0) {
            currentSlideIndex = slides.length - 1;
        }
        const slideWidth = slides[0].clientWidth;
        slidesContainer.scrollLeft = currentSlideIndex * slideWidth;
    };

    // Fonction pour démarrer l'automatisation des slides
    const startSlideShow = () => {
        slideInterval = setInterval(nextSlide, 4000);
    };

    // Fonction pour arrêter l'automatisation des slides
    const stopSlideShow = () => {
        clearInterval(slideInterval);
    };

    // Démarrer l'automatisation des slides au chargement de la page
    startSlideShow();

    // Arrêter l'automatisation des slides lorsque la souris survole la zone de slides
    slidesContainer.addEventListener("mouseenter", stopSlideShow);

    // Reprendre l'automatisation des slides lorsque la souris quitte la zone de slides
    slidesContainer.addEventListener("mouseleave", startSlideShow);
</script>
