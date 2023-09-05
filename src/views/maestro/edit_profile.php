<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ../login.php');
    exit();
} else {
require_once __DIR__ . '/../../conexion/db.php';
$email = $_SESSION['email'];
$consulta = $mysqli->query("SELECT *FROM maestros WHERE email = '$email'");
$resultado = $consulta->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/modal.js" defer></script>
    <script src="/js/menu.js" defer></script>
    <title>Maestro</title>
</head>

<body>
    <main class="flex">
        <section id="menu1" class="h-[100vh] bg-[#34393f] w-[20%] fixed hidden">
            <img src="/img/logo2.jpg" alt="logo" class="w-[100%] ">
            <hr class=" border-[#51575e]">
            <div class="p-[20px] flex flex-col gap-2">
                <h2 class="text-[#9c9fa1] font-medium">Maestro</h2>
                <div class="text-[#9c9fa1] font-medium flex">
                    <div class="flex gap-1">
                        <p><?php echo $resultado['name'] ?></p>
                        <p><?php echo $resultado['apellido'] ?></p>
                    </div>
                </div>
            </div>
            <hr class="w-[230px] ml-[14px] border-[#4d5359]">
            <div class="p-[20px] pt-6 flex flex-col gap-4">
                <h1 class="text-[#9c9fa1] w-[100%] flex justify-center font-semibold">MENU MAESTRO</h1>
                <a href="./maestro_alumno_read.php" class="flex gap-3">
                    <span class="material-symbols-outlined text-[#9c9fa1]">school</span>
                    <h2 class="text-[#9c9fa1] font-medium">Alumnos</h2>
                </a>
            </div>
        </section>
        <section id="menu2" class="w-[100%] h-[100vh] bg-[#f5f6fa] ">
            <nav id="nav" class=" bg-white w-[100%] h-[9%] flex justify-between items-center gap-3 px-3 shadow-sm shadow-gray-400 fixed">
                <div class="flex gap-3">
                    <span id="menu-icon" class="material-symbols-outlined text-[#b6beb3] text-lg cursor-pointer hover:text-gray-600">menu</span>
                    <h1 class="text-[#b6beb3] font-medium">Home</h1>
                </div>
                <div class="flex gap-2">
                    <div class="flex gap-1">
                        <p><?php echo $resultado['name'] ?></p>
                        <p><?php echo $resultado['apellido'] ?></p>
                    </div>
                    <span id="flecha" class="material-symbols-outlined cursor-pointer">chevron_right</span>
                    <div id="modal" class=" absolute top-[68px] right-[20px] bg-white shadow-sm shadow-gray-400 rounded-md hidden">
                        <a href="./edit_profile.php">
                            <div class="flex gap-3 pl-4 py-3 pr-[4rem]">
                                <img src="/img/profile.svg" alt="profile edit">
                                <p>Perfil</p>
                            </div>
                        </a>
                        <hr>
                        <form action="/src/accions/logout.php">
                            <div class="flex gap-3 px-4 py-3 text-red-500">
                                <span class="material-symbols-outlined cursor-none">door_open</span>
                                <button type="submit">
                                    <p>Logout</p>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="p-5 h-[80%] flex flex-col gap-6 mt-[70px] ">
                <div class="flex justify-between">
                    <h1 class=" text-2xl font-medium text-gray-700">Editar datos del perfil</h1>
                    <div class="flex gap-1">
                        <a href="./vMaestro.php">
                            <p class="text-blue-500">Home</p>
                        </a>/ <p>Clase</p>
                    </div>
                </div>
                <div class="bg-white shadow-sm shadow-gray-400 w-[100%] rounded-sm  flex flex-col justify-center gap-1">
                    <div class="flex items-center p-3 pl-6">
                        <h2>Informacion de Usuario</h2>
                    </div>
                    <hr>
                    <form class="flex flex-col gap-4 p-3 pl-6" action="/src/accions/edit_profile_m.php" method="post">
                        <div>
                            <strong>
                                <p>Correo Electronico</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md hover:bg-slate-200 focus:outline-0" type="email" name="email" value="<?php echo $resultado['email'] ?>">
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Contraseña Ingresa para cambiar la contraseña</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md hover:bg-slate-200 focus:outline-0" type="password" name="contrasena" placeholder="Para modificar ingresa una nueva contraseña">
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Nombre(s)</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md hover:bg-slate-200 focus:outline-0" type="text" name="nombre" value="<?php echo $resultado['name'] ?>">
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Apellidos</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md hover:bg-slate-200 focus:outline-0" type="text" name="apellidos" value="<?php echo $resultado['apellido'] ?>">
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Direccion</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md hover:bg-slate-200 focus:outline-0" type="text" name="direccion" value="<?php echo $resultado['direccion'] ?>">
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Fecha de nacimiento</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px]  rounded-l-md hover:bg-slate-200 focus:outline-0" type="date" name="fecha_nacimiento" value="<?php echo $resultado['fecha_de_nacimiento'] ?>">
                            </div>
                        </div>

                        <button type="submit" class="w-[180px] bg-blue-500 text-white px-4 py-[6px] rounded-md right-5  hover:bg-blue-600 hover:shadow-custom hover:shadow-zinc-800">Guardar Cambios</button>
                    </form>
                </div>
                <div class="bg-white shadow-sm shadow-gray-400 w-[100%] rounded-sm p-3  flex flex-col justify-center gap-1">
                    <p>Created by <strong>jarvinc3</strong></p>
                </div>
            </div>
        </section>
    </main>
</body>

</html><?php } ?>