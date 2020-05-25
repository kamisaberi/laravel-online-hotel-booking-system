<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Communication
 *
 * @property int $id
 * @property string|null $title
 * @property int $communication_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Communication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Communication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Communication query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Communication whereCommunicationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Communication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Communication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Communication whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Communication whereUpdatedAt($value)
 */
	class Communication extends \Eloquent {}
}

namespace App{
/**
 * App\CommunicationProperty
 *
 * @property int $id
 * @property string $title
 * @property string $default_value
 * @property string $input_type
 * @property int $level
 * @property int $communication_type
 * @property int $is_setting
 * @property int $should_be_validated
 * @property string $validation_rules
 * @property int $is_key
 * @property int $is_fillable
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationProperty whereCommunicationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationProperty whereDefaultValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationProperty whereInputType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationProperty whereIsFillable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationProperty whereIsKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationProperty whereIsSetting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationProperty whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationProperty whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationProperty whereShouldBeValidated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationProperty whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationProperty whereValidationRules($value)
 */
	class CommunicationProperty extends \Eloquent {}
}

namespace App{
/**
 * App\CommunicationType
 *
 * @property int $id
 * @property string $title
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationType whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommunicationType whereUpdatedAt($value)
 */
	class CommunicationType extends \Eloquent {}
}

namespace App{
/**
 * App\Conversation
 *
 * @property int $id
 * @property int $conversation_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereConversationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereUpdatedAt($value)
 */
	class Conversation extends \Eloquent {}
}

namespace App{
/**
 * App\ConversationAssignedProperty
 *
 * @property int $id
 * @property int $conversation
 * @property int $property
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationAssignedProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationAssignedProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationAssignedProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationAssignedProperty whereConversation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationAssignedProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationAssignedProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationAssignedProperty whereProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationAssignedProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationAssignedProperty whereValue($value)
 */
	class ConversationAssignedProperty extends \Eloquent {}
}

namespace App{
/**
 * App\ConversationAssignedPropertyValue
 *
 * @property int $id
 * @property int|null $assigned_property
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationAssignedPropertyValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationAssignedPropertyValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationAssignedPropertyValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationAssignedPropertyValue whereAssignedProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationAssignedPropertyValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationAssignedPropertyValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationAssignedPropertyValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationAssignedPropertyValue whereValue($value)
 */
	class ConversationAssignedPropertyValue extends \Eloquent {}
}

namespace App{
/**
 * App\ConversationProperty
 *
 * @property int $id
 * @property string $title
 * @property string $default_value
 * @property string $input_type
 * @property int $level
 * @property int $conversation_type
 * @property int $is_setting
 * @property int $should_be_validated
 * @property string $validation_rules
 * @property int $is_key
 * @property int $is_fillable
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationProperty whereConversationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationProperty whereDefaultValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationProperty whereInputType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationProperty whereIsFillable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationProperty whereIsKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationProperty whereIsSetting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationProperty whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationProperty whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationProperty whereShouldBeValidated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationProperty whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationProperty whereValidationRules($value)
 */
	class ConversationProperty extends \Eloquent {}
}

namespace App{
/**
 * App\ConversationPropertyValue
 *
 * @property int $id
 * @property string|null $value
 * @property int|null $property
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationPropertyValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationPropertyValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationPropertyValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationPropertyValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationPropertyValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationPropertyValue whereProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationPropertyValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationPropertyValue whereValue($value)
 */
	class ConversationPropertyValue extends \Eloquent {}
}

namespace App{
/**
 * App\ConversationType
 *
 * @property int $id
 * @property string $title
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationType whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConversationType whereUpdatedAt($value)
 */
	class ConversationType extends \Eloquent {}
}

namespace App{
/**
 * App\Data
 *
 * @property int $id
 * @property int $data_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data whereDataType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data whereUpdatedAt($value)
 */
	class Data extends \Eloquent {}
}

namespace App{
/**
 * App\DataAssignedPropertyValue
 *
 * @property int $id
 * @property int|null $assigned_property
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataAssignedPropertyValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataAssignedPropertyValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataAssignedPropertyValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataAssignedPropertyValue whereAssignedProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataAssignedPropertyValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataAssignedPropertyValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataAssignedPropertyValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataAssignedPropertyValue whereValue($value)
 */
	class DataAssignedPropertyValue extends \Eloquent {}
}

namespace App{
/**
 * App\DataProperty
 *
 * @property int $id
 * @property string $title
 * @property string $default_value
 * @property string $input_type
 * @property int $level
 * @property int $data_type
 * @property int $is_setting
 * @property int $should_be_validated
 * @property string $validation_rules
 * @property int $is_key
 * @property int $is_fillable
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProperty whereDataType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProperty whereDefaultValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProperty whereInputType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProperty whereIsFillable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProperty whereIsKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProperty whereIsSetting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProperty whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProperty whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProperty whereShouldBeValidated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProperty whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProperty whereValidationRules($value)
 */
	class DataProperty extends \Eloquent {}
}

