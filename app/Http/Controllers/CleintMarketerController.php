<?php

namespace App\Http\Controllers;

use App\DataTables\CleintMarketerDataTable;
use App\Http\Controllers\Validations\CleintControllerRequest;
use App\Models\Cleint;
use App\Models\Marketer;
use App\Notifications\NotifyNewClient;
use Illuminate\Notifications\Notification;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class CleintMarketerController extends Controller
{

    public function __construct()
    {

        /*$this->middleware('AdminRole:cleintcontroller_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:cleintcontroller_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:cleintcontroller_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:cleintcontroller_delete', [
            'only' => ['destroy', 'multi_delete'],
        ]);*/
    }


    /**
     * Baboon Script By [it v 1.6.32]
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(CleintMarketerDataTable $cleint)
    {
        return $cleint->render('admin.cleint-marketer.index', ['title' => trans('admin.cleint')]);
    }


    /**
     * Baboon Script By [it v 1.6.32]
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.cleint-marketer.create', ['title' => trans('admin.create')]);
    }

    /**
     * Baboon Script By [it v 1.6.32]
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response Or Redirect
     */
    public function store(CleintControllerRequest $request)
    {
        $data = $request->except("_token", "_method");
        $data['photo_profile'] = "";
        $data['marketer_id'] = marketer()->id();
        $data['password'] = bcrypt(request('password'));
        $data['admin_id'] = 1;
         $marketer = Marketer::find($data['marketer_id']);
        $cleint = Cleint::create($data);
        if (request()->hasFile('photo_profile')) {
            $cleint->photo_profile = it()->upload('photo_profile', 'marketer/cleint/' . $cleint->id);
            $cleint->save();
        }
        $marketer->notify(new NotifyNewClient($cleint));
        $redirect = isset($request["add_back"]) ? "/create" : "";
        return redirectWithSuccess(url('marketer/cleint' . $redirect), trans('admin.added'));
    }

    /**
     * Display the specified resource.
     * Baboon Script By [it v 1.6.32]
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cleint = Cleint::find($id);
        return is_null($cleint) || empty($cleint) ?
            backWithError(trans("admin.undefinedRecord"), url("marketer/cleint")) :
            view('admin.cleint-marketer.show', [
                'title' => trans('admin.show'),
                'cleint' => $cleint
            ]);
    }


    /**
     * Baboon Script By [it v 1.6.32]
     * edit the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cleint = Cleint::find($id);
        return is_null($cleint) || empty($cleint) ?
            backWithError(trans("admin.undefinedRecord"), url("marketer/cleint")) :
            view('admin.cleint-marketer.edit', [
                'title' => trans('admin.edit'),
                'cleint' => $cleint
            ]);
    }

    public function update(CleintControllerRequest $request, $id)
    {
        // Check Record Exists
        $cleint = Cleint::find($id);
        if (is_null($cleint) || empty($cleint)) {
            return backWithError(trans("admin.undefinedRecord"), url("marketer/cleint"));
        }
        $data = $this->updateFillableColumns();
        $data['marketer_id'] = marketer()->id();
        if (request()->hasFile('photo_profile')) {
            it()->delete($cleint->photo_profile);
            $data['photo_profile'] = it()->upload('photo_profile', 'marketer/cleint');
        }
        $data['password'] = bcrypt(request('password'));
        Cleint::where('id', $id)->update($data);
        $redirect = isset($request["save_back"]) ? "/" . $id . "/edit" : "";
        return redirectWithSuccess(url('marketer/cleint' . $redirect), trans('admin.updated'));
    }

    /**
     * Baboon Script By [it v 1.6.32]
     * update a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateFillableColumns()
    {
        $fillableCols = [];
        foreach (array_keys((new CleintControllerRequest)->attributes()) as $fillableUpdate) {
            if (!is_null(request($fillableUpdate))) {
                $fillableCols[$fillableUpdate] = request($fillableUpdate);
            }
        }
        return $fillableCols;
    }

    /**
     * Baboon Script By [it v 1.6.32]
     * destroy a newly created resource in storage.
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cleint = Cleint::find($id);
        if (is_null($cleint) || empty($cleint)) {
            return backWithSuccess(trans('admin.undefinedRecord'), url("marketer/cleint"));
        }
        if (!empty($cleint->photo_profile)) {
            it()->delete($cleint->photo_profile);
        }

        it()->delete('cleint', $id);
        $cleint->delete();
        return redirectWithSuccess(url("marketer/cleint"), trans('admin.deleted'));
    }


    public function multi_delete()
    {
        $data = request('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $cleint = Cleint::find($id);
                if (is_null($cleint) || empty($cleint)) {
                    return backWithError(trans('admin.undefinedRecord'), url("marketer/cleint"));
                }
                if (!empty($cleint->photo_profile)) {
                    it()->delete($cleint->photo_profile);
                }
                it()->delete('cleint', $id);
                $cleint->delete();
            }
            return redirectWithSuccess(url("marketer/cleint"), trans('admin.deleted'));
        } else {
            $cleint = Cleint::find($data);
            if (is_null($cleint) || empty($cleint)) {
                return backWithError(trans('admin.undefinedRecord'), url("marketer/cleint"));
            }

            if (!empty($cleint->photo_profile)) {
                it()->delete($cleint->photo_profile);
            }
            it()->delete('cleint', $data);
            $cleint->delete();
            return redirectWithSuccess(url("marketer/cleint"), trans('admin.deleted'));
        }
    }


    // Marketer permissions
    public function marketerStore(CleintControllerRequest $request)
    {
        $data = $request->except("_token", "_method");
        $data['photo_profile'] = "";
        $data['marketer_id'] = marketer()->id();
        $data['password'] = bcrypt(request('password'));
        $cleint = Cleint::create($data);
        if (request()->hasFile('photo_profile')) {
            $cleint->photo_profile = it()->upload('photo_profile', 'cleint/' . $cleint->id);
            $cleint->save();
        }
        $redirect = isset($request["add_back"]) ? "/create" : "";
        return redirectWithSuccess(url('marketer/cleint' . $redirect), trans('admin.added'));
    }


}
