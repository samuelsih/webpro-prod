<x-main>
    <div class="container mx-auto h-screen text-gray-900">
        <x-navbar />

        <div class="text-center my-8">
            <h3 class="normal-case text-4xl font-bold text-gray-900 text-center">Leaderboard</h3>
            <p class="text-xl py-6">leaderboard for all users who debts the most</p>
        </div>

        @if($users->isEmpty())
            <div class="mx-auto text-center mt-[50%] md:mt-[40%] lg:mt-[20%]">
                <h1 class="text-5xl font-bold">No One Debts To Each Other</h1>
                <p class="text-xl py-6">Has everyone got no money to share?</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Total Debts</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $item)
                        <tr>
                            <th>{{ $users->firstItem() + $index }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->total }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $users->links() }}
        @endif

    </div>
</x-main>
