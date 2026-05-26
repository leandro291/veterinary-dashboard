<body class="flex h-screen overflow-y-hidden">
    
    <aside class="w-80 bg-white border-r border-gray-400/50 grid grid-rows-[100px_1fr_80px]">

        <div class="flex items-center gap-3 px-4 py-4 h-25 w-full border-b border-gray-400/50">

            <div class="">
                <img src="/veterinaria/assets/imgs/logo_veterinaria.webp" class="w-12 h-12 object-cover rounded-lg" alt="">
            </div>
            <div>
                <h1 class="font-bold text-lg">Veterinaria Pro</h1>
                <span class="text-gray-600 text-base">Dashboard Analytics</span>
            </div>

        </div>

        <nav class="px-6 py-8">
            <ul class="flex flex-col gap-1">
                <a href="?page=home" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-base text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition duration-200 cursor-pointer">
                    <span>📊</span> Resumen General
                </a>
                <a href="?page=patients" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-base text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition duration-200 cursor-pointer">
                    <span>🐾</span> Pacientes
                </a>
                <a href="?page=veterinarians" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-base text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition duration-200 cursor-pointer">
                    <span>⚕️</span> Veterinarios
                </a>
                <a href="?page=citas_medicas" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-base text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition duration-200 cursor-pointer">
                    <span>🩹</span> Citas Medicas
                </a>
            </ul>
        </nav>

        <div class="flex gap-3 border-t border-gray-400/50 px-4 py-4 items-center">
            <div>
                <img src="/veterinaria/assets/imgs/usuario.webp" class="w-12 h-10 object-cover rounded-lg" alt="">
            </div>
            <div class="flex flex-col">
                <span class="font-bold text-base"><?= $_SESSION['usuario'] ?></span>
                <span class="text-xs text-gray-600" ><?= $_SESSION['rol'] ?></span>
            </div>
            <form action="/veterinaria/pages/auth/logout.php" method="POST">
                <button type="submit" class="cursor-pointer hover:bg-red-100 px-4 py-2 rounded-lg text-sm text-gray-600">
                    🚪
                </button>
            </form>
        </div>

    </aside>

    <main class="w-full">