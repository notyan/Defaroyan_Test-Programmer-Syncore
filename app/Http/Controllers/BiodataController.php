<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;
use Illuminate\Support\Facades\Auth;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $biodata = auth()->user()->biodata;
        return view('biodata.index', compact('biodata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
        ]);
    
        $biodata = new Biodata;
        $biodata->fill($validatedData);
        $biodata->user_id = Auth::id();
        $biodata->save();

        return redirect()->route('biodata.show', ['id' => $biodata->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $email = Auth::user()->email;
        $request->validate([
            'full_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ]);
    
        $biodata = new Biodata([
            'full_name' => $request->get('full_name'),
            'address' => $request->get('address'),
            'phone_number' => $request->get('phone_number'),
            'email' => $email,
        ]);
    
        $biodata->user_id = Auth::id();
        $biodata->save();
    
        return redirect('/')->with('success', 'Biodata saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $biodata = Biodata::find($id);
    
        // Check if the authenticated user owns the biodata
        if (Auth::id() !== $biodata->user_id) {
            abort(403, 'Unauthorized action.');
        }
    
        return view('biodata.show', compact('biodata'));
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

    public function showForCurrentUser()
    {
        $biodata = Biodata::find(Auth::id());

        return view('biodata.show', compact('biodata'));
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
