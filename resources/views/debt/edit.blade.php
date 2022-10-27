<x-main>
    <div class="container mx-auto h-screen text-gray-900">
        <x-navbar />
        <section class="mt-4 flex flex-col justify-center items-center text-gray-900">
            <h3 class="normal-case text-4xl font-bold text-gray-900">Set Debt For Other People</h3>
            <form class="space-y-4 mt-4" action={{ route('debt.update', ['debt' => $debt->id]) }} method="POST">
                @method('PATCH')
                @csrf
                <div class="form-control w-full max-w-md">
                    <label class="label" for="amount">
                        <span class="label-text text-gray-900">Amount</span>
                    </label>
                    <input name="amount" type="number" min="500" placeholder="Amount" class="w-full max-w-md" value="{{ old('amount', $debt->amount) }}"/>
                    @error('amount')
                        <span>{{ $message }}</span>
                    @enderror

                    <label class="label" for="description">
                        <span class="label-text text-gray-900">Description</span>
                    </label>
                    <textarea name="description" cols="50" rows="10" class="textarea bg-white border border-gray-600">{{ old('description', $debt->description) }}</textarea>
                    @error('description')
                        <span>{{ $message }}</span>
                    @enderror

                    <label class="label">
                        <span class="label-text text-gray-900">Who is this debt for?</span>
                    </label>
                    <input type="text" class="w-full max-w-md" value="{{ old('amount', $debt->to->name) }}" disabled/>

                </div>
                <button class="btn text-gray-50" type="submit">Create</button>
            </form>
        </section>
    </div>
</x-main>


