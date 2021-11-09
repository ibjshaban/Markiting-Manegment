<?php

namespace App\Http\Controllers\Marketer;

use App\DataTables\CleintDataTable;
use App\DataTables\CleintMarketerDataTable;
use App\DataTables\MarketerDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\MarketerRequest;
use App\Models\Cleint;
use App\Models\Marketer;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class MarketerController extends Controller
{

    public function __construct()
    {
        /*$this->middleware('AdminRole:marketercontroller_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:marketercontroller_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:marketercontroller_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:marketercontroller_delete', [
            'only' => ['destroy', 'multi_delete'],
        ]);*/
    }


    /**
     * Baboon Script By [it v 1.6.32]
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(MarketerDataTable $marketer)
    {
        return $marketer->render('admin.marketer.index', ['title' => trans('admin.marketer')]);
    }
    public function cleints(CleintMarketerDataTable $cleints, $id)
    {
        return $cleints->with('id', $id)->render('admin.marketer.index', ['title' => trans('admin.marketer')]);
    }


    /**
     * Baboon Script By [it v 1.6.32]
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.marketer.create', ['title' => trans('admin.create')]);
    }

    /**
     * Baboon Script By [it v 1.6.32]
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response Or Redirect
     */
    public function store(MarketerRequest $request)
    {
        $data = $request->except("_token", "_method");
        $data['photo_profile'] = "";
        $data['admin_id'] = admin()->id();
        $data['password'] = bcrypt(request('password'));
        $marketer = Marketer::create($data);
        if (request()->hasFile('photo_profile')) {
            $marketer->photo_profile = it()->upload('photo_profile', 'marketer/' . $marketer->id);
            $marketer->save();
        }
        $redirect = isset($request["add_back"]) ? "/create" : "";
        return redirectWithSuccess(aurl('marketer' . $redirect), trans('admin.added'));
    }

    /**
     * Display the specified resource.
     * Baboon Script By [it v 1.6.32]
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marketer = Marketer::find($id);
        return is_null($marketer) || empty($marketer) ?
            backWithError(trans("admin.undefinedRecord"), aurl("marketer")) :
            view('admin.marketer.show', [
                'title' => trans('admin.show'),
                'marketer' => $marketer
            ]);
    }


    /**
     * Baboon Script By [it v 1.6.32]
     * edit the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marketer = Marketer::find($id);
        return is_null($marketer) || empty($marketer) ?
            backWithError(trans("admin.undefinedRecord"), aurl("marketer")) :
            view('admin.marketer.edit', [
                'title' => trans('admin.edit'),
                'marketer' => $marketer
            ]);
    }

    public function update(MarketerRequest $request, $id)
    {
        // Check Record Exists
        $marketer = Marketer::find($id);
        if (is_null($marketer) || empty($marketer)) {
            return backWithError(trans("admin.undefinedRecord"), aurl("marketer"));
        }
        $data = $this->updateFillableColumns();
        $data['admin_id'] = admin()->id();
        if (request()->hasFile('photo_profile')) {
            it()->delete($marketer->photo_profile);
            $data['photo_profile'] = it()->upload('photo_profile', 'marketer');
        }
        $data['password'] = bcrypt(request('password'));
        Marketer::where('id', $id)->update($data);
        $redirect = isset($request["save_back"]) ? "/" . $id . "/edit" : "";
        return redirectWithSuccess(aurl('marketer' . $redirect), trans('admin.updated'));
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
        foreach (array_keys((new MarketerRequest)->attributes()) as $fillableUpdate) {
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
        $marketer = Marketer::find($id);
        if (is_null($marketer) || empty($marketer)) {
            return backWithSuccess(trans('admin.undefinedRecord'), aurl("marketer"));
        }
        if (!empty($marketer->photo_profile)) {
            it()->delete($marketer->photo_profile);
        }

        it()->delete('marketer', $id);
        $marketer->delete();
        return redirectWithSuccess(aurl("marketer"), trans('admin.deleted'));
    }


    public function multi_delete()
    {
        $data = request('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $marketer = Marketer::find($id);
                if (is_null($marketer) || empty($marketer)) {
                    return backWithError(trans('admin.undefinedRecord'), aurl("marketer"));
                }
                if (!empty($marketer->photo_profile)) {
                    it()->delete($marketer->photo_profile);
                }
                it()->delete('marketer', $id);
                $marketer->delete();
            }
            return redirectWithSuccess(aurl("marketer"), trans('admin.deleted'));
        } else {
            $marketer = Marketer::find($data);
            if (is_null($marketer) || empty($marketer)) {
                return backWithError(trans('admin.undefinedRecord'), aurl("marketer"));
            }

            if (!empty($marketer->photo_profile)) {
                it()->delete($marketer->photo_profile);
            }
            it()->delete('marketer', $data);
            $marketer->delete();
            return redirectWithSuccess(aurl("marketer"), trans('admin.deleted'));
        }
    }


}
