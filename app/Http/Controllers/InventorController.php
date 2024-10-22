<?php

namespace App\Http\Controllers;

use App\Models\inventor;
use App\Models\subinventor;
use Illuminate\Http\Request;

class InventorController extends Controller
{

    public function saveinvention(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:inventors',
            'contact' => 'required|digits:10',
            'password' => 'required|min:5',
            'pincode' => 'required',
        ]);

        $save = [
            "name" => $request->name,
            "email" => $request->email,
            "contact" => $request->contact,
            "password" => $request->password,
            "pincode" => $request->pincode,
            "image" => '',
        ];
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $save['image'] = "$profileImage";
        }
        inventor::create($save);
        return redirect('/')->with('success', 'participant create successfully');
    }

    public function InventorControllerShow(Request $request)
    {
        $inventor['data'] = inventor::get(["id", "name"]);
        return view('client.invention', $inventor);
    }

    public function saveEventData(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:subinventors',
            'password' => 'required|min:5',
            'contact' => 'required',
        ]);

         $i_id =  $request->inventors_id;
         $id_i = implode(",",$i_id);
        //  print_r($id_i); die;
        $save = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'contact' => $request->contact,
            'inventors_id' => $id_i ,
        ];
        subinventor::create($save);
        return redirect('/')->with('success', 'inventor create successfully');
    }

    public function showEventDetails(Request $request)
    {
        $getData['data'] = subinventor::with(['getinventor'])->get(["id", "name", "email", "contact", "inventors_id"]);
        // echo json_encode($getData); die();
        return view('client.showinventor', $getData);
    }

    public function edtinventor(Request $request)
    {
        // $rowdata['row'] = subinventor::with(['getinventor'])->where('id', $request->id)->first();
        $data['subinventor'] = subinventor::where('id', $request->id)->first();
        // echo json_encode($rowData); die();
        // $data['subinventor'] = subinventor::get(["id", "name", "email", "contact", "inventors_id"])->where('id', $request->id);
        $data['inventor'] = inventor::all();

        // dd($data);
        return view('client.editinventor', $data);
    }

    public function updateEventDetails(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'password' => 'required',
        ]);

        $updateData = [
            "name" => $request->name,
            "email" => $request->email,
            "contact" => $request->contact,
            "password" => $request->password,
            "inventors_id" => $request->inventors_id
        ];
        // dd($updateData);
        subinventor::where('id', $request->id)->update($updateData);
        return redirect('showEvent')->with('success', 'inventor update successfully');

    }

    function votesevnts(Request $request){
        // dd('hello');
        $data['subinventor'] = subinventor::where('id', $request->id)->first();
        $data['inventor'] = inventor::all();
        return view('client.eventvote',$data);
    }

    // function index(){
    //     return view('client.qrcode');
    // }

}
