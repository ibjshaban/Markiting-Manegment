<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Advertisement;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\AdvertisementRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class AdvertisementControllerApi extends Controller{
	protected $selectColumns = [
		"id",
		"title",
		"description",
		"photos",
		"videos",
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
            	$Advertisement = Advertisement::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$Advertisement]);
            }


            /**
             * Baboon Api Script By [it v 1.6.32]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(AdvertisementRequest $request)
    {
    	$data = $request->except("_token");

              $data["user_id"] = auth()->id();
                $data["photos"] = "";
                $data["videos"] = "";
        $Advertisement = Advertisement::create($data);
               if(request()->hasFile("photos")){
              $Advertisement->photos = it()->upload("photos","advertisement/".$Advertisement->id);
              $Advertisement->save();
              }
               if(request()->hasFile("videos")){
              $Advertisement->videos = it()->upload("videos","advertisement/".$Advertisement->id);
              $Advertisement->save();
              }

		  $Advertisement = Advertisement::with($this->arrWith())->find($Advertisement->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$Advertisement
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
                $Advertisement = Advertisement::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($Advertisement) || empty($Advertisement)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $Advertisement
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.32]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new AdvertisementRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(AdvertisementRequest $request,$id)
            {
            	$Advertisement = Advertisement::find($id);
            	if(is_null($Advertisement) || empty($Advertisement)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();

              $data["user_id"] = auth()->id();
               if(request()->hasFile("photos")){
              it()->delete($Advertisement->photos);
              $data["photos"] = it()->upload("photos","advertisement/".$Advertisement->id);
               }
               if(request()->hasFile("videos")){
              it()->delete($Advertisement->videos);
              $data["videos"] = it()->upload("videos","advertisement/".$Advertisement->id);
               }
              Advertisement::where("id",$id)->update($data);

              $Advertisement = Advertisement::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $Advertisement
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.32]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $advertisement = Advertisement::find($id);
            	if(is_null($advertisement) || empty($advertisement)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


              if(!empty($advertisement->photos)){
               it()->delete($advertisement->photos);
              }
              if(!empty($advertisement->videos)){
               it()->delete($advertisement->videos);
              }
               it()->delete("advertisement",$id);

               $advertisement->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $advertisement = Advertisement::find($id);
	            	if(is_null($advertisement) || empty($advertisement)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	if(!empty($advertisement->photos)){
                    	it()->delete($advertisement->photos);
                    	}
                    	if(!empty($advertisement->videos)){
                    	it()->delete($advertisement->videos);
                    	}
                    	it()->delete("advertisement",$id);
                    	$advertisement->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $advertisement = Advertisement::find($data);
	            	if(is_null($advertisement) || empty($advertisement)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	if(!empty($advertisement->photos)){
                    	it()->delete($advertisement->photos);
                    	}
                    	if(!empty($advertisement->videos)){
                    	it()->delete($advertisement->videos);
                    	}
                    	it()->delete("advertisement",$data);

                    $advertisement->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }


}
