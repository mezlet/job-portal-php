<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Gigs as GigModel;
use Illuminate\Http\Request;
use App\Utils\Validation;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;

class GigsController extends BaseController {


    public function __construct() {
        $this->validate = new Validation();
    }

    /**
     * Create Gig
     * @param object $_REQUEST
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request) {
        $this->validate->addGig($request->all()); 
        try{
        $gig = GigModel::create($request->all());

        if($gig){
             return response()->json([
                "success" => true, 
                "data" => $gig, 
                "message" => 'Comment created successfully.'
            ], 201);
            }
            
    }
    catch(\Exception $e){
        return $e->getMessage();
        return response()->json(["success"=>false, "error"=>'Something went wrong'],500);
    }
    }

    /**
     * Get All Gigs
     * @param object $_REQUEST
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll(Request $request) {
        try{
            $gig = DB::table('gigs')->where([
                ['tags', 'like', 'design%'],
            ])->get();

            if($gig){
                return response()->json([
                    "success" => true, 
                    "data" => $gig
                ], 200);
            }
            
    }
    catch(\Exception $e){
        return response()->json(["success"=>false, "error"=>'Something went wrong'],500);
    }
    }

    /**
     * Delete Gigs
     * @param object $_REQUEST
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id) {
        try{
            $gig = GigModel::where('id', $id)->get();
            if(count($gig) < 1) {
                return response()->json([
                    "success" => false, 
                    "message" => 'Gig not found.'
                ], 404);
            }
    
            $delete = GigModel::where('id', $id)->delete();    
                 return response()->json([
                    "success" => true, 
                    "message" => 'deleted '. $delete.' item.'
                ], 200);
            
    }
    catch(\Exception $e){
        return response()->json(["success"=>false, "error"=>'Something went wrong'], 500);
    }
    }
}