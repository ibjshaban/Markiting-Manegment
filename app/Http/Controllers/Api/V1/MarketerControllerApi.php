<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Marketer;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\MarketerControllerRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class MarketerControllerApi extends Controller{
	protected $selectColumns = [
		"id",
		"name_ar",
		"name_en",
		"email",
		"password",
		"mobile",
		"balance",
		"address_ar",
		"address_en",
		"photo_profile",
		"remember_token",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.32]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return [];
            }


            /**
             * Baboon Api Script By [it v 1.6.32]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$Marketer = Marketer::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$Marketer]);
            }


            /**
             * Baboon Api Script By [it v 1.6.32]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(MarketerControllerRequest $request)
    {
    	$data = $request->except("_token");
    	
              $data["user_id"] = auth()->id(); 
                $data["photo_profile"] = "";
        $Marketer = Marketer::create($data); 
               if(request()->hasFile("photo_profile")){
              $Marketer->photo_profile = it()->upload("photo_profile","marketer/".$Marketer->id);
              $Marketer->save();
              }

		  $Marketer = Marketer::with($this->arrWith())->find($Marketer->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$Marketer
        ]);
    }


            /**
             * Display the specified resource.
             * Baboon Api Script By [it v 1.6.32]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $Marketer = Marketer::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($Marketer) || empty($Marketer)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $Marketer
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.32]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new MarketerControllerRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(MarketerControllerRequest $request,$id)
            {
            	$Marketer = Marketer::find($id);
            	if(is_null($Marketer) || empty($Marketer)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              $data["user_id"] = auth()->id(); 
               if(request()->hasFile("photo_profile")){
              it()->delete($Marketer->photo_profile);
              $data["photo_profile"] = it()->upload("photo_profile","marketer/".$Marketer->id);
               }
              Marketer::where("id",$id)->update($data);

              $Marketer = Marketer::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $Marketer
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.32]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $marketer = Marketer::find($id);
            	if(is_null($marketer) || empty($marketer)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


              if(!empty($marketer->photo_profile)){
               it()->delete($marketer->photo_profile);
              }
               it()->delete("marketer",$id);

               $marketer->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $marketer = Marketer::find($id);
	            	if(is_null($marketer) || empty($marketer)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	if(!empty($marketer->photo_profile)){
                    	it()->delete($marketer->photo_profile);
                    	}
                    	it()->delete("marketer",$id);
                    	$marketer->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $marketer = Marketer::find($data);
	            	if(is_null($marketer) || empty($marketer)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	if(!empty($marketer->photo_profile)){
                    	it()->delete($marketer->photo_profile);
                    	}
                    	it()->delete("marketer",$data);

                    $marketer->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}