<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        
        $search = trim($request->get('search'));
        $people = DB::table('people')
                        ->select('dni', 'name', 'birthdate', 'address', 'phone')
                        ->where('name', 'LIKE', '%'.$search.'%')
                        ->orWhere('dni', 'LIKE', '%'.$search.'%')
                        ->paginate(10);
        return view('table', compact('people', 'search', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $person = new Person;
        $person->dni = $request->input('dni');
        $person->name = $request->input('name');
        $person->birthdate = $request->input('birthdate');
        $person->address = $request->input('address');
        $person->phone = $request->input('phone');
        $person->save();
        return redirect()->route('people.index');
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
        $person = Person::findOrFail($id);
        return view('edit', compact('person'));
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
        $person = Person::findOrFail($id);
        $person->name = $request->input('name');
        $person->birthdate = $request->input('birthdate');
        $person->address = $request->input('address');
        $person->phone = $request->input('phone');
        $person->save();
        return redirect()->route('people.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Person::findOrFail($id);
        $person->delete();
        return redirect()->route('people.index');
    }
}
