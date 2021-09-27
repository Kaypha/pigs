<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stocks;
use DB;
use PDF;

class StockController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       
    
        $stocks=Stocks::all();
        return view('stock')->with('stocks', $stocks);
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
        $this->validate($request,[
            'feed_name'=>'required',
            'amount'=>'required',
            'date'=>'required',
           
        ]);

        $stocks=new Stocks;

        $stocks->feed_name=  $request->input('feed_name');
        $stocks->amount= $request->input('amount');
        $stocks->date=$request->input('date');
    

        $stocks->save();
         //return redirect('/stock')->with('success', 'Record Saved');
    }


   // Generate PDF
      public function downloadPDF() {
        $stocks = Stocks::all();
        //return view('stock', compact('stocks'));

        // share data to view
       view()->share('stocks',$stocks);
        //$pdf = PDF::loadView('stock_report', compact('stockdata'));
        $pdf = PDF::loadView('stock', compact('stocks'));
        return $pdf->download('stocks.pdf');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request)
    {
        
        $stocks=new Stocks;

        $stocks->id = $request->input('id');
        $stocks->feed_name=  $request->input('feed_name');
        $stocks->amount= $request->input('amount');
        $stocks->date=$request->input('date');
    
          
        $stocks->save();

         //return view('stockupdate')->with('stocks', $stocks);*/
    }

    public function countDecrement(Request $request, $id)
    {

        $id = Stocks::latest()->first()->id;

        $amount=DB::table('stocks')-> where('id',$id)->decrement('amount',5);
          $stocks=Stocks::all();
        return view('stockupdate')->with('stocks', $stocks);
        
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
