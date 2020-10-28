<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AirlineController extends Controller
{
    public function index()
    {
        $data = Airline::all();
        return view('airline.index', compact('data'));
    }

    public function create()
    {
        return view('airline.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:airlines',
            'logo' => 'image'
        ],[
            'name.required' => 'نام ایرلاین نباید خالی باشد',
            'name.unique' => 'نام ایرلاین تکراری است'
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->logo->store('airline_logo','public');
            // TODO CROP
            $img = Image::make(storage_path("app\public\{$logo}"));
            $img->fit(50, 50);
            $img->save($logo);

        }

        Airline::create([
            'name' => $request->name,
            'logo' => $logo ?? null
        ]);

        return redirect()->route('airlines.index')->with(['success' => 'ایرلاین با موفقیت ایجاد شد']);
    }

    public function show($id)
    {
        $data = Airline::FindOrFail($id);
        return view('airline.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Airline::findOrFail($id);
        return view('airline.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:airlines,name,'.$id,
        ],[
            'name.required' => 'نام ایرلاین نباید خالی باشد',
            'name.unique' => 'نام ایرلاین تکراری است'
        ]);

        $data = Airline::findOrFail($id);

        $data->update([
            'name' => $request->name
        ]);

        return redirect()->route('airlines.index')->with(['success' => 'ایرلاین با موفقیت ویرایش شد']);
    }

    public function destroy($id)
    {
        $data = Airline::findOrFail($id);
        $data->delete();
        return redirect()->route('airlines.index')->with(['success' => 'ایرلاین با موفقیت حذف شد']);
    }

    public function downloadImage($file_name)
    {
        return Storage::download('kart_melli/'.$file_name);
    }
}
