@extends('dash.app')

@section('title', 'Crear Proyecto')

@section('contenido')

<h1 class="text-center text-xl bg-green-200 rounded-xl p-[0.5rem]">Crear nuevo proyecto</h1>

<div class="flex justify-center mt-[2rem]">
  <form action="{{ route('create') }}" method="post" class="space-y-4 sm:space-y-0 grid sm:grid-cols-2 gap-4">
    @csrf
    <!-- input con el id del usuario logeado -->
    <input type="hidden" id="usid" name="usid" value="{{ auth()->user()->id }}">
    <!-- descripcion -->
    <div class="flex flex-col space-y-3">
      <label for="description">Descripción</label>
      <input id="description" name="description" placeholder="Descripción" class="rounded-xl text-center bg-slate-200 border-0">
    </div>
    <!-- fecha inicio -->
    <div class="flex flex-col space-y-3">
      <label for="start_date">Fecha de inicio</label>
      <input type="date" id="start_date" name="start_date" class="rounded-xl text-center bg-slate-200 border-0">
    </div>
    <!-- fecha final -->
    <div class="flex flex-col space-y-3">
      <label for="end_date">Fecha final</label>
      <input type="date" id="end_date" name="end_date" class="rounded-xl text-center bg-slate-200 border-0">
    </div>
    <!-- valor -->
    <div class="flex flex-col space-y-3">
      <label for="value">Valor</label>
      <input type="number" id="value" name="value" placeholder="Valor" class="rounded-xl text-center bg-slate-200 border-0">
    </div>
    <!-- Locación -->
    <div class="flex flex-col space-y-3">
      <label for="location">Locación</label>
      <input id="location" name="location" placeholder="Locación" class="rounded-xl text-center bg-slate-200 border-0">
    </div>
    <!-- Estado -->
    <div class="flex flex-col space-y-3">
      <label for="status">Estado</label>
      <select name="status" id="status" class="rounded-xl text-center bg-slate-200 border-0">
        <option value="Pendiente">Pendiente</option>
        <option value="Activo">Activo</option>
        <option value="Completado">Completado</option>
      </select>
    </div>
    @if ($errors->any())
      <h5 class="sm:col-span-2 text-center py-2 bg-red-100 rounded-xl text-slate-500">Por favor, complete todos los campos requeridos.</h5>
    @endif
    @error('description')
    @enderror
    <!-- Botones -->
    <div class="sm:col-span-2 flex justify-around">
      <a href="inicio" class=" py-2 px-6 bg-slate-500 rounded-xl hover:scale-110 transition hover:bg-slate-700 text-white hover:shadow-md">Volver</a>
      <input type="submit" id="submit" placeholder="enviar" class="cursor-pointer py-2 px-6 bg-green-600 rounded-xl hover:scale-110 transition hover:bg-green-700 text-white hover:shadow-md">
    </div>
  </form>
</div>

@endsection