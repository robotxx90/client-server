<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Items;

class ApiController extends Controller
{

    public function index(Request $request)
    {
        $json = [];
        try {
            if (!isset($request->cmd))
            {
                throw new \Exception('Parametr `cmd` wymagany');
            }
            switch ($request->cmd)
            {
                default:
                    throw new \Exception('Brak komendy');
                    break;
                case 'all-items':
                    $json['items'] = Items::where(function($q) use ($request) {
                                if (isset($request->amount))
                                {
                                    $a = '=';
                                    if (isset($request->amount_where) && preg_match('/^(\<|\>)$/', $request->amount_where, $param))
                                    {
                                        $a = $param[1];
                                    }
                                    $q->where('amount', $a, strval($request->amount));
                                }
                            })->get();
                    $json['success'] = true;
                    break;
                case 'delete':
                    if (!isset($request->id))
                    {
                        throw new \Exception('Brak parametru id');
                    }
                    Items::where('id', strval($request->id))->delete();
                    $json['success'] = true;
                    break;
                case 'add':
                    $validator = Validator::make($request->all(), [
                                'name' => 'required',
                                'amount' => 'required|integer'
                    ]);
                    if ($validator->fails())
                    {
                        throw new Exception("Wypełnij wszystkie dane!");
                    }
                    $item = Items::create([
                                'name' => trim($request->name),
                                'amount' => strval($request->amount)
                    ]);
                    $json['id'] = $item->id;
                    $json['success'] = true;
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
