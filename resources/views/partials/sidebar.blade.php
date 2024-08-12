<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>


    {{-- NAVBAR CUSTOMER --}}
    {{-- TAILWIND --}}
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    {{-- GOOGLE FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Pacifico&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Arimo:ital,wght@0,700;1,700&family=DM+Serif+Display:ital@0;1&family=DM+Serif+Text:ital@0;1&family=Jersey+25&family=Poetsen+One&family=Ramabhadra&family=Righteous&family=Rubik+Mono+One&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    {{-- CSS FONT --}}
    <link rel="stylesheet" href="./css/font.css">
    {{-- ALPIN.JS --}}
    <script src="//unpkg.com/alpinejs" defer></script>
</head>



<aside id="sidebar"
    class="flex fixed top-0 left-0 z-20 flex-col flex-shrink-0 pt-16 w-64 h-full duration-200 lg:flex transition-width"
    aria-label="Sidebar">
    <div class="flex relative flex-col flex-1 pt-0 min-h-0 bg-gray-50">
        <div class="flex overflow-y-auto flex-col flex-1 pt-8 pb-4">
            <div class="flex-1 px-3 bg-gray-50" id="sidebar-items">
                <ul class="pb-2 pt-1">
                    <li>
                        <form action="#" method="GET" class="lg:hidden">
                            <label for="mobile-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text" name="search" id="mobile-search"
                                    class="bg-gray-50 border border-gray-300 text-dark-500 text-sm font-light rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full pl-10 p-2.5 mb-2"
                                    placeholder="Search" aria-label="Search">
                            </div>
                        </form>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center py-2.5 px-4 text-base font-normal text-dark-500 rounded-lg hover:bg-gray-200 group bg-white shadow-lg shadow-gray-200 transition-all duration-200"
                            aria-label="Dashboard">
                            <div
                                class="bg-fuchsia-500 text-white w-8 h-8 p-2.5 mr-1 rounded-lg text-center grid place-items-center">
                                <svg width="12px" height="12px" viewBox="0 0 45 40"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <title>shop</title>
                                    <path
                                        d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"
                                        opacity="0.598981585"></path>
                                </svg>
                            </div>
                            <span class="ml-3 text-dark-500 text-sm font-light">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://demos.creative-tim.com/soft-ui-flowbite-pro/mailing/inbox/"
                            class="flex items-center py-2.5 px-4 text-base font-normal text-dark-500 rounded-lg hover:bg-gray-200 group transition-all duration-200"
                            aria-label="Kanban">
                            <div
                                class="bg-fuchsia-500 text-white w-8 h-8 p-2.5 mr-1 rounded-lg text-center grid place-items-center">
                                <svg width="12px" height="12px" viewBox="0 0 40 44"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <title>document</title>
                                    <path
                                        d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"
                                        opacity="0.603585379"></path>
                                    <path
                                        d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                    </path>
                                </svg>
                            </div>
                            <span class="ml-3 text-dark-500 text-sm font-light">Kanban</span>
                            <span
                                class="bg-fuchsia-50 text-fuchsia-800 ml-auto text-sm font-medium inline-flex items-center justify-center px-2 rounded-full">Pro</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://demos.creative-tim.com/soft-ui-flowbite-pro/kanban/"
                            class="flex items-center py-2.5 px-4 text-base font-normal text-dark-500 rounded-lg hover:bg-gray-200 group transition-all duration-200"
                            aria-label="Inbox">
                            <div
                                class="bg-fuchsia-500 text-white w-8 h-8 p-2.5 mr-1 rounded-lg text-center grid place-items-center">
                                <svg width="12px" height="12px" viewBox="0 0 46 42"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <title>customer-support</title>
                                    <path
                                        d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.434,20.958 26.641,20.868 L32.608,18.734 C32.713,18.693 32.825,18.656 32.936,18.621 L32.936,31.852 L23.917,32.737 C23.639,32.756 23.373,32.957 23.253,33.222 L21.968,36.883 L21.968,38.309 C21.968,38.485 22.138,38.644 22.345,38.644 L40.078,38.644 C40.284,38.644 40.453,38.485 40.453,38.309 L40.453,36.883 L39.168,33.222 C39.048,32.957 38.782,32.756 38.504,32.737 L29.484,31.852 L29.484,18.621 L29.595,18.734 L35.553,20.895 C35.882,21.068 36.118,21.26 36.118,21.571 L36.118,1 C36.118,0.447 35.671,0 35.118,0 L22.118,0 C21.565,0 21.118,0.447 21.118,1 L21.118,16.944 C21.118,17.318 21.399,17.666 21.749,17.666 L26.111,17.666 C26.688,17.666 27.256,17.943 27.498,18.423 L28.978,21.597 L28.978,27.597 L30.953,25.644 L39.949,20.951 L39.949,21.158 L46.227,12.963 C46.306,12.798 46.363,12.616 46.363,12.437 L46.363,2.989 C46.363,2.812 46.306,2.63 46.227,2.465 L45.283,1.229 C45.254,1.171 45.227,1.117 45.192,1.063 L45.014,0.938 C45.007,0.931 45,0.924 44.991,0.916 L45,0 Z">
                                    </path>
                                </svg>
                            </div>
                            <span class="ml-3 text-dark-500 text-sm font-light">Inbox</span>
                        </a>
                    </li>



            </div>
        </div>
</aside>

<div class="hidden fixed inset-0 z-10 bg-gray-900 opacity-50" id="sidebarBackdrop"></div>
