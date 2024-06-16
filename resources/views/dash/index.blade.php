@extends('dash.app')

@section('title', 'Inicio')

@section('contenido')

<h1 class="text-center text-xl bg-green-200 rounded-xl p-[0.5rem]">Tus proyectos</h1>
<!-- Mostrar mensaje de exito si un proyecto es guardado correctamente -->
@if (session('success'))
  <h5 class="text-center py-2 px-24 bg-green-100 rounded-xl text-slate-500 mt-[1rem]">{{ session('success') }}</h5>
@endif

@if (session('error'))
  <h5 class="text-center py-2 px-24 bg-green-100 rounded-xl text-slate-500 mt-[1rem]">{{ session('Error') }}</h5>
@endif
<div class="flex justify-center">

  <!-- lista de proyectos creados -->
  <div class="w-full flex flex-col items-center mt-[2rem]">
    @foreach ($projects as $project)
    <!-- etiqueta details para desplagar los detalles del proyecto -->
      <details class="w-full cursor-pointer mb-[1rem]">
        <!-- Se va a mostrar por defecto -->
      <summary class="flex justify-center">
        <div class="w-[90%] p-4 grid grid-cols-3 gap-4">
        <h3>{{ $project->description }}</h3>
        <h5 class="text-center">{{ $project->status }}</h5>
        <div class="flex justify-between pl-24">
          <form action="{{ route('edit', ['id'=>$project->id]) }}" method="POST" class="flex justify-end">
            @method('GET')
            @csrf
            <input type="submit" value="Editar" class=" bg-green-300 rounded-xl text-center px-4 py-2 cursor-pointer hover:scale-110 transition">
          </form>
          <form action="{{ route('destroy', [$project->id]) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="bg-red-300 rounded-xl text-center px-4 py-2 cursor-pointer hover:scale-110 transition">Eliminar</button>
          </form>
        </div>
        </div>
      </summary>
      <!-- Se va a mostrar cuando se clickee el proyecto -->
      <div class="flex justify-center w-full">
        <table class="w-[90%] rounded">
          <thead class="bg-gray-800 text-white">
            <tr>
              <th class="w-1/6 py-2 rounded-tl-xl">Fecha de Inicio</th>
              <th class="w-1/6 py-2">Fecha Final</th>
              <th class="w-1/6 py-2">Valor</th>
              <th class="w-1/6 py-2">Locación</th>
              <th class="w-1/6 py-2 rounded-tr-xl">Estado</th>
            </tr>
          </thead>
          <tbody class="rounded-b">
            <tr class="bg-gray-100 text-center">
              <td class="py-2 rounded-bl-xl">{{ $project->start_date }}</td>
              <td class="py-2">{{ $project->end_date }}</td>
              <td class="py-2">{{ $project->value }}</td>
              <td class="py-2">{{ $project->location }}</td>
              <td class="py-2 rounded-br-xl">{{ $project->status }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      </details>
    @endforeach
  </div>
</div>

@endsection