<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AppPropertyUnique implements Rule
{
    protected $base_type;
    protected $type;
    protected $id;

    /**
     * Create a new rule instance.
     *
     * @param $base_type
     * @param int $id
     */
    public function __construct($base_type, $type, $id = 0)
    {
        $this->base_type = $base_type;
        $this->type = $type;
        $this->id = $id;
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
        $props = [];
        $tp_id = 0;
        if ($this->id == 0) {

            $tp = \DB::table($this->base_type . '_types')
                ->where('title', '=', $this->type)
                ->get();
            if (count($tp) == 0)
                return false;
            else
                $tp_id = $tp[0]->id;

            $props = \DB::table($this->base_type . '_properties')
                ->where('title', '=', $value)
                ->where('type', '=', $tp_id)
                ->get();

        } else {


        }

        return count($props) == 0 ? true : false;
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
