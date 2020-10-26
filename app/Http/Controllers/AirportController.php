<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    public function index()
    {
        $data = Airport::all();
        return view('airports.index', compact('data'));
    }

    public function create()
    {
        return view('airports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:airlines',
        ],[
            'name.required' => 'نام ایرلاین نباید خالی باشد',
            'name.unique' => 'نام ایرلاین تکراری است'
        ]);

        Airport::create([
            'name' => $request->name,
        ]);

        return redirect()->route('airports.index')->with(['success' => 'ایرلاین با موفقیت ایجاد شد']);
    }

    public function show($id)
    {
        $data = Airport::FindOrFail($id);
        return view('airports.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Airport::findOrFail($id);
        return view('airports.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:airlines,name,'.$id,
        ],[
            'name.required' => 'نام ایرلاین نباید خالی باشد',
            'name.unique' => 'نام ایرلاین تکراری است'
        ]);

        $data = Airport::findOrFail($id);

        $data->update([
            'name' => $request->name
        ]);

        return redirect()->route('airports.index')->with(['success' => 'ایرلاین با موفقیت ویرایش شد']);
    }

    public function destroy($id)
    {
        $data = Airport::findOrFail($id);
        $data->delete();
        return redirect()->route('airports.index')->with(['success' => 'ایرلاین با موفقیت حذف شد']);
    }
}