namespace App{
/**
 * App\DataPropertyValue
 *
 * @property int $id
 * @property string|null $value
 * @property int|null $property
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataPropertyValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataPropertyValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataPropertyValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataPropertyValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataPropertyValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataPropertyValue whereProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataPropertyValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataPropertyValue whereValue($value)
 */
	class DataPropertyValue extends \Eloquent {}
}

namespace App{
/**
 * App\DataType
 *
 * @property int $id
 * @property string $title
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataType whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataType whereUpdatedAt($value)
 */
	class DataType extends \Eloquent {}
}

namespace App{
/**
 * App\Document
 *
 * @property int $id
 * @property int $document_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereDocumentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereUpdatedAt($value)
 */
	class Document extends \Eloquent {}
}

namespace App{
/**
 * App\DocumentProperty
 *
 * @property int $id
 * @property string $title
 * @property string $default_value
 * @property string $input_type
 * @property int $level
 * @property int $document_type
 * @property int $is_setting
 * @property int $should_be_validated
 * @property string $validation_rules
 * @property int $is_key
 * @property int $is_fillable
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentProperty whereDefaultValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentProperty whereDocumentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentProperty whereInputType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentProperty whereIsFillable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentProperty whereIsKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentProperty whereIsSetting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentProperty whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentProperty whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentProperty whereShouldBeValidated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentProperty whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentProperty whereValidationRules($value)
 */
	class DocumentProperty extends \Eloquent {}
}

namespace App{
/**
 * App\DocumentPropertyValue
 *
 * @property int $id
 * @property string|null $value
 * @property int|null $property
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentPropertyValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentPropertyValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentPropertyValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentPropertyValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentPropertyValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentPropertyValue whereProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentPropertyValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentPropertyValue whereValue($value)
 */
	class DocumentPropertyValue extends \Eloquent {}
}

namespace App{
/**
 * App\DocumentType
 *
 * @property int $id
 * @property string $title
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentType whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DocumentType whereUpdatedAt($value)
 */
	class DocumentType extends \Eloquent {}
}

namespace App{
/**
 * App\Navigation
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Navigation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Navigation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Navigation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Navigation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Navigation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Navigation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Navigation whereUpdatedAt($value)
 */
	class Navigation extends \Eloquent {}
}

namespace App{
/**
 * App\NavigationItem
 *
 * @property int $id
 * @property int $navigation
 * @property string $link_type
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItem whereLinkType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItem whereNavigation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItem whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItem whereUpdatedAt($value)
 */
	class NavigationItem extends \Eloquent {}
}

namespace App{
/**
 * App\NavigationItemProperty
 *
 * @property int $id
 * @property string $title
 * @property string $default_value
 * @property string $input_type
 * @property int $level
 * @property int $navigation
 * @property int|null $is_setting
 * @property string|null $link_type
 * @property int $should_be_validated
 * @property string $validation_rules
 * @property int $is_key
 * @property int $is_fillable
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereDefaultValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereInputType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereIsFillable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereIsKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereIsSetting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereLinkType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereNavigation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereShouldBeValidated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NavigationItemProperty whereValidationRules($value)
 */
	class NavigationItemProperty extends \Eloquent {}
}

namespace App{
/**
 * App\ObjectType
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ObjectType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ObjectType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ObjectType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ObjectType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ObjectType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ObjectType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ObjectType whereUpdatedAt($value)
 */
	class ObjectType extends \Eloquent {}
}

namespace App{
/**
 * App\Procedure
 *
 * @property int $id
 * @property int $service_type
 * @property int $next_on_success
 * @property int $next_on_fail
 * @property string $route
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure whereNextOnFail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure whereNextOnSuccess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure whereServiceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Procedure whereUpdatedAt($value)
 */
	class Procedure extends \Eloquent {}
}

namespace App{
/**
 * App\Relation
 *
 * @property int $id
 * @property string|null $title
 * @property int $relation_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relation whereRelationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Relation whereUpdatedAt($value)
 */
	class Relation extends \Eloquent {}
}

namespace App{
/**
 * App\RelationProperty
 *
 * @property int $id
 * @property string $title
 * @property string $default_value
 * @property string $input_type
 * @property int $level
 * @property int $relation_type
 * @property int|null $is_setting
 * @property int $should_be_validated
 * @property string $validation_rules
 * @property int $is_key
 * @property int $is_fillable
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationProperty whereDefaultValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationProperty whereInputType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationProperty whereIsFillable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationProperty whereIsKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationProperty whereIsSetting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationProperty whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationProperty whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationProperty whereRelationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationProperty whereShouldBeValidated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationProperty whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationProperty whereValidationRules($value)
 */
	class RelationProperty extends \Eloquent {}
}

namespace App{
/**
 * App\RelationPropertyValue
 *
 * @property int $id
 * @property string|null $value
 * @property int|null $property
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationPropertyValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationPropertyValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationPropertyValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationPropertyValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationPropertyValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationPropertyValue whereProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationPropertyValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationPropertyValue whereValue($value)
 */
	class RelationPropertyValue extends \Eloquent {}
}

