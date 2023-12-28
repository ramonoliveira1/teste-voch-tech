<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\CargoColaborador;
use App\Models\Colaborador;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ColaboradoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colaboradores = Colaborador::with(['unidade', 'cargoColaborador.cargo'])->paginate(10);

        return view('colaboradores.index', compact('colaboradores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('colaboradores.create')
            ->with([
                'cargos' => Cargo::all(),
                'unidades' => Unidade::all()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:colaboradores,email',
            'cargo_id' => 'required|exists:cargos,id',
            'unidade_id' => 'required|exists:unidades,id',
        ]);

        $colaborador = Colaborador::create($request->all());

        CargoColaborador::create([
            'colaborador_id' => $colaborador->id,
            'cargo_id' => $request->cargo_id,
            'nota_desempenho' => 0
        ]);

        return redirect()->route('colaboradores.index')->with('success', 'Colaborador cadastrado com sucesso!');
    }

    public function gradeForm(Request $request)
    {
        $colaborador = CargoColaborador::find($request->colaborador);

        return view('colaboradores.grade', compact('colaborador'));
    }

    public function gradeUpdate(Request $request)
    {
        $request->validate([
            'nota_desempenho' => 'required|integer|min:0|max:10',
        ]);

        $colaborador = Colaborador::find($request->colaborador_id);

        $cargoColaborador = $colaborador->cargoColaborador;

        $cargoColaborador->nota_desempenho = $request->nota_desempenho;
        $cargoColaborador->save();

        return redirect()->route('colaboradores.index')->with('success', 'Nota atualizada com sucesso!');
    }

    public function ranking()
    {
        $colaboradores = Colaborador::join('cargo_colaborador', 'colaboradores.id', '=', 'cargo_colaborador.colaborador_id')
            ->join('cargos', 'cargo_colaborador.cargo_id', '=', 'cargos.id')
            ->join('unidades', 'colaboradores.unidade_id', '=', 'unidades.id')
            ->select('colaboradores.*', 'cargo_colaborador.nota_desempenho', 'cargos.cargo as nome_cargo', 'unidades.nome_fantasia as nome_unidade')
            ->latest('cargo_colaborador.nota_desempenho')
            ->paginate(10);

        return view('colaboradores.ranking', compact('colaboradores'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
