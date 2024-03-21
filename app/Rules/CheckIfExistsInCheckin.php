<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CheckIfExistsInCheckin implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(protected string $user, protected int $fastEventId)
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !DB::table('fast_events_users')
            ->where('user',  str_replace(['https://t.me/','@'], '', $this->user))
            ->where('fast_event_id', $this->fastEventId)
            ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Все нормально! Ви вже є в списку! Гарного дня!)';
    }
}