namespace App{
/**
 * App\RelationType
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationType whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RelationType whereUpdatedAt($value)
 */
	class RelationType extends \Eloquent {}
}

namespace App{
/**
 * App\Service
 *
 * @property int $id
 * @property int $service_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereServiceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereUpdatedAt($value)
 */
	class Service extends \Eloquent {}
}

namespace App{
/**
 * App\ServiceProperty
 *
 * @property int $id
 * @property string $title
 * @property string $default_value
 * @property string $input_type
 * @property int $level
 * @property int $service_type
 * @property int|null $is_setting
 * @property int $should_be_validated
 * @property string $validation_rules
 * @property int $is_key
 * @property int $is_fillable
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceProperty whereDefaultValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceProperty whereInputType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceProperty whereIsFillable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceProperty whereIsKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceProperty whereIsSetting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceProperty whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceProperty whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceProperty whereServiceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceProperty whereShouldBeValidated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceProperty whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceProperty whereValidationRules($value)
 */
	class ServiceProperty extends \Eloquent {}
}

namespace App{
/**
 * App\ServicePropertyValue
 *
 * @property int $id
 * @property string|null $value
 * @property int|null $property
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicePropertyValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicePropertyValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicePropertyValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicePropertyValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicePropertyValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicePropertyValue whereProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicePropertyValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicePropertyValue whereValue($value)
 */
	class ServicePropertyValue extends \Eloquent {}
}

namespace App{
/**
 * App\ServiceType
 *
 * @property int $id
 * @property string $title
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceType whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServiceType whereUpdatedAt($value)
 */
	class ServiceType extends \Eloquent {}
}

namespace App{
/**
 * App\Template
 *
 * @property int $id
 * @property string $title
 * @property string $widget
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Template newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Template newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Template query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Template whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Template whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Template whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Template whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Template whereWidget($value)
 */
	class Template extends \Eloquent {}
}

namespace App{
/**
 * App\TemplateProperty
 *
 * @property int $id
 * @property string $title
 * @property string $default_value
 * @property string $input_type
 * @property int $level
 * @property int $template
 * @property int|null $is_setting
 * @property string|null $keys
 * @property int $should_be_validated
 * @property string $validation_rules
 * @property int $is_key
 * @property int $is_fillable
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereDefaultValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereInputType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereIsFillable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereIsKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereIsSetting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereKeys($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereShouldBeValidated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemplateProperty whereValidationRules($value)
 */
	class TemplateProperty extends \Eloquent {}
}

namespace App{
/**
 * App\Translation
 *
 * @property int $id
 * @property string|null $locale
 * @property string|null $table
 * @property string|null $field
 * @property int|null $record
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereField($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereRecord($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereTable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Translation whereValue($value)
 */
	class Translation extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property int $user_type
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUserType($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\UserProperty
 *
 * @property int $id
 * @property string $title
 * @property string $default_value
 * @property string $input_type
 * @property int $level
 * @property int $user_type
 * @property int $is_setting
 * @property int $should_be_validated
 * @property string $validation_rules
 * @property int $is_key
 * @property int $is_fillable
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereDefaultValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereInputType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereIsFillable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereIsKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereIsSetting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereShouldBeValidated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereUserType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserProperty whereValidationRules($value)
 */
	class UserProperty extends \Eloquent {}
}

namespace App{
/**
 * App\UserPropertyValue
 *
 * @property int $id
 * @property string|null $value
 * @property int|null $property
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserPropertyValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserPropertyValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserPropertyValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserPropertyValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserPropertyValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserPropertyValue whereProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserPropertyValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserPropertyValue whereValue($value)
 */
	class UserPropertyValue extends \Eloquent {}
}

namespace App{
/**
 * App\UserType
 *
 * @property int $id
 * @property string $title
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserType whereUpdatedAt($value)
 */
	class UserType extends \Eloquent {}
}

namespace App{
/**
 * App\Widget
 *
 * @property int $id
 * @property string|null $view
 * @property string|null $route
 * @property int|null $object_type
 * @property int|null $object_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Widget newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Widget newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Widget query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Widget whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Widget whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Widget whereObjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Widget whereObjectType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Widget whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Widget whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Widget whereView($value)
 */
	class Widget extends \Eloquent {}
}

namespace App{
/**
 * App\WidgetPart
 *
 * @property int $id
 * @property int|null $widget
 * @property int|null $widget_part_type
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPart query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPart whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPart whereWidget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPart whereWidgetPartType($value)
 */
	class WidgetPart extends \Eloquent {}
}

namespace App{
/**
 * App\WidgetPartType
 *
 * @property int $id
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPartType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPartType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPartType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPartType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPartType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPartType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WidgetPartType whereUpdatedAt($value)
 */
	class WidgetPartType extends \Eloquent {}
}

