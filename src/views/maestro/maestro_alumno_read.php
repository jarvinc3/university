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
$id_maestro = $resultado['id'];

$query2  = $mysqli->query("SELECT * FROM cursos
WHERE maestroID = '$id_maestro'");
$resultado2 = $query2->fetch_assoc();

$query = "SELECT estudiantes.name, estudiantes.id
          FROM estudiantes
          INNER JOIN inscripciones ON estudiantes.id = inscripciones.estudianteID
          INNER JOIN cursos ON inscripciones.cursoID = cursos.cursoID
          WHERE cursos.maestroID = ?";

$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id_maestro);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
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
                    <h1 class=" text-2xl font-medium text-gray-700">Alumnos de la Clase de <?php echo $resultado2['nombreCurso'] ?></h1>
                    <div class="flex gap-1">
                        <a href="./vMaestro.php">
                            <p class="text-blue-500">Home</p>
                        </a>/ <p>Perfil</p>
                    </div>
                </div>
                <div class="bg-white shadow-sm shadow-gray-400 w-[100%] rounded-sm  flex flex-col justify-center gap-1">
                    <div class="flex items-center p-3 pl-6">
                        <h2>Lista de Estudiantes del Curso <?php echo $resultado2['nombreCurso'] ?></h2>
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
                                            Nombre del Alumno
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
                                            Mensajes
                                            <span class="material-symbols-outlined text-gray-400 text-base">swap_vert</span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-2 py-2 border-2 border-gray-300">
                                        <div class="flex justify-between items-center">
                                            Acciones
                                            <span class="material-symbols-outlined text-gray-400 text-base">swap_vert</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='px-2 py-2 border-[1px] border-gray-200'>" . $row['id'] . "</td>";
                                echo "<td class='px-2 py-2 border-[1px] border-gray-200'>" . $row['name'] . "</td>";
                                echo "<td class='px-2 py-2 border-[1px] border-gray-200'>" . "</td>";
                                echo "<td class='px-2 py-2 border-[1px] border-gray-200'>" . "</td>";
                                echo "<td class='px-2 py-2 border-[1px] border-gray-200 flex justify-center flex-row-reverse gap-2'>
                                    <a class=' flex items-center justify-center' href='#?id=" . "'>
                                        <span class='material-symbols-outlined text-blue-400 text-2xl'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-send-plus' viewBox='0 0 16 16'>
                                                <path d='M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z'/>
                                                <path d='M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z'/>
                                            </svg>
                                        </span>
                                    </a>
                                    <a class=' flex items-center justify-center' href='#?id=" . "'>
                                        <span class='material-symbols-outlined text-blue-400'>note_add</span>
                                    </a>
                                </td>";
                                echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="w-[100%] flex items-center justify-between gap-1 p-2 pt-4 px-6 pb-6">
                        <p>Showing 1 to 10 of 11 entries</p>
                        <div class="flex">
                            <button class="hover:bg-slate-200 px-3 py-1 border-[1px] border-gray-500 rounded-l-lg">Previous</button>
                            <button class="hover:bg-blue-500 hover:text-white text-blue-600 px-3 py-1 border-y-[1px] border-gray-500">1</button>
                            <button class="hover:bg-slate-200 text-blue-600 px-3 py-1 border-[1px] border-gray-500 rounded-r-lg">Next</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow-sm shadow-gray-400 w-[100%] rounded-sm p-3  flex flex-col justify-center gap-1">
                    <p>Created by <strong>jarvinc3</strong></p>
                </div>
            </div>
        </section>
    </main>
</body>

</html> <?php } ?>