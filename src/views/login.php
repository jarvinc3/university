<?php
require_once "../conexion/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <title>Login</title>
</head>
<body>
    <main class="h-[100vh] flex flex-col items-center bg-[#fff5d2]">
        <img class="w-[300px] my-4" src="/img/logo.jpg" alt="">
        <form class="bg-[white] flex flex-col items-center gap-5 pb-5 shadow-custom rounded-sm p-3" action="../accions/login.php" method="post">
            <h1 class="text-gray-500">Bienvenido! Ingresa con tu cuenta.</h1>
            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                <input class="px-3 py-[6px] w-[290px] rounded-l-md hover:bg-slate-200 focus:outline-0" type="email" name="correo" placeholder="Email" required oninvalid="this.setCustomValidity('Agregue un Correo')"  oninput="this.setCustomValidity('')">
                <span class="material-symbols-outlined text-gray-500 pl-2">mail</span>
            </div>
            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                <input class="px-3 py-[6px] w-[290px] rounded-l-md hover:bg-slate-200 focus:outline-0" type="password" name="pssword" placeholder="Password" required oninvalid="this.setCustomValidity('agregue una contraseña')"  oninput="this.setCustomValidity('')">
                <span class="material-symbols-outlined text-gray-500 pl-2">lock</span>
            </div>
            
            <div class="flex justify-end w-[100%]">
                <button type="submit" class=" bg-blue-500 text-white px-4 py-[6px] rounded-md right-5  hover:bg-blue-600 hover:shadow-custom hover:shadow-zinc-800">Ingresar</button>
            </div>
            <h1 class=" text-gray-500">O crea una cuenta: <a class="text-blue-500" href="./create_acount.php">Registrarse</a></h1>
        </form>
    </main>
</body>
</html>