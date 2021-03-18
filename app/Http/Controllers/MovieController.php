<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Http\MovieService;

class MovieController extends Controller
{

    private function handleGenericError($error) {
        return response()->json(['error' => $error], 500);
    }

    public function search(Request $request, $searchTerm) {
        try {
            $service = new MovieService();
            $resp = $service->search($searchTerm);
            return response()->json($resp["data"], $resp["status"]);
        }catch (\Exception $e) {
            return $this->handleGenericError($e->getMessage());
        }
    }

    public function find(Request $request, $movieId) {
        try{
            $service = new MovieService();
            $resp = $service->find($movieId);
            return response()->json($resp["data"], $resp["status"]);
        }catch (\Exception $e) {
            return $this->handleGenericError($e->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }
}
