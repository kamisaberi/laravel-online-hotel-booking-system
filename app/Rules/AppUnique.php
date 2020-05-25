<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AppUnique implements Rule
{
    protected $base_type;
    protected $id;
    protected $property_id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($base_type, $id, $property_id)
    {
        $this->base_type = $base_type;
        $this->id = $id;
        $this->property_id = $property_id;
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $assigned_properties = [];
        if ($this->id == 0) {

            $assigned_properties = \DB::table($this->base_type . '_assigned_properties')
                ->where('property', '=', $this->property_id)
                ->where('value', '=', $value)
                ->get();

        } else {

            $assigned_properties = \DB::table($this->base_type . '_assigned_properties')
                ->where($this->base_type, '!=', $this->id)
                ->where('property', '=', $this->property_id)
                ->where('value', '=', $value)
                ->get();
        }


        return count($assigned_properties) == 0 ? true : false;
        //
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.custom.mobile.app_unique');
    }
}
