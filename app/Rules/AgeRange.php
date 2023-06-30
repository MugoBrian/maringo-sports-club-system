<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\Rule;

class AgeRange implements Rule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    protected $minAge;
    protected $maxAge;

    public function __construct($minAge, $maxAge)
    {
        $this->minAge = $minAge;
        $this->maxAge = $maxAge;
    }

    public function passes($attribute, $value)
    {
        $dob = Carbon::parse($value);
        $age = $dob->age;

        return $age >= $this->minAge && $age <= $this->maxAge;
    }

    public function message()
    {
        return 'The age must be between ' . $this->minAge . ' and ' . $this->maxAge . ' years.';
    }
}
