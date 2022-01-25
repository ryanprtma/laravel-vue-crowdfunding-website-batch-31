<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;

class CampaignController extends Controller
{
    public function random($count){
        $campaigns = Campaign::select('*')
                ->inRandomOrder()
                ->limit($count)
                ->get();

        $data['campaigns'] = $campaigns;

        return response()->json([
            'response_code' => '00',
            'response_message' => 'data campaign berhasil ditampilkan',
            'data' => $data
        ], 200);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'required' => 'required'
        ]);

        $campaign = Campaign::create([
            'title' => $request->title,
            'description' => $request->description,
            'required' => $request->required
        ]);

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $image_extension = $image->getClientOriginalExtension();
            $image_name = $campaign->id .".". $image_extension;
            $image_folder = '/photos/campaign/';
            $image_location = $image_folder . $image_name;

            try{
                $image->move(public_path($image_folder), ($image_name));

                $campaign->update([
                    'image'=>$image_location,
                ]);
            } catch (\Exception $e){
                return response()->json([
                    'response_code' =>'01',
                    'response_message' => 'photo profile gagal upload',
                    'data' => $data
                ], 200);
            }
        }

        $data['campaigns'] = $campaign;

        return response()->json([
            'response_code' =>'00',
            'response_message' => 'data campaign berhasil ditambahkan',
            'data' => $data
        ], 200);
    }

    public function index(){
        $campaign = Campaign::paginate(6);
        $data['campaigns'] =$campaign;

        return response()->json([
            'response_code' =>'00',
            'response_message' => 'data campaign berhasil ditampilkan',
            'data' => $data
        ], 200);
    }

    public function detail($id){
        $campaign = Campaign::find($id);

        $data['campaign'] = $campaign;

        return response()->json([
            'response_code' =>'00',
            'response_message' => 'detail campaign berhasil ditampilkan',
            'data' => $data
        ], 200);
    }
}
