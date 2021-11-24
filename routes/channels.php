<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('messages.admin.{id}', function ($admin, $id) {
    return (int)$admin->id === (int) $id;
});

Broadcast::channel('messages.marketer.{id}', function ($marketer, $id) {
    return (int)$marketer->id === (int) $id;
});
