<?php

namespace App\Http\Controllers\Booking;

use App;
use App\DataProperty;
use App\DataType;
use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Base\PropertyController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Item\ItemController;
use App\Http\Controllers\Navigation\NavigationController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Widget\WidgetController;
use App\Libraries\MyLib\MyPluralizer;
use App\Libraries\Utilities\BuiltInMethods;
use App\Libraries\Utilities\CarbonDateUtility;
use App\Libraries\Utilities\CodeUtilities\MethodUtility;
use App\Libraries\Utilities\ItemUtility;
use App\Libraries\Utilities\TextUtility;
use App\Libraries\Utilities\TypeUtility;
use App\Relation;
use App\Service;
use App\ServiceProperty;
use App\ServicePropertyValue;
use App\ServiceType;
use App\User;
use Carbon\Carbon;
use ChrisKonnertz\StringCalc\StringCalc;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Morilog\Jalali\jDateTime;
use Route;
use stdClass;
use Validator;
use Kavenegar;

class BookingController extends Controller
{

    public static function getItem($type, $step = true)
    {
        $services = DB::table('services')->where('name', '=', $type)->get();

        if (count($services) == 0 || count($services) >= 2)
            return null;

        $service = $services [0];
        $commands = DB::table('service_commands')->where('service', '=', $service->id)
            ->get(['service_commands.*']);

        foreach ($commands as &$command) {
            $command->input = TextUtility::isJsonText($command->input) ? json_decode($command->input, true) : $command->input;
//            $command->output = TextUtility::isJsonText($command->output) ? json_decode($command->output, true) : $command->output;
            $command->operation = TextUtility::isJsonText($command->operation) ? json_decode($command->operation, true) : $command->operation;
        }

        $service->commands = $commands;
        return $service;

    }

    public static function getBaseInformation(&$data, $type)
    {
        $navs = NavigationController::getNavigation('admin', true);

        foreach ($navs as $k => $nav) {
            foreach ($nav as $k1 => $nav1) {
                if (in_array($nav1->properties->route, config('base.routes.services.items'))
                    && $nav1->properties->value == $type) {
                    $nav1->active = true;
                } else {
                    $nav1->active = false;
                }
            }
        }

        $data['navigations'] = $navs;

    }

    public static function getPermissions($type)
    {

        $permissions = [];
        $permissions['index'] = "services.index" . ":" . $type;
        $permissions['show'] = "services.show" . ":" . $type;
        $permissions['create'] = "services.create" . ":" . $type;
        $permissions['store'] = "services.store" . ":" . $type;
        $permissions['update'] = "services.update" . ":" . $type;
        $permissions['edit'] = "services.edit" . ":" . $type;
        $permissions['change'] = "services.change" . ":" . $type;
        $permissions['destroy'] = "services.destroy" . ":" . $type;


        $permissions['properties.store'] = "services.properties.store" . ":" . $type;
        $permissions['settings.edit'] = "services.settings" . ":" . $type;

        return $permissions;


    }

    public static function getUrls($type, $id = 0)
    {

        $urls = [];
        $urls['index'] = route("services.index", ['type' => $type]);
        $urls['change'] = route("services.change", ['type' => $type]);
        $urls['destroy'] = route("services.destroy", ['type' => $type]);
        $urls['properties.store'] = route("services.properties.store", ['type' => $type]);
        $urls['settings.edit'] = route("services.settings.edit", ['type' => $type]);
        return $urls;

    }




