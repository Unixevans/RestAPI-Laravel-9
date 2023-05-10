<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DatamodulResources;
use App\Models\Datamodul;
use Illuminate\Http\Request;
use Validator;

class DatamodulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datamodul = Datamodul::all();

        return new DatamodulResources(true, 'Data Datamodul !', $datamodul);
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ringno' => 'required|unique:datamoduls,ringno',
            'la' => 'required',
            'lo' => 'required',
            'backtime' => 'required',
            'clubno' => 'required|unique:datamoduls,ringno',
            'raceno' => 'required|unique:datamoduls,ringno',
            'deviceno' => 'required|unique:datamoduls,ringno'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $datamodul = Datamodul::create([
                'ringno' => $request->ringno,
                'la' => $request->la,
                'lo' => $request->lo,
                'backtime' => $request->backtime,
                'clubno' => $request->clubno,
                'raceno' => $request->raceno,
                'deviceno' => $request->deviceno,
            ]);

            return new DatamodulResources(true, 'Data Berhasil Tersimpan !', $datamodul);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $datamodul = Datamodul::find($id);

        if ($datamodul) {
            return new DatamodulResources(true, 'Data Ditemukan !', $datamodul);
        } else {
            return response()->json([
                'message' => 'Data Not Found !'

            ], 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'ringno' => 'required|unique:datamoduls,ringno',
            'la' => 'required',
            'lo' => 'required',
            'backtime' => 'required',
            'clubno' => 'required|unique:datamoduls,ringno',
            'raceno' => 'required|unique:datamoduls,ringno',
            'deviceno' => 'required|unique:datamoduls,ringno'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $datamodul = Datamodul::find($id);

            if ($datamodul) {
                $datamodul->ringno = $request->ringno;
                $datamodul->la = $request->la;
                $datamodul->lo = $request->lo;
                $datamodul->backtime = $request->backtime;
                $datamodul->clubno = $request->clubno;
                $datamodul->raceno = $request->raceno;
                $datamodul->deviceno = $request->deviceno;
                $datamodul->save();

                return new DatamodulResources(true, 'Data Berhasil Di Update !', $datamodul);
            } else {
                return response()->json([
                    'message' => 'Data Not Found !'
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datamodul = Datamodul::find($id);

        if ($datamodul) {
            $datamodul->delete();

            return new DatamodulResources(true, 'Data Berhasil Di Hapus !', '');
        } else {
            return response()->json([
                'message' => 'Data Not Found !'
            ]);
        }
    }
}