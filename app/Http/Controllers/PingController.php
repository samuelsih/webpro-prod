<?php

namespace App\Http\Controllers;

use App\Events\UserWantToPing;
use App\Http\Requests\StorePingRequest;
use App\Models\Debt;
use App\Models\Ping;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StorePingRequest $request)
    {
        $req = $request->validated();
        $req['from_id'] = Auth::id();
        $req['id'] = (string) Str::uuid();

        $isDebtorExists = Debt::where('from_id', $req['from_id'])
                                ->where('deleted_at', null)
                                ->where('to_id', $req['to_id'])
                                ->count('id');

        if($isDebtorExists == 0)
        {
            return redirect()->back()->withErrors(['to_id' => 'Unknown Debtor']);
        }

        $ping = Ping::create($req);
        
        UserWantToPing::dispatch($ping);

        return redirect()->route('user.index');
    }

}
