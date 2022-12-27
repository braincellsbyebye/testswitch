<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flask;
use Illuminate\Support\Facades\File;

class FlaskController extends Controller
{
    public function index()
    {
        $af = Flask::all();
        return view('flask.index', compact('af'));
    }
    public function create()
    {
        return view('flask.create');
    }
    public function store(Request $request)
    {
        $af = new Flask;
        $af->name = $request->input('name');
        $af->oz = $request->input('oz');
        $af->price = $request->input('price');
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/aquaflasks/', $filename);
            $af->image = $filename;
        }
        $af->save();
        return redirect('/flasks');
        
    }
    public function edit($id)
    {
        $af = Flask::find($id);
        return view('flask.edit', compact('af'));
    }
    public function update(Request $request, $id)
    {
        $af = Flask::find($id);
        $af->name = $request->input('name');
        $af->oz = $request->input('oz');
        $af->price = $request->input('price');
        if($request->hasFile('image'))
        {
            $destination = 'uploads/aquaflasks/'.$af->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/aquaflasks/', $filename);
            $af->image = $filename;
        }
        $af->update();
        return redirect('/flasks');

    }
    public function destroy($id)
    {
        $af = Flask::find($id);
        $destination = 'uploads/aquaflasks/'.$af->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $af->delete();
        return redirect()->back()->with('message','AquaFlask Deleted Successfully');
    }
    public function search()
    {
        $stxt = $_GET['query'];
        $af = Flask::where('name', 'LIKE', '%'.$stxt.'%')->get();

        return view('flask.search', compact('af'));
    }
}
