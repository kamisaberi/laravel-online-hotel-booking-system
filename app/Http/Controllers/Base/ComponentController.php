<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Document\DocumentController;
use App\Http\Controllers\Relation\RelationController;
use App\Libraries\Utilities\TextUtility;
use stdClass;

class ComponentController extends Controller
{

    public static function getRequiredComponents($groups, &$data)
    {
        $modal_props = [];
        foreach ($groups as $group) {
            foreach ($group as $property) {
                if (isset($property->fillation_rules['datasource']) && $property->fillation_rules['datasource'] == 'documents>general') {

                    $images = DocumentController::getItems('general');
                    $data['images'] = $images;
                    $data['files']['images'] = $images;
                    $data['documents_urls']['images'] = route('documents.store', ['type' => 'general']);

                } elseif ($property->input_type == "tinymce") {

                    $images = DocumentController::getItems('general');
                    $data['images'] = $images;
                    $data['files']['images'] = $images;
                    $data['documents_urls']['images'] = route('documents.store', ['type' => 'general']);

                    $videos = DocumentController::getItems('video');
                    $data['videos'] = $videos;
                    $data['files']['videos'] = $videos;
                    $data['documents_urls']['videos'] = route('documents.store', ['type'=>'video']);

                    $swfs = DocumentController::getItems('swf');
                    $data['swfs'] = $swfs;
                    $data['files']['swfs'] = $swfs;
                    $data['documents_urls']['swfs'] = route('documents.store', ['type' => 'swf']);


                } elseif ($property->input_type == "documents:general") {

                    $images = DocumentController::getItems('general');
                    $data['images'] = $images;
                    $data['files']['images'] = $images;
                    $data['documents_urls']['images'] = route('documents.store', ['type' => 'general']);

                } elseif ($property->input_type == "documents:video") {

                    $videos = DocumentController::getItems('video');
                    $data['videos'] = $videos;
                    $data['files']['videos'] = $videos;
                    $data['documents_urls']['videos'] = route('documents.store', ['type' => 'video']);

                } elseif ($property->input_type == "documents:swf") {

                    $swfs = DocumentController::getItems('swf');
                    $data['swfs'] = $swfs;
                    $data['files']['swfs'] = $swfs;
                    $data['documents_urls']['swfs'] = route('documents.store', ['type' => 'swf']);

                } elseif (isset($property->fillation_rules['action']) && $property->fillation_rules['action'] == 'show_modal') {

                    if (TextUtility::startsWith($property->input_type, 'relations')) {
                        $rel_type = explode(':', $property->input_type)[1];
                        $rel_props = PropertyController::sortProperties(RelationController::getProperties($rel_type, null, false));

                        $modal_prop = new stdClass();
                        $modal_prop->title = $property->title;
//                        $modal_prop->url = route('relations.store', ['type' => $rel_type]);
                        $modal_prop->url = '';
                        $modal_prop->properties = $rel_props;
                        $modal_props[] = $modal_prop;

                    } else {

                        $modal_prop = new stdClass();
                        $modal_prop->title = $property->title;
                        $modal_prop->url = '';
                        $modal_prop->properties = PropertyController::sortProperties([$property]);
                        $modal_props[] = $modal_prop;

                    }

                }
            }
        }
        if (count($modal_props) > 0)
            $data['modals'] = $modal_props;

    }
    //
}
