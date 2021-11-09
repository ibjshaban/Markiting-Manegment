<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Transaction;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\TransactionRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class TransactionControllerApi extends Controller{
	protected $selectColumns = [
		"id",
		"transaction_number",
		"amount",
		"photo",
		"marketer_id",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.32]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return ['marketer_id',];
            }


            /**
             * Baboon Api Script By [it v 1.6.32]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$Transaction = Transaction::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$Transaction]);
            }


            /**
             * Baboon Api Script By [it v 1.6.32]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(TransactionRequest $request)
    {
    	$data = $request->except("_token");

              $data["user_id"] = auth()->id();
                $data["photo"] = "";
        $Transaction = Transaction::create($data);
               if(request()->hasFile("photo")){
              $Transaction->photo = it()->upload("photo","transaction/".$Transaction->id);
              $Transaction->save();
              }

		  $Transaction = Transaction::with($this->arrWith())->find($Transaction->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$Transaction
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
                $Transaction = Transaction::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($Transaction) || empty($Transaction)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $Transaction
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.32]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new TransactionRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(TransactionRequest $request,$id)
            {
            	$Transaction = Transaction::find($id);
            	if(is_null($Transaction) || empty($Transaction)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();

              $data["user_id"] = auth()->id();
               if(request()->hasFile("photo")){
              it()->delete($Transaction->photo);
              $data["photo"] = it()->upload("photo","transaction/".$Transaction->id);
               }
              Transaction::where("id",$id)->update($data);

              $Transaction = Transaction::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $Transaction
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.32]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $transaction = Transaction::find($id);
            	if(is_null($transaction) || empty($transaction)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


              if(!empty($transaction->photo)){
               it()->delete($transaction->photo);
              }
               it()->delete("transaction",$id);

               $transaction->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $transaction = Transaction::find($id);
	            	if(is_null($transaction) || empty($transaction)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	if(!empty($transaction->photo)){
                    	it()->delete($transaction->photo);
                    	}
                    	it()->delete("transaction",$id);
                    	$transaction->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $transaction = Transaction::find($data);
	            	if(is_null($transaction) || empty($transaction)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	if(!empty($transaction->photo)){
                    	it()->delete($transaction->photo);
                    	}
                    	it()->delete("transaction",$data);

                    $transaction->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }


}
