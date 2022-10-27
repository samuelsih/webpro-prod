<x-main>
    <div class="container mx-auto h-screen">
        <x-navbar />

        <section class="mt-4">
            <div class="mb-2">
                <h3 class="normal-case text-4xl font-bold text-gray-900">Details</h3>
                <h6 class="normal-case text-xl font-semibold text-gray-900">Here is the details you're looking for.</h6>
            </div>

            <div class="stats stats-vertical shadow flex justify center align-center">

                <div class="stat">
                  <div class="stat-title">Name</div>
                  <div class="stat-value">{{ $debt->to->name }}</div>
                </div>

                <div class="stat">
                  <div class="stat-title">Amount</div>
                  <div class="stat-value">{{ $debt->amount }}</div>
                </div>

                <div class="stat">
                  <div class="stat-title">Date of Debt</div>
                  <div class="stat-value">{{ date('d-m-Y h:m:s', strtotime($debt->created_at)) }}</div>
                </div>

                <div class="stat">
                    <div class="stat-title">Edited At</div>
                    <div class="stat-value">{{ $debt->updated_at ? date('d-m-Y h:m:s', strtotime($debt->updated_at)) : '-' }}</div>
                  </div>
              </div>
        </section>

        <section class="mt-4">
            <div class="stats stats-vertical shadow flex flex-row">
                <div class="stat">
                  <div class="stat-title">Description</div>
                  <div class="stat-value">{{ $debt->description }}</div>
                </div>
              </div>
        </section>

        <section class="mt-4 space-x-4 flex justify-center align-center">
            <a href="{{ route('debt.edit', $debt->id) }}" class="btn btn-info">Edit Debt</a>
            <label for="my-modal-3" class="btn modal-button btn-warning">Mark As Paid</label>
            <input type="checkbox" id="my-modal-3" class="modal-toggle" />
            <div class="modal">
                <div class="modal-box relative">
                    <label for="my-modal-3" class="btn btn-warning btn-sm btn-circle absolute right-2 top-2">✕</label>
                    <h3 class="text-lg font-bold mt-2">Once you set as paid, the debt will not appear in home again!</h3>
                    <div class="modal-action">
                        <form action="{{ route('debt.destroy', ['debt' => $debt->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-warning">Mark as Paid</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-main>
