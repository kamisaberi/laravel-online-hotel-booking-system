<?php

namespace App\Http\Controllers\Permission;

use App;
use App\DocumentType;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Navigation\NavigationController;
use App\Http\Controllers\User\UserController;
use App\Libraries\Utilities\TextUtility;
use App\Navigation;
use App\NavigationItem;
use Auth;
use DB;
use Illuminate\Http\Request;
use Lang;
use Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use stdClass;

class PermissionController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $navs = NavigationController::getNavigation('admin', true);

        foreach ($navs as $k => $nav) {
            foreach ($nav as $k1 => $nav1) {
                if (in_array($nav1->properties->route, config('base.routes.permissions.items'))) {
                    $nav1->active = true;
                } else {
                    $nav1->active = false;
                }
            }
        }

        $data['navigations'] = $navs;

        $data ['user'] = UserController::getCurrentUserData();


        $user_roles = Auth::user()->getRoleNames();
        $best_role_id = 100000;
        foreach ($user_roles as $user_role) {
            $rl = Role::findByName($user_role);
            if ($rl->id < $best_role_id) {
                $best_role_id = $rl->id;
            }
        }

        $roles = Role::where('id', '>=', $best_role_id)->get();
        $data['roles'] = $roles;


        $navs = Navigation::get(['id', 'title']);
        for ($i = 0; $i < count($navs); $i++) {

            $items = NavigationItem::where('navigation', '=', $navs[$i]->id)
                ->get(['id', 'navigation']);

            for ($j = 0; $j < count($items); $j++) {

                $props = DB::table('navigation_item_assigned_properties')
                    ->join('navigation_item_properties', 'navigation_item_assigned_properties.property', '=', 'navigation_item_properties.id')
                    ->where('navigation_item_assigned_properties.navigation_item', '=', $items[$j]->id)
                    ->get(['navigation_item_properties.title', 'navigation_item_assigned_properties.value']);

                $c = new stdClass();
                foreach ($props as $prop) {
                    $c->{$prop->title} = $prop->value;
                }
                $items[$j]->properties = $c;
            }

            $navs[$i]->items = $items;
        }

        $data['navs'] = $navs;

        $pages = DocumentType::where('parent', '=', 5)->get();

        $data['pages'] = $pages;


        $data['page_title'] = trans('messages.list of') . 'سطح دسترسی';
        $data['breadcrumbs'] = [
            [
                'title' => trans('messages.navigation_titles.dashboard'),
                'url' => route('admin.index')
            ],
            [
                'title' => 'سطح دسترسی',
                'url' => ''
            ]
        ];


        return view("admin.permission.index", $data);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Navigation $navigation
     * @return \Illuminate\Http\Response
     */
    public function show(Navigation $navigation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Navigation $navigation
     * @return \Illuminate\Http\Response
     */
    public function edit(Navigation $navigation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Navigation $navigation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Navigation $navigation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Navigation $navigation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
    }


    public function getItems(Request $request)
    {

        $id = $request->input('id');

        $permissions = Permission::all();
        $grouped_items = $permissions->groupBy('category');
        $role = Role::findByName($id);
        $role_permissions = $role->getAllPermissions();

        $res = "";


        $user_roles = Auth::user()->getRoleNames();
        $best_role_id = 100000;
        foreach ($user_roles as $user_role) {
            $rl = Role::findByName($user_role);
            if ($rl->id < $best_role_id) {
                $best_role_id = $rl->id;
            }
        }


        foreach ($grouped_items as $k => $permissions) {

            $res .= "<div class='row'>";
            $res .= "<div class='col col-md-12 col-sm-12 center'>";

            if ((TextUtility::startsWith($k, '{') && TextUtility::endsWith($k, '}'))
                || (TextUtility::startsWith($k, '[') && TextUtility::endsWith($k, ']'))) {

                $ks = (array)json_decode($k);
                $res .= "<h3 ><center>{$ks[App::getLocale()]}</center></h3>";

            } else {
                $res .= "<h3 ><center>$k</center></h3>";
            }


            $res .= "</div>";
            $res .= "</div>";

            $res .= "<div class='row'>";

            foreach ($permissions as $permission) {

                if ($permission->accessible_by_role < $best_role_id)
                    continue;

                if ($permission->dependent_on != 0)
                    continue;

                $check = "";
                foreach ($role_permissions as $role_permission) {
                    if ($role_permission->name == $permission->name) {
                        $check = "checked";
                        break;
                    }
                }


                $desc = Lang::get('layout.permissions.' . $permission->description);

                $res .= "<div class='col col-md-3 col-sm-12'>";
                $res .= "<input type='checkbox' id='perm-{$permission->name}' name='{$permission->name}' value='1' $check />";
                $res .= "<label for='perm-{$permission->name}'>$desc</label>";
                $res .= "</div>";

            }
            $res .= "</div>";


        }

        return response()->json(['error' => false, 'message' => $res]);

    }

    public function getRoutes(Request $request)
    {
        $type = $request->input('type');

        if ($type == 'route') {
            $s = [];

            $routes = Route::getRoutes();
            foreach ($routes as $route) {
                /** @var \Illuminate\Routing\Route $route */
//                echo "<hr>";
//                echo $route->uri . PHP_EOL;
//                echo "<br>";
                $s[] = $route->getName();
//                $s .= "<option value='{$route->getName()}'>{$route->getName()}</option>";
//                echo "<br>";
//                echo $route->getPrefix();
//                echo "<br>";
//                echo $route->getActionMethod();
            }
            return response()->json(['error' => false, 'message' => $s]);
        }

    }


    public function changeProperty(Request $request)
    {
        $did = $request->input('id');
        $value = $request->input('value');
        $role = $request->input('role');

        $role = Role::findByName($role);


//        return response()->json(["error" => 0, 'message' => $role->name ]);

        $perm = Permission::where('name', '=', $did)->get();


        $sub_perms = Permission::where('dependent_on', '=', $perm[0]->id)->get();
//        return response()->json(["error" => 0, 'message' => count($sub_perms)]);
//        return response()->json(["error" => 0, 'message' => $value]);

        if ($value == 1) {
            $role->givePermissionTo($did);
            foreach ($sub_perms as $sub_perm) {
                $role->givePermissionTo($sub_perm->name);
            }
        } elseif ($value == 0) {
            $role->revokePermissionTo($did);
            foreach ($sub_perms as $sub_perm) {
                $role->revokePermissionTo($sub_perm->name);
            }
        }

        return response()->json(["error" => 0, 'message' => 'success']);
    }


}
