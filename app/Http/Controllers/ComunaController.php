<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comuna;
Use Illuminate\Support\Facades\DB;

class ComunaController extends Controller
{
    
    public function index()
    {
        $comunas = Comuna::all();
        $comunas = DB::table ('tb_comuna')
        ->join('tb_municipio', 'tb_comuna.muni_codi','=','tb_municipio.muni_codi')
        ->select('tb_comuna.*',"tb_municipio.muni_nomb")
        ->get();
        return view('comuna.index', ['comunas' => $comunas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $municipios = DB::table('tb_municipio')
        ->orderBy('muni_nomb')
        ->get();
        return view('comuna.new', ['municipios' => $municipios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comuna = new Comuna();
        $comuna->comu_nomb = $request->name;
        $comuna->muni_codi = $request->code;
        $comuna->save();

        $comunas = DB::table ('tb_comuna')
        ->join('tb_municipio', 'tb_comuna.muni_codi', "=", 'tb_municipio.muni_codi')
        ->select('tb_comuna.*', "tb_municipio.muni_nomb")
        ->get();
    return view ('comuna.index', ['comunas' => $comunas]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
        $comuna = Comuna::find($id);
        $municipios = DB::table('tb_municipio')
            ->orderBy('muni_nomb')
            ->get();
    
        return view('comuna.edit', ['comuna' => $comuna, 'municipios' => $municipios]);
    }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    public function update(Request $request, string $id)
    {
        $comuna = Comuna::find($id);

        $comuna->comu_nomb = $request->name;
        $comuna->muni_codi = $request->code;
        $comuna->save();
    
        $comunas = DB::table('tb_comuna')
            ->join('tb_municipio', 'tb_comuna.muni_codi', '=', 'tb_municipio.muni_codi')
            ->select('tb_comuna.*', 'tb_municipio.muni_nomb')
            ->get();
    
        return view('comuna.index', ['comunas' => $comunas]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comuna = Comuna::find($id);
        $comuna->delete();

        $comunas = DB::table('tb_comuna')
        ->join('tb_municipio', 'tb_comuna.muni_codi', '=', 'tb_municipio.muni_codi')
        ->select('tb_comuna.*', 'tb_municipio.muni_nomb')
        ->get();

        return view('comuna.index', ['comunas' => $comunas]);
    }
}
