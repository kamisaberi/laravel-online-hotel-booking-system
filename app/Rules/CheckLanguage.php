<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use LanguageDetection\Language;

class CheckLanguage implements Rule
{

    protected $locale;
    protected $locales;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($locales, $locale)
    {
        $this->locale = $locale;
        $this->locales = $locales;
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

        $dl = new Language($this->locales);
        $result = $dl->detect($value);
        $max_key = '';
        $max_value = 0;
        foreach ($result as $k => $v) {
            if ($v > $max_value) {
                $max_value = $v;
                $max_key = $k;
            }
        }

        return $max_key == $this->locale ? true : false;
        //
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.custom.mobile.check_language');
    }
}
