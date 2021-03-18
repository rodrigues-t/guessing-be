<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\User;
use App\Models\SearchTerm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Result::select(['score', 'created_at', 'users.name as nameUser', 'search_terms.term as searchTerm'])
            ->join('users', 'users.id', 'results.users_id')
            ->join('search_terms', 'search_terms.id', 'results.search_terms_id')
            ->orderBy('score', 'DESC')
            ->orderBy('nameUser', 'ASC')
            ->orderBy('searchTerm', 'ASC')
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'score' => 'required|integer|between:0,5',
            'user.name' => 'required|between:2,32',
            'searchTerm.term' => 'required|between:1,64',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 500 );
        }
        
        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->input('user.name')
            ]);
            $searchTerm = SearchTerm::firstOrCreate([
                'term' => strtolower($request->input('searchTerm.term'))
            ]);

            $result = Result::create([
                'score' => $request->input('score'),
                'users_id' => $user->id,
                'search_terms_id' => $searchTerm->id
            ]);

            DB::commit();
            return $result;
        }catch (\Exception $e) {
            return ['error' => ["unknown" => [$e->getMessage()]]];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}
