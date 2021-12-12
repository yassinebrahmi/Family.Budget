<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $budget = Budget::all();
        return response()->json( $budget, 200);
    }

    public function sumbudgets()
    {
        $budget = Budget::get()->sum('amount');
        return response()->json( $budget, 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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


        $budget = Budget::create([
            'title' => $request->input('title'),
            'amount' => $request->input('amount'),
            'category' => $request->input('category')
        ]);

        return response()->json(['budget' => "Budget Created Successfully"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $budget = Budget::find($id);

        return response()->json( $budget, 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $budget = Budget::find($id);

        return response()->json( $budget, 200);
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
        $budget1 = new Budget();

        $budget = $budget1->find($id);
      //  $budget->update($request->all());

        $budget->title = $request->get('title');
            $budget->amount = $request->get('amount');
            $budget->category = $request->get('category');
             $budget->save();

        return response()->json(['budget' => "Budget Updated Successfully"], 200);
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
