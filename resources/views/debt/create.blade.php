<x-main>
    <div class="container mx-auto h-screen text-gray-900">
        <x-navbar />
        <section class="mt-4 flex flex-col justify-center items-center text-gray-900">
            <h3 class="normal-case text-4xl font-bold text-gray-900">Set Debt For Other People</h3>
            <form class="space-y-4 mt-4" action={{ route('debt.store') }} method="POST">
                @csrf
                <div class="form-control w-full max-w-md">
                    <label class="label" for="amount">
                        <span class="label-text text-gray-900">Amount</span>
                    </label>
                    <input name="amount" type="number" min="500" placeholder="Amount" class="w-full max-w-md" value="{{ old('amount') }}"/>
                    @error('amount')
                        <span>{{ $message }}</span>
                    @enderror

                    <label class="label" for="description">
                        <span class="label-text text-gray-900">Description</span>
                    </label>
                    <textarea name="description" cols="50" rows="10" class="textarea bg-white border border-gray-600">{{ old('description', 'You grab my money') }}</textarea>
                    @error('description')
                        <span>{{ $message }}</span>
                    @enderror

                    <label class="label" for="to_id">
                        <span class="label-text text-gray-900">Who is this debt for?</span>
                    </label>
                    <select name="to_id" id="list_user" class="select w-full max-w-md">
                        <option value=''>-- Select user --</option>
                    </select>
                    @error('to_id')
                        <span>{{ $message }}</span>
                    @enderror

                </div>
                <button class="btn text-gray-50" type="submit">Create</button>
            </form>
        </section>
    </div>

    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){

          $( "#list_user" ).select2({
            ajax: {
              url: "{{ route('user.list') }}",
              type: "post",
              dataType: 'json',
              delay: 250,
              data: function (params) {
                return {
                  _token: CSRF_TOKEN,
                  search: params.term // search term
                };
              },
              processResults: function (response) {
                return {
                  results: response
                };
              },
              cache: true
            }

          });

        });
    </script>
</x-main>


