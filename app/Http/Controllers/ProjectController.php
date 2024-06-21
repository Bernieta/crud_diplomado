<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Muestra el index, debe mostrar la info de los recursos (proyectos), vista (dash/index)
     */
    public function index()
    {
        $user = Auth::user();

        // Asegúrate de que el usuario esté autenticado
        if ($user) {
            // Obtén todos los proyectos del usuario autenticado
            $projects = $user->projects;
        } else {
            $projects = collect(); // Devuelve una colección vacía si no hay usuario autenticado
        }

        // Retorna la vista con los proyectos del usuario autenticado
        return view('dash.index', compact('projects'));
    }

    /**
     * Muestra la vista con el formulario de registro, vista (dash/create) 
     */
    public function create()
    {
        return view('dash.create');
    }

    /**
     * Se encarga de crear un nuevo recurso (proyecto)
     */
    public function store(Request $request)
    {
        // el atributo name de los input deben de tener esos valores
        $request->validate([
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'value' => 'required',
            'location' => 'required',
            'status' => 'required',
            'usid' => 'required'
        ]);
        $project = new Project();
        $project->description = $request->description;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->value = $request->value;
        $project->location = $request->location;
        $project->status = $request->status;
        $project->user_id = $request->usid;
        $project->save();
        return redirect()->route('dash.index')->with('success', 'Proyecto creado con exito');
    }

    /**
     * Debe mostrar los datos del recurso (proyecto) seleccionado, ver sus detalles, vista (dash/show)
     */
    public function show($id)
    {
        $project = Project::find($id);
        if (!$project) // el recurso no existe se redirecciona al index
            return redirect()->route('dash.index')->with('error', 'Proyecto no encontrado');

        return view('dash.show', ['project' => $project]);
    }

    /**
     * Muestra la vista con el formulario de edición, debe tener los datos del recurso a actalizar, vista (dash/edit)
     */
    public function edit($id)
    {
        $project = Project::find($id);
        if (!$project) // el recurso no existe se redirecciona al index
            return redirect()->route('dash.index')->with('error', 'Proyecto no encontrado');

        return view('dash.edit', ['project' => $project]);
    }

    /**
     * Se encarga de actualizar un recurso (proyecto)
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        if (!$project) // el recurso no existe se redirecciona al index
            return redirect()->route('dash.index')->with('error', 'Proyecto no encontrado');

        $project->description = $request->description;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->value = $request->value;
        $project->location = $request->location;
        $project->status = $request->status;
        $project->save();
        return redirect()->route('dash.index')->with('success', 'Proyecto actualizado con exito');
    }

    /**
     * Se encarga de eliminar un recurso (proyecto)
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        if (!$project) // el recurso no existe se redirecciona al index
            return redirect()->route('dash.index')->with('error', 'Proyecto no encontrado');
        $project->delete();
        return redirect()->route('dash.index')->with('success', 'Proyecto eliminado con exito');
    }
}
