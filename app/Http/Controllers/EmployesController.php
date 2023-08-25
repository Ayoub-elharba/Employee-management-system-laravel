<?php

namespace App\Http\Controllers;

use App\Models\Devision;
use App\Models\Service;
use App\Models\Employe;
use Illuminate\Http\Request;

class EmployesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $employes = Service::select()->join('employes', 'services.id', '=', 'employes.Idservice')
            ->select('employes.nomComplet', 'employes.hire_date', 'employes.cin', 'employes.id', 'services.titre', 'services.division_id')
            ->get();
        return view('employes.index')->with(['employes' => $employes]);
        //
        // $employes = Employe::all();
        // return view('employes.index')->with([
        //     'employes' => $employes
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $services = Devision::select()->join('services', 'devisions.id', '=', 'services.division_id')
        //     ->select('services.titre', 'services.division_id', 'devisions.nomD')
        //     ->get();
        //
        $services = Service::all();

        return view('employes.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //     $data['nomComplet'] = $request->nomComplet;
        //     $data['cin'] = $request->cin;
        //     $data['hire_date'] = $request->hire_date;
        //     $data['city'] = $request->city;
        //     $data['phone'] = $request->phone;
        //     $data['address'] = $request->address;
        //     $data['Idservice'] = $request->Idservice;

        // Departement::create($data);
        // return redirect()->route("departements.index")->with([
        //     "success" => "departements added successfully"
        // ]);
        //
        $this->validate($request, [
            'nomComplet' => 'required',
            'cin' => 'required',
            'hire_date' => 'required',
            'city' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'Idservice' => 'required',
        ]);
        $data = $request->except(['_token']);
        Employe::create($data);
        return redirect()->route("employes.index")->with([
            "success" => "Employe ajouté avec succès"
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
        $idservice = Employe::select()->find($id);
        $services = Service::select()->find($idservice->Idservice);
        $divisions = Devision::select('nomD')->find($services->division_id);

        $employe = Employe::where('id', $id)->first();
        return view("employes.show")->with([
            "employe" => $employe,
            "services" => $services,
            "divisions" => $divisions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //

        $services = Service::all();
        $employe = Employe::where('id', $id)->first();
        $employee = Service::select('titre', 'id')->find($employe->Idservice);
        return view("employes.edit")->with([
            "employe" => $employe,
            "services" => $services,
            "employee" => $employee

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $employe = Employe::where('id', $id)->first();
        $this->validate($request, [
            'nomComplet' => 'required',
            'hire_date' => 'required',
            'cin' => 'required',
            'city' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'Idservice' => 'required'
        ]);
        $data = $request->except(['_token', '_method']);
        $employe->update($data);
        return redirect()->route("employes.index")->with([
            "success" => "Employe modifier avec succés"
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
        $employe = Employe::where('id', $id)->first();
        $employe->delete();
        return redirect()->route("employes.index")->with([
            "success" => "Employe Supprimé avec succès"
        ]);
    }

    public function getWorkCertificate($id)
    {
        $employe = Employe::where('id', $id)->first();
        return view("conges.certificate")->with([
            "employe" => $employe
        ]);
    }

    public function vacationRequest($id)
    {
        $employe = Employe::where('id', $id)->first();
        return view("employes.vacation")->with([
            "employe" => $employe
        ]);
    }
}
