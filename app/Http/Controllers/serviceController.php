<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Devision;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $services = Devision::select()->join('services', 'devisions.id', '=', 'services.division_id')
            ->select('services.titre', 'services.id', 'devisions.nomD')
            ->get();
        return view('servicess.index')->with(['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Devisions = Devision::all();
        return view('servicess.create', compact('Devisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['titre'] = $request->d_titre;
        $data['division_id'] = $request->d_divis;


        Service::create($data);
        return redirect()->route("servicess.index")->with([
            "success" => "service ajouté avec succès"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::select()->find($id);
        $Devisions = Devision::all();
        return view('servicess.edit')->with(['service' => $service, 'Devisions' => $Devisions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //
        $dataU['titre'] = $request->d_titre;
        $dataU['division_id'] = $request->d_divis;
        $dataU['updated_at'] = date('Y-m-d H:m:s');
        Service::where(['id' => $id])->update($dataU);
        return redirect()->route('servicess.index')->with([
            "success" => "service modifier avec succés"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Service::where(['id' => $id])->delete();;
        return redirect()->route("servicess.index")->with([
            "success" => "service Supprimé avec succès"
        ]);
    }
}
