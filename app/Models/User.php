<?php

namespace App\Models;

use Vis\Builder\User as UserBuilder;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string|null $image
 * @property array|null $permissions
 * @property string|null $last_login
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Cartalyst\Sentinel\Activations\EloquentActivation|null $activation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Cartalyst\Sentinel\Activations\EloquentActivation> $activations
 * @property-read int|null $activations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Group> $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Cartalyst\Sentinel\Persistences\EloquentPersistence> $persistences
 * @property-read int|null $persistences_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Cartalyst\Sentinel\Reminders\EloquentReminder> $reminders
 * @property-read int|null $reminders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Group> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Cartalyst\Sentinel\Throttling\EloquentThrottle> $throttle
 * @property-read int|null $throttle_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends UserBuilder
{
}
