<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ../login.php');
    exit();
} else {
require_once __DIR__ . '/../../conexion/db.php';
$email = $_SESSION['email'];
$consulta = $mysqli->query("SELECT *FROM estudiantes WHERE email = '$email'");
$resultado = $consulta->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/modal.js" defer></script>
    <script src="/js/menu.js" defer></script>
    <title>Alumno</title>
</head>

<body>
    <main class="flex">
        <section id="menu1" class="h-[100vh] bg-[#34393f] w-[20%] fixed hidden">
            <img src="/img/logo2.jpg" alt="logo" class="w-[100%] ">
            <hr class=" border-[#51575e]">
            <div class="p-[20px] flex flex-col gap-2">
                <h2 class="text-[#9c9fa1] font-medium">Alumno</h2>
                <div class="text-[#9c9fa1] font-medium flex">
                    <div class="flex gap-1">
                        <p><?php echo $resultado['name'] ?></p>
                        <p><?php echo $resultado['apellido'] ?></p>
                    </div>
                </div>
            </div>
            <hr class="w-[230px] ml-[14px] border-[#4d5359]">
            <div class="p-[20px] pt-6 flex flex-col gap-4">
                <h1 class="text-[#9c9fa1] w-[100%] flex justify-center font-semibold">MENU ALUMNOS</h1>
                <a href="#" class="flex gap-3">
                    <span class="material-symbols-outlined text-[#9c9fa1]">task</span>
                    <h2 class="text-[#9c9fa1] font-medium">Ver Calificaciones</h2>
                </a>
                <a href="./clases/clases_read.php" class="flex gap-3">
                    <span class="material-symbols-outlined text-[#9c9fa1]">tv_gen</span>
                    <h2 class="text-[#9c9fa1] font-medium">Administra tus Clases</h2>
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
                    <h1 class=" text-2xl font-medium text-gray-700">Calificaciones y Mensajes de tus clases</h1>
                    <div class="flex gap-1">
                        <a href="./vAlumno.php">
                            <p class="text-blue-500">Home</p>
                        </a>/ <p>Calificaciones</p>
                    </div>
                </div>
                <div class="bg-white shadow-sm shadow-gray-400 w-[100%] rounded-sm  flex flex-col justify-center gap-1">
                    <div class="flex items-center p-3 pl-6">
                        <h2>Calificaciones y Mensajes de tus clases</h2>
                    </div>
                    <hr>
                    <div class="w-[100%] flex justify-end gap-1 p-2 pt-4 px-3">
                        <p>Search:</p>
                        <input type="text" class="border-2 rounded-md">
                    </div>
                    <div class="flex flex-col gap-4 px-6 py-2">
                        <table class="w-full">
                            <thead class="text-black font-medium text-sm">
                                <tr class="bg-white">
                                    <th scope="col" class="px-2 py-2 border-2 border-gray-300">
                                        <div class="flex justify-between">
                                            #
                                            <span class="material-symbols-outlined text-gray-400 text-base">swap_vert</span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-2 py-2 border-2 border-gray-300">
                                        <div class="flex justify-between items-center">
                                            Nombre de clase
                                            <span class="material-symbols-outlined text-gray-400 text-base">swap_vert</span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-2 py-2 border-2 border-gray-300">
                                        <div class="flex justify-between items-center">
                                            Calificacion
                                            <span class="material-symbols-outlined text-gray-400 text-base">swap_vert</span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-2 py-2 border-2 border-gray-300">
                                        <div class="flex justify-between items-center">
                                            Mensaje
                                            <span class="material-symbols-outlined text-gray-400 text-base">swap_vert</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // while ($row = $consultaEstudiantes->fetch_assoc()) {

                                echo "<tr>";
                                echo "<td class='px-2 py-2 border-[1px] border-gray-200'>" . "</td>";
                                echo "<td class='px-2 py-2 border-[1px] border-gray-200'>" . "</td>";
                                echo "<td class='px-2 py-2 border-[1px] border-gray-200'>" . "</td>";
                                echo "<td class='px-2 py-2 border-[1px] border-gray-200 flex justify-center'>
                                    <span class='material-symbols-outlined text-blue-400'>sms</span></td>";
                                echo "</tr>";
                                // }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="w-[100%] flex items-center justify-between gap-1 p-2 pt-4 px-6 pb-6">
                        <p>Showing 1 to 6 of 6 entries</p>
                        <div class="flex">
                            <button class="hover:bg-slate-200 px-3 py-1 border-[1px] border-gray-500 rounded-l-lg">Previous</button>
                            <button class="hover:bg-blue-500 hover:text-white text-blue-600 px-3 py-1 border-y-[1px] border-gray-500">1</button>
                            <button class="hover:bg-slate-200 text-blue-600 px-3 py-1 border-[1px] border-gray-500 rounded-r-lg">Next</button>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="bg-white shadow-sm shadow-gray-400 w-[100%] rounded-sm p-3  flex flex-col justify-center gap-1">
                    <p>Created by <strong>jarvinc3</strong></p>
                </div>
        </section>
    </main>
</body>

</html><?php } ?>