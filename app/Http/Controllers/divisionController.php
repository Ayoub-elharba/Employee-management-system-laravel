<?php

namespace App\Http\Controllers;

use App\Models\Devision;
use Illuminate\Http\Request;

class divisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $divisions = Devision::select()->get();
        return view('divisions.index')->with(['divisions' => $divisions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('divisions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nomD' => 'required',
        ]);
        $data = $request->except(['_token']);
        Devision::create($data);
        return redirect()->route("divisions.index")->with([
            "success" => "divisions ajouté avec succès"
        ]);
    }

    /**
     * Display the specified resource.

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $division = Devision::select('*')->find($id);
        return view('divisions.edit', ['division' => $division]);
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
        $dataU['nomD'] = $request->d_nomD;
        $dataU['updated_at'] = date('Y-m-d H:m:s');
        Devision::where(['id' => $id])->update($dataU);
        return redirect()->route('divisions.index')->with([
            "success" => "division modifie avec succès"
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
        Devision::where(['id' => $id])->delete();
        return redirect()->route("divisions.index")->with([
            "success" => "division Supprimé avec succès"
        ]);
    }
}
