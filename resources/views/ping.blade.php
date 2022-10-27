<x-main>
    <div class="container mx-auto h-screen text-gray-900">
        <x-navbar />
        <section class="mt-4 flex flex-col justify-center items-center text-gray-900">
            <h3 class="normal-case text-4xl font-bold text-gray-900">Ping Debtor</h3>
            <p class="normal-case text-xl font-bold text-gray-900">Debtor will get nofitication</p>
            <form class="space-y-4 mt-4" action={{ route('ping.store') }} method="POST">
                @csrf
                <div class="form-control w-full max-w-md">
                    <label class="label" for="message">
                        <span class="label-text text-gray-900">Message</span>
                    </label>
                    <textarea name="message" cols="50" rows="10" class="textarea bg-white border border-gray-600">{{ old('message', 'BRING BACK MY MONEY!!!!') }}</textarea>
                    @error('message')
                        <span>{{ $message }}</span>
                    @enderror

                    <label class="label" for="to_id">
                        <span class="label-text text-gray-900">Ping Message To</span>
                    </label>
                    <select name="to_id" id="list_user" class="select w-full max-w-md">
                        <option value=''>-- Select user --</option>
                    </select>
                    @error('to_id')
                        <span>{{ $message }}</span>
                    @enderror

                </div>
                <button class="btn text-gray-50" type="submit">Send Ping</button>
            </form>
        </section>
    </div>

    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){

          $( "#list_user" ).select2({
            ajax: {
              url: "{{ route('user.debtor-list') }}",
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


