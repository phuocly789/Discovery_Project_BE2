<?php

namespace App\Http\Controllers;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AddLocationController extends Controller
{
    public function store(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'location_name' => 'required|string|max:255',
            'location_image' => 'required',
        ]);

        $get_imgae = $request->location_image;
        $path = 'img/';
        $get_name_image = $get_imgae->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 999) . '.' . $get_imgae->getClientOriginalExtension();
        $get_imgae->move($path, $new_image);

         // Create a new tour instance
         $location = new Location;
         $location->location_name = $validatedData['location_name'];
         $location->location_image = $new_image;

        $location->save();
        return redirect()->back()->with('success','Thêm location thành côngg!!!');
    }


    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $path = 'img/';
            if(File::exists(public_path($path . $location->location_image))) {
                File::delete(public_path($path . $location->location_image));
            }
        $location->delete();

        return redirect()->back()->with('success', 'Location đã được xóa thành công!');
    }

    // edit tour
    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('admin.editLocation', compact('location'));
    }

    public function showCrudLocation() {
        $location = Location::orderByDesc('location_id')->get();

        // Lấy các tour yêu thích của người dùng hiện tại
        // $favoriteTours = FavoriteTour::where('user_id', $user_main->id)->get();

        return view('admin.location-crud', [
            'data_location' => $location,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'location_name' => 'required|string|max:255',
        ]);

        $location = Location::findOrFail($id);
        $get_imgae = $request->location_image;

        if($get_imgae) {
            $path = 'img/';
            if(File::exists(public_path($path . $location->location_image))) {
                File::delete(public_path($path . $location->location_image));
            }
        $get_name_image = $get_imgae->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 999) . '.' . $get_imgae->getClientOriginalExtension();
        $get_imgae->move($path, $new_image);
        $location->location_image = $new_image;
        }
        else {
            $location->location_image = $location->location_image;
        }

        $location->location_name = $validatedData['location_name'];
        $location->save();

        return redirect()->route('admin.location-crud')->with('success', 'Location đã được cập nhật thành công!');
    }
}
