<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
class UsersController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('users.index');
    }

    public function getAll(Request $request)
    {
        $data = [];
        $params = $request;
        $users = new User;
        if (!empty($params['search']['value'])) {
            $value = "%" . $params['search']['value'] . "%";
            $users = $users->where('name', 'like', (string)$value);
            $users = $users->orWhere('email', 'like', (string)$value);
            $users = $users->orWhere('userId', 'like', (string)$value);
        }
        $users = $users->offset($params['start'])->take($params['length']);
        $column = $params['order'][0]['column'];
        $order = $params['order'][0]['dir'];
        $columnname = $params['columns'][$column]['data'];
        $users = $users->orderBy($columnname,$order);
        $users = $users->get()->except(Auth::id());
        $userCount = $users->count();
        $totalRecords = $userCount;
        foreach ($users as $row) {
            $id = encrypt($row->id);
            $status = '<a class="label font-weight-bold label-lg  label-light-danger label-inline changestatus" style="cursor : pointer;" title="cilck to active" data-status="active" data-id="'.$id.'">Inactive</a>';
            if($row->status == 'active') {
               $status = '<span class="label font-weight-bold label-lg  label-light-success label-inline changestatus" style="cursor : pointer;" title="cilck to inactive" data-status="inactive" data-id="'.$id.'">Active</span>';
            }
            $role = '<span class="label label-success label-dot mr-2"></span><span class="font-weight-bold text-success">Superadmin</span>';
            if($row->role == 'dashboard') {
                $role = '<span class="label label-primary label-dot mr-2"></span><span class="font-weight-bold text-primary">Dashboard</span>';
            }
            if($row->role == 'data_access_only') {
                $role = '<span class="label label-warning label-dot mr-2"></span><span class="font-weight-bold text-warning">Data Access Only</span>';
            }
            if($row->role == 'data_access_without_import_export') {
                $role = '<span class="label label-danger label-dot mr-2"></span><span class="font-weight-bold text-danger">Data Access without Import/Export</span>';
            }
            $actions = '<span style="overflow: visible; position: relative; width: 125px;">
                            <a href="javascript:void(0);" class="btn btn-sm btn-clean btn-icon mr-2 btn-add-user" data-target=".add_modal" data-toggle="modal" data-id="'.$id.'" title="Edit details">
                            <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect><path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                            </g></svg></span>
                            </a>
                       </span>';
            $rowData['userId'] = $row->userId;
            $rowData['name'] = $row->name;
            $rowData['email'] = $row->email;
            $rowData['role'] = $role;
            $rowData['permission_period'] = (!empty($row->permission_period)) ? date('d M Y',strtotime($row->permission_period)) : 'N/A';
            $rowData['status'] = $status;
            $rowData['action'] = $actions;
            $data[] = $rowData;
        }
//        <a href="javascript:void(0);" class="btn btn-sm btn-clean btn-icon delete-user" data-id="'.$id.'" title="Delete">
//                            <span class="svg-icon svg-icon-md">
//                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
//                            <rect x="0" y="0" width="24" height="24"></rect>
//                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
//                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path></g></svg></span>
//                            </a>

    $json_data = array(
            "draw" => $params['draw'],
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "data" => $data   // total data array
        );
        return json_encode($json_data);
    }

    /**
     * Get model for add edit user
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getModal(Request $request)
    {
        $user = array();
        if (isset($request->id) && $request->id != '') {
            $id = decrypt($request->id);
            $user = User::where('id',$id)->first();

        }
        return view('users.getmodal', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ];
        if (isset($request->userid)) {
            $userid = decrypt($request->userid);
            $rules['email'] = 'required|unique:users,email,'.$userid;
            $rules['password'] = 'nullable|min:6';
        }else{
            $rules['email'] = 'required|unique:users,email';
            $rules['password'] = 'required|min:6';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $arr = array("status" => 400, "msg" => $validator->errors()->first(), "result" => array());
        } else {
            try {
                if (isset($userid)) {
                    $user = User::find($userid);
                    $msg = "User updated successfully.";
                }else{
                    $user = new User;
                    $maxuserid = User::max('userId');
                    $newuserid = $maxuserid + 1;
                    $user->userId = '00'.$newuserid;
                    $msg = "User added successfully.";
                }
                $user->name = $request->name;
                $user->email = $request->email;
                $user->role = $request->role;
                $user->status = $request->status ?? 'inactive';

                if(isset($request->password) && !empty($request->password)){
                    $user->password = Hash::make($request->password);
                }
                $user->save();
                $arr = array("status" => 200, "msg" => $msg);
            } catch (\Illuminate\Database\QueryException $ex) {
                $msg = $ex->getMessage();
                if (isset($ex->errorInfo[2])) :
                    $msg = $ex->errorInfo[2];
                endif;
                $arr = array("status" => 400, "msg" => $msg, "result" => array());
            } catch (Exception $ex) {
                $msg = $ex->getMessage();
                if (isset($ex->errorInfo[2])) :
                    $msg = $ex->errorInfo[2];
                endif;
                $arr = array("status" => 400, "msg" => $msg, "result" => array());
            }
        }

        return \Response::json($arr);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $id = decrypt($id);
            $user = User::find($id);
            if ($user) {
                $user->delete();
                $arr = array("status" => 200, "msg" => 'User deleted successfully.');
            } else {
                $arr = array("status" => 400, "msg" => 'User not found. please try again!');
            }

        } catch (\Illuminate\Database\QueryException $ex) {
            $msg = 'You can not delete this as related data are there in system.';
            if (isset($ex->errorInfo[2])) {
                $msg = $ex->errorInfo[2];
            }
            $arr = array("status" => 400, "msg" => $msg, "result" => array());
        } catch (Exception $ex) {
            $msg = 'You can not delete this as related data are there in system.';
            if (isset($ex->errorInfo[2])) {
                $msg = $ex->errorInfo[2];
            }
            $arr = array("status" => 400, "msg" => $msg, "result" => array());
        }
        return \Response::json($arr);
    }

    /**
     * Change status of user active or inactive
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response send response in json
     */
    public function changeStatus(Request $request)
    {
        try {
            $id = decrypt($request->id);
            $user = User::find($id);
            if ($user) {
                $user->update(['status' => $request->status]);
                $arr = array("status" => 200, "msg" => 'User status changed successfully.');
            } else {
                $arr = array("status" => 400, "msg" => 'User not found. please try again!');
            }

        } catch (\Illuminate\Database\QueryException $ex) {

            $msg = $ex->getMessage();
            if (isset($ex->errorInfo[2])) {
                $msg = $ex->errorInfo[2];
            }

            $arr = array("status" => 400, "msg" => $msg, "result" => array());
        } catch (Exception $ex) {

            $msg = $ex->getMessage();
            if (isset($ex->errorInfo[2])) {
                $msg = $ex->errorInfo[2];
            }
            $arr = array("status" => 400, "msg" => $msg, "result" => array());
        }
        return \Response::json($arr);
    }
}
