<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('demo-channel', function ($user) {
    return true;
});

Broadcast::channel('role.recruiter', function ($user) {
    return $user->isRecruiter();
});

Broadcast::channel('role.candidate', function ($user) {
    return $user->isCandidate();
});