    public function index($type)
    {

        if (!\Request::ajax()) {

            $data = BaseController::createBaseInformations();
            self::getBaseInformation($data, $type);
            $data['permissions'] = self::getPermissions($type);
            $data['urls'] = self::getUrls($type);

            $data ['widgets'] = WidgetController::getWidgets("service.index", $type);
            $data['page_title'] = trans('messages.list of') . Str::plural($type);
            $data['breadcrumbs'] = [
                [
                    'title' => trans('messages.navigation_titles.dashboard'),
                    'url' => route('admin.index')
                ],
                [
                    'title' => Str::plural($type),
                    'url' => ''
                ]
            ];
        }

        $data ['type'] = $type;
        $data['situations'] = trans('messages.service_situations');

        if (!\Request::ajax()) {
            return view("admin.items.views.index", $data);
        } else {
            return response()->json(['error' => 0, 'message' => $data]);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $type)
    {

    }


    public function show($type, $id)
    {

//        return response()->json(['error' => 0, 'message' => "this is service reserve test"]);
//        return "dsaddasd";
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data, $type);

        $components['files']['images'] = DB::table('images')->get(['id', 'title', 'path']);

        $data['type'] = $type;

        $properties = self::getProperties($type, $id);
        $data['properties'] = $properties;

        $props = unserialize(serialize($properties));
        $data['groups'] = PropertyController::sortProperties($props);


//        return response()->json(['error' => 0, 'message' => $properties ]);

        $data['id'] = $id;
        $bt_id = ServiceType::where('title', '=', $type)->first();
        $bt_id->actions = PropertyController::parseTypeActions($bt_id->actions);
        $data['urls'] = self::getUrls($type, $id);
        $data['permissions'] = self::getPermissions($type);


        return response()->json(['error' => 0, 'message' => $data]);

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type, $id)
    {
//        return response()->json(['success' => 'Added new records.']);

        $bt_id = ServiceType::where('title', '=', $type)->first();
        $bt_id->actions = PropertyController::parseTypeActions($bt_id->actions);
        $bt_id->triggers = json_decode($bt_id->triggers, true);


        if ($request->input('part_update') && $request->input('part_update') == true) {

//            return response()->json(['success' => 'Added new records.1111111']);

            self::saveProperties($request, $type, $id, true);


            if (!is_null($request->input('situation')))
                self::launchTriggers($bt_id, $id, ['event' => 'update', 'args' => ['situation' => $request->input('situation')]]);


            if (!is_null($request->input('situation')) && $request->input('situation') == 7) {


                $props = ServiceController::getDataProperties3($type, $id);
                $rel_id = DB::table('relation_objects')
                    ->where('object_type', '=', config('base.object_types.service'))
                    ->where('object_id', '=', $id)
                    ->get();
                $rel_id = $rel_id[0]->relation;
                $relations = DB::table('relation_objects')
                    ->where('relation', '=', $rel_id)
                    ->get();
                foreach ($relations as $relation) {
                    if ($relation->object_type == config('base.object_types.user')) {
                        $obj_id = $relation->object_id;
                        $usr = User::find($obj_id);
                        if (is_null($usr)) {
                            $data['user'] = null;
                        } else {
                            if ($usr->type == config('base.user_types.user')) {
                                $data['user'] = UserController::getDataProperties3('user', $obj_id);
                            } elseif ($usr->type == config('base.user_types.customer')) {
                                $data['customer'] = UserController::getDataProperties3('customer', $obj_id);
                            }
                        }
                    } elseif ($relation->object_type == config('base.object_types.data')) {
                        $obj_id = $relation->object_id;
                        $data['room'] = DataController::getDataProperties3('room', $obj_id);
                    }
                }

                $data['reserve'] = $props;
                $me = " میهمان گرامی، رزرو واحد مورد نظر شما در هتل صبوری رشت تایید گردید. ";
                $me .= "\n";
                $me .= "کد رهگیری شما :{$data['reserve']['code']->value}";
                $me .= "\n";
                $me .= 'هتل صبوری';

                try {
                    $sender = "10008445";
                    $message = $me;
                    $receptor = array($data['customer']['mobile']->value);
                    $result = Kavenegar::Send($sender, $receptor, $message);
                } catch (\Kavenegar\Exceptions\ApiException $e) {
                    // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
                    echo $e->errorMessage();
                } catch (\Kavenegar\Exceptions\HttpException $e) {
                    // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
                    echo $e->errorMessage();
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }


            }


            return response()->json(['success' => 'Added new records.']);

        }


        $type_id = $bt_id->id;
        $rules = ServicePropertyController::createValidationRules($type_id, false, $id);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {

//            DB::table('service_assigned_properties')
//                ->where('data', '=', $id)
//                ->delete();

//            dd($request);
            self::saveProperties($request, $type, $id);
            return response()->json(['success' => 'Added new records.']);
        }

        return response()->json(['error' => $validator->errors()->all()]);

//        return redirect()->route("data.index", ['type' => $type]);
        //


        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Service $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }

    public function changeSituation(Request $request, $type)
    {


//        $situation = $request->input('situation');
        $service_id = $request->input('service_id');
        $property = '';
        if ($request->input('property') != null)
            $property = $request->input('property');

        $value = '';
        if ($request->input('value') != null)
            $value = $request->input('value');

        $b = self::changePropertyValue($service_id, $property, $value);
        if ($b == true) {
            return response()->json(['error' => 0, 'message' => 'success']);
        } else {
            return response()->json(['error' => 1, 'message' => 'failed']);
        }

    }


    public static function changeProperty($service_id, $property, $value)
    {

        $service = Service::find($service_id);
        $properties = ServiceProperty::where('type', '=', $service->type)
            ->where('title', '=', $property)
            ->get();

        $s_id = 0;
        if (count($properties) == 0) {
            return false;
        } else {
            $s_id = $properties[0]->id;
        }
        if ($s_id != 0) {
            DB::table('service_assigned_properties')
                ->where('property', '=', $s_id)
                ->where('service', '=', $service_id)
                ->update(
                    [
                        'value' => $value,
                    ]
                );
        }

    }


    public static function getServices($type)
    {


    }

}
