<?php

namespace App\Modules\User\Http\Controllers;

use App\Modules\User\Repositories\RoleInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;


class RoleController extends Controller
{
    protected $role;

    public function __construct(RoleInterface $role)
    {
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['role'] = $this->role->findAll($limit = 50);
        return view('user::role.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['permission'] = 'NULL';
        $data['routes'] = $this->getRouteList();

//        dd( $data['routes']);
        return view('user::role.create', $data);
    }

    private function getRouteList()
    {
        $app = app();
        $collection = $app->routes->getRoutes();
        $routeList = [];
        $hiddenRoutes = [
            'login',
            'role',
            'role.index',
            'role.create',
            'role.delete',
            'role.update',
            'dashboard',
            'dashboard1',
            'logout',
            'role.store',
            'role.edit',
            'login-post',
            'ProjectBoq.index',
            'ProjectBoq.create',
            'ProjectBoq.store',
            'ProjectBoq.edit',
            'ProjectBoq.update',
            'ProjectBoq.delete',
            'ProjectBoq.view',
            'boqTitle.index',
            'boqTitle.create',
            'boqTitle.store',
            'boqTitle.edit',
            'boqTitle.update',
            'boqTitle.delete',
            'boqTitleDescription.index',
            'boqTitleDescription.create',
            'boqTitleDescription.store',
            'boqTitleDescription.edit',
            'boqTitleDescription.update',
            'boqTitleDescription.delete',
            'employment.checkAvailability',
            'AssignEquipment.index',
            'AssignEquipment.store',
            'change-password',
            'update-password',
            'Notification.checkLink',
            'Passport.authorizations',
            'L5-swagger',
            'passport.authorizations.authorize',
            'passport.authorizations.approve',
            'passport.authorizations.deny',
            'passport.token',
            'passport.tokens.index',
            'passport.tokens.destroy',
            'passport.token.refresh',
            'passport.clients.index',
            'passport.clients.store',
            'passport.clients.update',
            'passport.clients.destroy',
            'passport.scopes.index',
            'passport.personal.tokens.index',
            'passport.personal.tokens.store',
            'passport.personal.tokens.destroy',
            'l5-swagger.api',
            'l5-swagger.docs',
            'l5-swagger.asset',
            'l5-swagger.oauth2_callback',
//            'department.store',
//            'department.update',
//            'employment.store',
//            'employment.update',
//            'designation.store',
//            'designation.update',
//            'employment.createUser',
//            'CashFlow.store',
//            'CashFlow.getCashFlow',
//            'equipmentType.store',
//            'equipmentType.update',
//            'equipment.store',
//            'equipment.update',
//            'leaveType.store',
//            'leaveType.update',
//            'leave.store',
//            'leave.update',
//            'leave.updateStatus',
//            'projectBid.store',
//            'projectBid.update',
//            'financialResult.store',
//            'financialResult.update',
//            'generalNote.store',
//            'generalNote.update',
//            'EquipmentRequisition.store',
//            'EquipmentRequisition.update',
//            'RawMaterial.store',
//            'RawMaterial.update',
//            'vendorType.store',
//            'vendorType.update',
//            'vendor.store',
//            'vendor.update',
//            'ProjectManagement.store',
//            'ProjectManagement.storeComment',
//            'ProjectManagement.update',
//            'ProjectManagement.updateStatus',
//            'ProjectManagement.updatePriority',
//            'ProjectManagement.updateAttachment',
//            'ProjectManagement.updateWorkprogress',
            'permission.denied',
            'dashboard1',
            'organization.employeeList'

        ];

        foreach ($collection as $routes) {

            if ($routes->getName() != null && !in_array($routes->getName(), $hiddenRoutes)) {
                $list = str_replace('.', ' ', $routes->getName());
                $routeList[$routes->getName()] = ucfirst(str_replace('destroy', 'delete',
                    str_replace('index', 'list', $list)));
            }

        }


        return $routeList;
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        try {

            $role_data = array(
                'name' => $input['name'],
                'status' => '1'
            );
            $last_id = $this->role->save($role_data);

            if (isset($input['route_name'])) {
                $route_list = $input['route_name'];

                foreach ($route_list as $key => $val) {
                    $permission_data = array(
                        'role_id' => $last_id->id,
                        'route_name' => $val
                    );

                    $this->role->savePermission($permission_data);
                }
            }

            alertify()->success('Role & Permission Created Successfully');

        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }

        return redirect(route('role.index'));
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $data['role'] = $this->role->find($id);
        $data['permission'] = $this->role->findPermissionById($id);
        $data['routes'] = $this->getRouteList();
        return view('user::role.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        try {

            $role_data = array(
                'name' => $input['name'],
                'status' => '1'
            );

            $this->role->update($id, $role_data);

            $this->role->deletePermission($id);

            $route_list = $input['route_name'];

            foreach ($route_list as $key => $val) {
                $permission_data = array(
                    'role_id' => $id,
                    'route_name' => $val
                );

                $this->role->savePermission($permission_data);
            }

            alertify()->success('Role & Permission Update Successfully');

        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }

        return redirect(route('role.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $this->role->delete($id);
            $this->role->deletePermission($id);

            alertify()->success('Role & Permission Deleted Successfully');
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }

        return redirect(route('role.index'));
    }
}
