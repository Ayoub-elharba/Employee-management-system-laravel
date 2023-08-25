<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\Devision;
use App\Models\Employe;
use App\Models\Service;
use Illuminate\Http\Request;

class CongeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = Employe::select()->join('conges', 'employes.id', '=', 'conges.employID')
            ->select('employes.nomComplet',  'conges.id', 'employes.cin', 'employes.phone', 'employes.city', 'conges.droitConge', 'conges.duree', 'conges.dataDepart', 'conges.employID')
            ->get();
        return view('conges.index')->with(['employes' => $employes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employes = Employe::all();
        return view('conges.create', compact('employes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['employID'] = $request->Idemploye;
        $data['droitConge'] = $request->droitConge;
        $data['duree'] = $request->duree;
        $data['dataDepart'] = $request->dataDepart;
        Conge::create($data);
        return redirect()->route("conges.index")->with([
            "success" => "conge ajouté avec succès"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $employe = Departement::select()->join('employes', 'departements.id', '=', 'employes.Idepartment')
        //     ->select('employes.nomComplet', 'employes.id', 'employes.cin', 'employes.hire_date', 'employes.phone', 'employes.address', 'employes.city', 'departements.titre')
        //     ->join('departements', 'devisions.id', '=', 'departements.division_id')
        //     ->select('departements.titre', 'departements.id', 'devisions.nomD')
        //     ->find($id);
        // return view('employes.show')->with(['employe' => $employe]);
        //

        // $idservice = Employe::select()->find($id);
        // $services = Service::select()->find($idservice->Idservice);
        // $divisions = Devision::select('nomD')->find($services->division_id);

        // $employe = Employe::where('id', $id)->first();
        // return view("employes.show")->with([
        //     "employe" => $employe,
        //     "services" => $services,
        //     "divisions" => $divisions
        // ]);
        $employes = Employe::select()->join('conges', 'employes.id', '=', 'conges.employID')
            ->select('employes.nomComplet', 'employes.Idservice', 'employes.id', 'employes.cin', 'employes.phone', 'employes.city', 'conges.droitConge', 'conges.duree', 'conges.dataDepart', 'conges.employID')
            ->find($id);
        $idservice = $employes->Idservice;
        $services = Service::select()->find($idservice);
        $divisions = Devision::select('nomD')->find($services->division_id);

        $employe = Employe::where('id', $id)->first();
        return view("employes.show")->with([
            "employe" => $employe,
            "services" => $services,
            "divisions" => $divisions
        ]);
        // return view('conges.show')->with(['employe' => $employes]);


        // $idservice = Conge::select()->find($employID);
        // $idemploye = Employe::select()->find($idservice->employID);
        // $services = Service::select()->find($idservice->employID);
        // $divisions = Devision::select('nomD')->find($services->division_id);

        // $employe = Conge::where('id', $employID)->first();
        // return view("conges.show")->with([
        //     'employeID' => $idemploye,
        //     "employe" => $employe,
        //     "services" => $services,
        //     "divisions" => $divisions
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $employe = Conge::find($id);
        $employee = Employe::select()->find($employe->employID);
        return view('conges.edit', ['employe' => $employe], ['employee' => $employee]);
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
        $data['employID'] = $request->Idemploye;
        $data['droitConge'] = $request->droitConge;
        $data['duree'] = $request->duree;
        $data['dataDepart'] = $request->dataDepart;
        Conge::where(['id' => $id])->update($data);
        return redirect()->route('conges.index')->with([
            "success" => "conge modifie avec succès"
        ]);
    }

    /**
     * Display the specified resource.
     *


     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
