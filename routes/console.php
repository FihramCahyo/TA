<?php

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\DB;

$schedule = new Schedule();

$schedule->call(function () {
    DB::table('voting_users')->delete();
})->dailyAt('17:04');
