<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pigs;
use PDF;
use DB;

class PigsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pigs=Pigs::all();
        return view('pig')->with('pigs', $pigs);
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
            'name'=>'required',
            'litter_size'=>'required',
            'birth_weight'=>'required',
            'live'=>'required',
            'weaning_weight'=>'required',
        ]);

        $pigs=new Pigs;

        $pigs->name=  $request->input('name');
        $pigs->litter_size= $request->input('litter_size');
        $pigs->birth_weight=$request->input('birth_weight');
        $pigs->live=$request->input('live');
        $pigs->weaning_weight=$request->input('weaning_weight');

        $pigs->save();
         return redirect('/pigs')->with('success', 'Record Saved');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id=1)
    {
         $pigs=DB::table('pigs')-> where('id',$id);
        return view('pigview')->with('pigs', $pigs);

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
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'litter_size'=>'required',
            'birth_weight'=>'required',
            'live'=>'required',
            'weaning_weight'=>'required',
        ]);

        $pigs=Pigs::find($id);

        $pigs->name=  $request->input('name');
        $pigs->litter_size= $request->input('litter_size');
        $pigs->birth_weight=$request->input('birth_weight');
        $pigs->live=$request->input('live');
        $pigs->weaning_weight=$request->input('weaning_weight');

        $pigs->save();
         return redirect('/pigs')->with('success', 'Record Updated');
    }
      
      //download pdf

      public function downloadPDF() {
        $pigs= Pigs::all();
        //return view('pig', compact('pigs'));

        // share data to view
       view()->share('pigs',$pigs);
        //$pdf = PDF::loadView('stock_report', compact('stockdata'));
        $pdf = PDF::loadView('pigs_report', compact('pigs'));
        return $pdf->download('pigs.pdf');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete record
        $pigs=Pigs::find($id);
        $pigs->delete();
        return redirect('/pigs')->with('success', 'Record Deleted');
    }
    
}
