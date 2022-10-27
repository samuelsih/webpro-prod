<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Http\Requests\StoreDebtRequest;
use App\Http\Requests\UpdateDebtRequest;
use Illuminate\Support\Facades\Auth;

class DebtController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('debt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDebtRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDebtRequest $request)
    {
        $req = $request->validated();

        $req['from_id'] = Auth::id();

        Debt::create($req);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function show(Debt $debt)
    {
        return view('debt.show', compact('debt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function edit(Debt $debt)
    {
        return view('debt.edit', compact('debt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDebtRequest  $request
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDebtRequest $request, Debt $debt)
    {
        $req = $request->validated();

        Debt::where('id', $debt->id)->update($req);

        // $debt->update

        return redirect()->route('debt.show', $debt->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Debt $debt)
    {
        $debt->delete();

        return redirect()->route('user.index');
    }
}
