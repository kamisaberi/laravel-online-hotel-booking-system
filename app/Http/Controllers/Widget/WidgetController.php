<?php

namespace App\Http\Controllers\Widget;

use App\Http\Controllers\Controller;
use App\Widget;
use App\WidgetPart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WidgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public static function createWidgetUsingTemplate($view, $route, $object_type_id, $object_id, $template_widget)
    {

        $widget = new  Widget();
        $widget->view = $view;
        $widget->route = $route;
        $widget->object_type = $object_type_id;
        $widget->object_id = $object_id;
        $widget->save();

        $wp = new WidgetPart();
        $wp->widget = $widget->id;
        $wp->widget_part_type = 2;
        $wp->name = $template_widget;
        $wp->save();

    }


    public static function getWidgets($view, $type)
    {
        $widgets = Widget::where('view', '=', $view)
            ->join('widget_parts', 'widgets.id', '=', 'widget_parts.widget')
            ->join('widget_part_types', 'widget_part_types.id', '=', 'widget_parts.widget_part_type')
            ->where('type', '=', Str::singular($type))
            ->get(['widget_parts.name', 'widget_part_types.title as type']);


        if (count($widgets) > 0) {
            $name = $widgets[0]->name;
            $arrs = explode('|', $name);
            foreach ($arrs as $arr) {
                $vs = explode(':', $arr);
                if (count($vs) == 2)
                    $widgets[0]->{$vs[0]} = $vs[1];
            }
        }

        return $widgets;
    }

    public static function getWidgets2($view, $route, $type)
    {
        $widgets = Widget::where('view', '=', $view)
            ->join('widget_parts', 'widgets.id', '=', 'widget_parts.widget')
            ->join('widget_part_types', 'widget_part_types.id', '=', 'widget_parts.widget_part_type')
            ->where('type', '=', Str::singular($type))
            ->where('route', '=', $route)
            ->get(['widget_parts.name', 'widget_part_types.title as type']);


        if (count($widgets) > 0) {
            $name = $widgets[0]->name;
            $arrs = explode('|', $name);
            foreach ($arrs as $arr) {
                $vs = explode(':', $arr);
                if (count($vs) == 2)
                    $widgets[0]->{$vs[0]} = $vs[1];
            }
        }

        return $widgets;
    }

    public static function getWidgetsUsingRoute($route, $type)
    {
        $widgets = Widget::where('route', '=', $route)
            ->join('widget_parts', 'widgets.id', '=', 'widget_parts.widget')
            ->join('widget_part_types', 'widget_part_types.id', '=', 'widget_parts.widget_part_type')
            ->where('type', '=', Str::singular($type))
            ->get(['widget_parts.name', 'widget_part_types.title as type']);


        if (count($widgets) > 0) {
            $name = $widgets[0]->name;
            $arrs = explode('|', $name);
            foreach ($arrs as $arr) {
                $vs = explode(':', $arr);
                if (count($vs) == 2)
                    $widgets[0]->{$vs[0]} = $vs[1];
            }
        }

        return $widgets;
    }

//    public static function getWidgets2($view, $type, $sub_type, $route)
//    {
////        echo $view;
////        echo "<br>";
////        echo config('base.object_types.' . $type);
////
////        echo "<br>";
////
////        echo config('base.' . $type . '_types.' . $sub_type);
//
//        $ds = DB::table($type . '_types')
//            ->where('title', '=', $sub_type)
//            ->get();
//        $obj_id = $ds[0]->id;
//
//        $widgets = Widget::where('view', '=', $view)
//            ->join('widget_parts', 'widgets.id', '=', 'widget_parts.widget')
//            ->join('widget_part_types', 'widget_part_types.id', '=', 'widget_parts.widget_part_type')
//            ->where('object_type', '=', config('base.object_types.' . $type))
//            ->where('route', '=', $route)
//            ->where('object_id', '=', $obj_id)
//            ->get(['widget_parts.name', 'widget_part_types.title as type']);
//
////        $widgets = Widget::where('view', '=', $view)
////            ->join('widget_parts', 'widgets.id', '=', 'widget_parts.widget')
////            ->join('widget_part_types', 'widget_part_types.id', '=', 'widget_parts.widget_part_type')
////            ->where('object_type', '=', config('base.object_types.' . $type))
////            ->where('route', '=', $route)
////            ->where('object_id', '=', config('base.' . $type . '_types.' . $sub_type))
////            ->get(['widget_parts.name', 'widget_part_types.title as type']);
//
//
////        dd($widgets);
//
//        return $widgets;
//    }


    public function index()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Widget $widget
     * @return \Illuminate\Http\Response
     */
    public function show(Widget $widget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Widget $widget
     * @return \Illuminate\Http\Response
     */
    public function edit(Widget $widget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Widget $widget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Widget $widget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Widget $widget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Widget $widget)
    {
        //
    }
}
