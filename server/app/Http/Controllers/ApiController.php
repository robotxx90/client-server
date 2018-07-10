<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;

class ApiController extends Controller
{

    public function index(Request $request)
    {
        $json = [];
        try {
            if (!isset($request['cmd']))
            {
                throw new \Exception('Parametr `cmd` wymagany');
            }
            switch ($request['cmd'])
            {
                default:
                    throw new \Exception('Brak komendy');
                    break;
                case 'all-items':
                    $json['items'] = Items::where(function($q) use ($request) {
                                if (isset($request['amount']))
                                {
                                    $a = '=';
                                    if (isset($request['amount_where']) && preg_match('/^(\<|\>)$/', $request['amount_where'], $param))
                                    {
                                        $a = $param[1];
                                    }
                                    $q->where('amount', $a, strval($request['amount']));
                                }
                            })->get();
                    break;
            }
        }
        catch (\Exception $ex) {
            $json = [];
            $json['success'] = false;
            $json['message'] = $ex->getMessage();
        }
        return response()->json($json);
    }

}
