<?php

namespace Danielrhodeswarp\Portolan\Http\Controllers;

use Illuminate\Http\Request;

use Config;
use DB;

use Danielrhodeswarp\Portolan\Http\Requests;
use Danielrhodeswarp\Portolan\Http\Controllers\Controller;

class ConnectController extends Controller
{
    //
    public function postConnect(Request $request)
    {
        //create a custom DB config based on supplied values
        //and see if it works
        
        $random = mt_rand(1111, 9999);
        
        //config array
        $configArray = array(
                'driver'    => $request->input('driver'),
                'host'      => $request->input('host'),
                'database'  => $request->input('database'),
                'username'  => $request->input('username'),
                'password'  => $request->input('password'),
                
                //MySQL sensible defaults
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
                'strict'    => false,
                
                //PostgreSQl sensible defaults
                'charset'  => 'utf8',
                'prefix'   => '',
                'schema'   => 'public',
            );
        
        //register the connection
        Config::set("database.connections.{$random}", $configArray);
        
        //bomb out if specified connection is problematic in any way
        //TODO make RDBMS agnostic
        try {
            $schemasInConnection = DB::connection($random)->select('SHOW SCHEMAS');
            
        } catch (\PDOException $exception) {
            //DUMP($exception->getMessage());
            
            return redirect()->route('welcome')->with('message', 'Nope! Failed to connect.');
            
        }
        //DUMP(DB::connection($random));
        //save connection name to session
        $request->session()->put('db-connection-deets', /*DB::connection($random)*/$configArray);
        $request->session()->put('db-connection-name', $random);
        $request->session()->put('db-current-schema', $request->input('database'));
        
        return redirect()->route('dashboard.get-dashboard')->with('message', 'Connection successful!');
        
        
    }
}
