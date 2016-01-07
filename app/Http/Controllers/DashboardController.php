<?php

namespace Danielrhodeswarp\Portolan\Http\Controllers;

use Illuminate\Http\Request;

use Config;
use DB;

use Danielrhodeswarp\Portolan\Http\Requests;
use Danielrhodeswarp\Portolan\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function getDashboard(Request $request)
    {
        //get DB connection out of session
        $connectionDeets = $request->session()->get('db-connection-deets');
        $connectionName = $request->session()->get('db-connection-name');
        $currentSchema = $request->session()->get('db-current-schema');
        
        //register the connection
        Config::set("database.connections.{$connectionName}", $connectionDeets);
        
        //TODO make RDBMS agnostic
        $schemasInConnection = DB::connection($connectionName)->select('SHOW SCHEMAS');
        
        return view('dashboard.get-dashboard', ['schemas' => $schemasInConnection,
            'currentSchema' => $currentSchema,
            'connectionName' => $connectionName,  //for debugging
            ]);
    }
    
    //
    public function getSetCurrentSchema(Request $request, $schema)
    {
        $request->session()->put('db-current-schema', $schema);
        
        return redirect()->route('dashboard.get-dashboard');
    }
}
