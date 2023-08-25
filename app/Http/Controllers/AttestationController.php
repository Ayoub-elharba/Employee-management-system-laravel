<?php

namespace App\Http\Controllers;

use App\Models\Attestation;
use App\Models\Devision;
use App\Models\Employe;
use App\Models\Service;
use Illuminate\Http\Request;

class AttestationController extends Controller
{
    public function index()
    {
        $employes = Employe::select()->join('attestations', 'employes.id', '=', 'attestations.employID')
            ->select('employes.nomComplet',  'attestations.id', 'employes.cin', 'employes.phone', 'employes.city', 'attestations.employID')
            ->get();
        return view('attestations.index')->with(['employes' => $employes]);
    }

    public function create()
    {
        $employes = Employe::all();
        return view('attestations.create', compact('employes'));
    }



    public function show($id)
    {

        $employes = Employe::select()->join('attestations', 'employes.id', '=', 'attestations.employID')
            ->select('employes.nomComplet', 'employes.Idservice', 'employes.id', 'employes.cin', 'employes.phone', 'employes.city',  'attestations.employID')
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
        Attestation::create($data);
        return redirect()->route("attestations.index")->with([
            "success" => "conge ajouté avec succès"
        ]);
    }

    public function destroy($id)
    {
        //
        Attestation::where(['id' => $id])->delete();;
        return redirect()->route("attestations.index")->with([
            "success" => "attestation Supprimé avec succès"
        ]);
    }
}
