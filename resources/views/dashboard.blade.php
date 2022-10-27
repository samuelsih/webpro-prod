<x-main>
    <div class="container mx-auto h-screen">
        <x-navbar />

        {{-- ping --}}
        @forelse($notifications as $notification)
            <div class="alert shadow-lg mt-4">
                <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div>
                    <h3 class="font-bold">{{ $notification->data['message'] }}</h3>
                    <div class="text-xs">Ping from {{ $notification->data['from_name'] }}</div>
                </div>
                </div>
                <div class="flex-none">
                    <a class="btn btn-sm btn-primary mark-as-read" href="#" data-id="{{ $notification->id }}">Mark as read</a>
                </div>
            </div>
        @empty
            <div></div>
        @endforelse

        <section class="mt-4">
            @if($data->isEmpty())
            <div class="mx-auto text-center mt-[50%] md:mt-[40%] lg:mt-[20%]">
                <h1 class="text-5xl font-bold">No One Debts To You</h1>
                <p class="text-xl py-6">either you have no money, or you're just a stingy person &#128541</p>
            </div>
            @else
                <div class="mb-8">
                    <h3 class="normal-case text-4xl font-bold text-gray-900">Debt List</h3>
                    <h6 class="normal-case text-xl font-semibold text-gray-900">Here is the people that has debts to you.</h6>
                </div>

                <div class="grid grid-cols-2 grid-flow-row gap-4 md:grid-cols-3 xl:grid-cols-4">
                    @foreach ($data as $d)
                        <x-card
                            name="{{ $d->name }}"
                            amount="{{ $d->amount }}"
                            linkto="{{ route('debt.show', ['debt' => $d->did]) }}"
                        />
                    @endforeach
                </div>
            @endif

        </section>
    </div>

    <script type="text/javascript">
        function sendMark(idDelete = null) {
            return $.ajax({
                    type:'POST',
                    url:"{{ route('user.mark-notification') }}",
                    data:{
                        id: idDelete
                    },
                })
        }

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".mark-as-read").click(function() {
                let request = sendMark($(this).data('id'));

                request.done(() => {
                    $(this).parents('div.alert').remove();
                });
            });
    </script>

    {{-- <script>
        $(function () {
            $('.mark-as-read').click(function() {
                // $.ajax({
                //     url: `{{ route('user.mark-notification') }}`,
                //     type: 'post',
                //     data: {
                //         name:'yogesh',
                //         salary: 35000,email: 'yogesh@makitweb.com'},
                // });

                $.ajax({
                    type: "POST",
                    url: "{{ route('user.mark-notification') }}",
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'id': $(this).data('id')
                    }
                });
            });
        });
    </script> --}}
</x-main>

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
