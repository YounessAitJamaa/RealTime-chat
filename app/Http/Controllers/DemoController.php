<?php

namespace App\Http\Controllers;

use App\Events\DemoEvent;

class DemoController extends Controller
{
    public function fire()
    {
        event(new DemoEvent('Hello from Laravel RealTime', 'recruiter'));
        event(new DemoEvent('Hello from Laravel RealTime', 'candidate'));

        return 'Event fired';
    }
}
