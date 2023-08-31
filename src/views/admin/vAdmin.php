<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="/dist/output.css" rel="stylesheet">
    <title>Admin</title>
</head>

<body>
    <main class="flex">
        <section class="h-[100vh] bg-[#34393f] w-[20%] fixed">
            <img src="/img/logo2.jpg" alt="logo" class="w-[100%] ">
            <hr class=" border-[#51575e]">
            <div class="p-[20px] flex flex-col gap-2">
                <h2 class="text-[#9c9fa1] font-medium">Admin</h2>
                <div class="text-[#9c9fa1] font-medium flex">
                    <p>Administrador</p>
                </div>
            </div>
            <hr class="w-[230px] ml-[14px] border-[#4d5359]">
            <div class="p-[20px] pt-6 flex flex-col gap-4">
                <h1 class="text-[#9c9fa1] w-[100%] flex justify-center font-semibold">MENU ADMINISTRACION</h1>
                <a href="#" class="flex gap-3">
                    <span class="material-symbols-outlined text-[#9c9fa1]">manage_accounts</span>
                    <h2 class="text-[#9c9fa1] font-medium">Permisos</h2>
                </a>
                <a href="#" class="flex gap-3">
                    <span class="material-symbols-outlined text-[#9c9fa1]">person_pin</span>
                    <h2 class="text-[#9c9fa1] font-medium">Maestros</h2>
                </a>
                <a href="#" class="flex gap-3">
                    <span class="material-symbols-outlined text-[#9c9fa1]">school</span>
                    <h2 class="text-[#9c9fa1] font-medium">Alumnos</h2>
                </a>
                <a href="" class="flex gap-3">
                    <span class="material-symbols-outlined text-[#9c9fa1]">tv_gen</span>
                    <h2 class="text-[#9c9fa1] font-medium">Clases</h2>
                </a>
            </div>
        </section>
        <section class="w-[80%] h-[100vh] bg-[#f5f6fa] ml-[272px]">
            <nav class="bg-white w-[80%] h-[10%] flex justify-between items-center gap-3 px-3 shadow-sm shadow-gray-400 fixed">
                <div class="flex gap-3">
                    <span class="material-symbols-outlined text-[#b6beb3] text-lg">menu</span>
                    <h1 class="text-[#b6beb3] font-medium">Home</h1>
                </div>
                <div class="flex gap-2">
                    <p>Administrador</p>
                    <span class="material-symbols-outlined cursor-pointer">expand_more</span>
                    <div class=" absolute top-[68px] right-[20px] bg-white shadow-sm shadow-gray-400 rounded-md ">
                        <div class="flex gap-3 pl-4 py-3 pr-[4rem]">
                            <img src="/img/profile.svg" alt="profile edit">
                            <p>Perfil</p>
                        </div>
                        <hr>
                        <div class="flex gap-3 px-4 py-3 text-red-500">
                            <span class="material-symbols-outlined">door_open</span>
                            <p>Logout</p>
                        </div>
                    </div>
                </div>

            </nav>
            <div class="p-5 h-[80%] flex flex-col gap-6 mt-[70px] ">
                <div class="flex justify-between">
                    <h1 class=" text-2xl font-medium text-gray-700">Dashboard</h1>
                    <div class="flex gap-1">
                        <p class="text-blue-500">Home</p> / <p>Dashboard</p>
                    </div>
                </div>
                <div class="bg-white shadow-sm shadow-gray-400 w-[600px] h-[75px] rounded-sm p-3 pl-6 flex flex-col justify-center gap-1">
                    <p class="text-gray-600 text-sm">Bienvenido</p>
                    <p class="text-gray-600 text-sm">Seleciona la accion que quieras realizar en la pestaña del menu de la izquierda</p>
                </div>
            </div>
        </section>
    </main>
</body>

</html>