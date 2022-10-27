<x-main>
    <div class="container mx-auto h-screen text-gray-900">
        <x-navbar />

        <section class="mt-4 flex flex-col justify-center items-center space-y-4">
            <div class="mb-2 text-center">
                <h3 class="normal-case text-4xl font-bold text-gray-900">Your Debts</h3>
                <h6 class="normal-case text-xl font-semibold text-gray-900">This is your debts</h6>
            </div>

            <div class="stats stats-vertical lg:stats-horizontal shadow">
                <div class="stat">
                  <div class="stat-title">Total Debts</div>
                  <div class="stat-value">{{ $user->allDebts->sum('amount') }}</div>
                  <div class="stat-desc">this is your total debts for all time</div>
                </div>

                <div class="stat">
                  <div class="stat-title">Unpaid Debts</div>
                  <div class="stat-value">{{ $user->hasDebts->sum('amount') }}</div>
                  <div class="stat-desc">this is your total debts for current time</div>
                </div>

                <div class="stat">
                  <div class="stat-title">Debt To (people)</div>
                  <div class="stat-value">{{ $user->hasDebts->count('from_id') }}</div>
                  <div class="stat-desc">you are currently debt to {{ $user->hasDebts->count('from_id') }} people</div>
                </div>
            </div>

            <section class="mt-4">
                @if($debts->isEmpty())
                <div class="mx-auto text-center mt-[50%] md:mt-[40%] lg:mt-[20%]">
                    <h1 class="text-5xl font-bold">You have no debt!</h1>
                    <p class="text-xl py-6">Keep up your streak!!</p>
                </div>

                @else
                    <div class="mb-2 text-center mt-8">
                        <h3 class="normal-case text-4xl font-bold text-gray-900">List of Your Debts</h3>
                    </div>
                    <div class="grid grid-cols-2 grid-flow-row gap-4 md:grid-cols-3 xl:grid-cols-4">
                        @foreach ($debts as $debt)
                        <div class="stats shadow">

                            <div class="stat">
                              <div class="stat-title">{{ $debt->from->name }}</div>
                              <div class="stat-value">{{ $debt->amount }}</div>
                            </div>

                          </div>
                        @endforeach
                    </div>
                @endif

            </section>
        </section>
    </div>

</x-main>
