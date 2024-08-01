<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dummy;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as RouteFacade;

class UserController extends Controller
{
    /**
     * function run_cache()
     * How to save the DB query saved in Cache for specif seconds time
     */
    function run_cache(Request $request)
    {
        /* Remove All Cache */
        // Cache::flush();

        /* Check Cache is saved or not */
        if (Cache::has('users')) {
            echo "Saved.";
        } else {
            echo "No Saved.";
        }
        // die();

        /* Run the query with cache and save for specif 10min time saved cache */
        $data = Cache::remember('users', 60 * 5, function () {
            return Dummy::all();
        });

        echo "<pre>";
        print_r($data->toArray());
        die(' => ');
    }
}
