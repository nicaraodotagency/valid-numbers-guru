<?php

namespace App\Http\Controllers;

use App\Models\Number;
use App\Models\NumberList;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function numberListsResults(Request $request)
    {
        $numberList = NumberList::where('format_validator_list_id', $request->list_id)->first();

        foreach ($request->result as $numberResult) {
            $number = Number::where('number_list_id',$numberList->id)->where('number', $numberResult['phoneNumber'])->first();
            $number->result = $numberResult["result"];
            $number->save();
        }

        return response()->json([
            'ok' => true
        ]);
    }
}
