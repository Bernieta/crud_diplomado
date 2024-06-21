<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', config('app.name', 'Crud Diplomado'))</title>
  <!-- llamar a TailwindCSS -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <!-- Estilos de animación de navbar -->
  <style>
        .sidebar-active .sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s;
        }

        .sidebar-active .content {
            margin-left: 0rem;
            transition: margin-left 0.3s;
        }

        .sidebar {
            transform: translateX(0);
            transition: transform 0.3s;
        }

        .content {
            margin-left: 20rem;
            transition: margin-left 0.3s;
        }
    </style>
</head>
<body>
  <!-- navbar -->
  <nav class="w-full h-12 px-[2rem] bg-green-600 flex items-center shadow-lg rounded-b-xl fixed top-0 z-20 text-white">
    <ul class="w-full flex justify-between items-center">
      <li><button id="openBtn" class="open-btn text-3xl">☰</button></li>
      <li class="font-bold text-xl hidden sm:flex">Crud Diplomado</li>
      <li class="w-[10%] text-end cursor-pointer hover:scale-110 transition">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-primary">Cerrar Sesión</button>
        </form>
      </li>
    </ul>
  </nav>

  <div class="w-full">
    <!-- sidebar -->
    <aside id="sidebar" class="sidebar fixed top-0 left-0 h-dvh w-[20rem] bg-gray-800 text-white p-4 pt-1 z-30 shadow-lg">
      <div id="toggle-btn" class="text-5xl mb-[1rem]">
        <button id="closeBtn" class="text-white text-5xl cursor-pointer">&times;</button>
      </div>
      <h4 class="text-center text-xl w-[90%] mx-auto">Bienvenido <br> {{ auth()->user()->name }} </h4>
      <nav class="pt-[1.5rem] px-[2rem] mt-[1.5rem] border-t">
        <ul class="flex flex-col text-lg space-y-4">
          <li class="cursor-pointer hover:scale-110 transition"><a href="inicio">Inicio</a></li>
          <li class="cursor-pointer hover:scale-110 transition"><a href="create">Crear</a></li>
        </ul>
      </nav>
      <footer class="h-[70%] w-full relative">
        <div class="w-full absolute bottom-[4rem] border-t pt-4">
          <h4 class="text-center font-bold mb-3">Integrantes:</h4>
          <ul class="flex flex-col text-lg space-y-4 text-center">
            <li class="text-xs">Juan Camilo Arrieta Bernal</li>
            <li class="text-xs">Rober David Bracamonte Arias</li>
            <li class="text-xs">Carlos Alberto Oyola Arrieta</li>
            <li class="text-xs">Sebastian Andres Solano Sotelo</li>
            <li class="text-xs">Elkin Andres Vasquez Madrid</li>
          </ul>
        </div>
      </footer>
    </aside>
  
    <!-- content -->
    <div id="content" class="content flex-1 p-[3rem] mt-[2rem] right-0">
        @yield('contenido')
    </div>
  </div>

  <!-- script para ocultar y mostrar navbar -->
  <script>
    // sidebar toggle
    document.addEventListener("DOMContentLoaded", function() {
      const openBtn = document.getElementById("openBtn");
      const closeBtn = document.getElementById("closeBtn");
      const body = document.body;

      openBtn.addEventListener("click", function() {
          body.classList.remove("sidebar-active");
      });

      closeBtn.addEventListener("click", function() {
          body.classList.add("sidebar-active");
      });
    });
  </script>
</body>
</html>