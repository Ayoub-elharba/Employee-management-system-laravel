<?php

namespace App\Http\Controllers;

use App\Models\Devision;
use App\Models\Employe;
use App\Models\Service;
use Illuminate\Http\Request;

class VacancController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {


        $employes = Employe::select()->join('conges', 'employes.id', '=', 'conges.employID')
            ->select('employes.nomComplet', 'employes.Idservice', 'employes.id', 'employes.cin', 'employes.phone', 'employes.city', 'conges.droitConge', 'conges.duree', 'conges.dataDepart', 'conges.created_at', 'conges.employID')
            ->find($id);
        $idservice = $employes->Idservice;
        $services = Service::select()->find($idservice);
        $divisions = Devision::select('nomD')->find($services->division_id);

        // $employe = Employe::where('id', $id)->first();
        return view('conges.vacation')->with([
            "employe" => $employes,
            "services" => $services,
            "divisions" => $divisions
        ]);
    }

    public function show($id)
    {


        $employes = Employe::select()->join('attestations', 'employes.id', '=', 'attestations.employID')
            ->select('employes.nomComplet', 'employes.Idservice', 'employes.id', 'employes.cin', 'employes.phone', 'employes.city', 'employes.hire_date', 'attestations.employID')
            ->find($id);
        $idservice = $employes->Idservice;
        $services = Service::select()->find($idservice);
        $divisions = Devision::select('nomD')->find($services->division_id);

        // $employe = Employe::where('id', $id)->first();
        return view('attestations.certificate')->with([
            "employe" => $employes,
            "services" => $services,
            "divisions" => $divisions
        ]);
    }
}
