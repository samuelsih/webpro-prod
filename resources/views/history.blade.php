<x-main>
    <div class="container mx-auto h-screen text-gray-900">
        <x-navbar />

        <div class="text-center my-8">
            <h3 class="normal-case text-4xl font-bold text-gray-900 text-center">Debt History</h3>
            <p class="text-xl py-6">a history of people that takes debts to you in the past and paid you the debt</p>
        </div>

        <div class="overflow-x-auto">
            <table class="table w-full">
              <!-- head -->
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Amount</th>
                  <th>Mark As Paid</th>
                  <th><p class="ml-4">Description</p></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $d)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->amount }}</td>
                        <td>{{ date('d-m-Y h:m:s', strtotime($d->deleted_at)) }}</td>
                        <td>
                            <label for="my-modal" class="btn btn-ghost modal-button">Click to see</label>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>

            {{ $data->links() }}
        </div>
    </div>

    <input type="checkbox" id="my-modal" class="modal-toggle" />
    <div class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Description</h3>
        <p class="py-4">{{ $d->description }}</p>
        <div class="modal-action">
        <label for="my-modal" class="btn btn-primary">Close</label>
        </div>
    </div>
    </div>
</x-main>
