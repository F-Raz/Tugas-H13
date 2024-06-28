<?php

namespace App\Http\Controllers;

use App\Models\cast;
use Illuminate\Http\Request;

class castController extends Controller
{
    public function showCast(){
        $data = cast::all();
        return view('castList', compact('data'));
    }

    public function edit(cast $cast){
        return view('menu/edit', compact('cast'));
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'bio' => 'required',
            'umur' => 'required'
        ]);

        $data = $request->all();
        cast::create($data);
        return redirect('/castList');
    }

    public function delete(cast $cast){
        cast::destroy($cast->id);
        return redirect('/castList');
    }

    public function update(Request $request, cast $cast){
        $request->validate([
            'nama' => 'required',
            'bio' => 'required',
            'umur' => 'required'
        ]);

        $new = $request->all();
        $old = cast::findOrFail($cast->id);
        $old->update($new);
        return redirect('/castList');
    }
}