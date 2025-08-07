<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />

        <div class="px-5 py-4 container-fluid">
            <div class="mt-4 row">
                <div class="col-12">

                    @if (session('success'))
                        <div class="alert alert-success" role="alert" id="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert" id="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="pb-0 card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5>Accomplishment Management</h5>
                                    <p class="mb-0 text-sm">
                                        Manage members' achievements here.
                                    </p>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="btn btn-dark btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#accomplishmentModal">
                                        <i class="fas fa-plus me-2"></i> Add Accomplishment
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table text-secondary text-center">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase font-weight-bold">ID</th>
                                        <th class="text-uppercase font-weight-bold">Member</th>
                                        <th class="text-uppercase font-weight-bold">Event</th>
                                        <th class="text-uppercase font-weight-bold">Level</th>
                                        <th class="text-uppercase font-weight-bold">Type</th>
                                        <th class="text-uppercase font-weight-bold">Organizer</th>
                                        <th class="text-uppercase font-weight-bold">Rank</th>
                                        <th class="text-uppercase font-weight-bold">Award</th>
                                        <th class="text-uppercase font-weight-bold">Start Date</th>
                                        <th class="text-uppercase font-weight-bold">End Date</th>
                                        <th class="text-uppercase font-weight-bold">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($accomplishments as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->member->full_name ?? '-' }}</td>
                                            <td>{{ $item->event_name }}</td>
                                            <td>{{ $item->level }}</td>
                                            <td>{{ $item->type }}</td>
                                            <td>{{ $item->organizer }}</td>
                                            <td>{{ $item->rank }}</td>
                                            <td>{{ $item->awards['type'] ?? '-' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->start_date)->format('d M Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->end_date)->format('d M Y') }}</td>
                                            <td>
                                                <a href="#" class="edit-btn" data-id="{{ $item->id }}"
                                                    data-member_id="{{ $item->member_id }}"
                                                    data-category="{{ $item->category }}"
                                                    data-event_name="{{ $item->event_name }}"
                                                    data-level="{{ $item->level }}" data-type="{{ $item->type }}"
                                                    data-organizer="{{ $item->organizer }}"
                                                    data-rank="{{ $item->rank }}"
                                                    data-award_type="{{ $item->awards['type'] ?? '' }}"
                                                    data-start_date="{{ $item->start_date }}"
                                                    data-end_date="{{ $item->end_date }}"
                                                    data-barcode_trophy="{{ $item->barcode_trophy }}"
                                                    data-street="{{ $item->street }}"
                                                    data-province="{{ $item->province }}"
                                                    data-zip_code="{{ $item->zip_code }}"
                                                    data-country="{{ $item->country }}"
                                                    data-condition="{{ $item->condition }}"
                                                    data-notes="{{ $item->notes }}" data-bs-toggle="modal"
                                                    data-bs-target="#accomplishmentModal">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="#"><i class="fas fa-trash text-danger"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @include('pages.accomplishment.modal')

                </div>
            </div>
        </div>
        <script>
            document.querySelectorAll('.edit-btn').forEach(function(button) {
                button.addEventListener('click', function() {
                    const form = document.getElementById('accomplishmentForm');
                    form.action = '/accomplishment/' + this.dataset.id; // edit ke /accomplishment/{id}

                    // Gunakan PUT untuk update
                    const methodInput = document.createElement('input');
                    methodInput.setAttribute('type', 'hidden');
                    methodInput.setAttribute('name', '_method');
                    methodInput.setAttribute('value', 'PUT');
                    form.appendChild(methodInput);

                    // Isi field form
                    document.getElementById('accomplishment_id').value = this.dataset.id;
                    document.getElementById('member_id').value = this.dataset.member_id;
                    document.getElementById('event_name').value = this.dataset.event_name;
                    document.getElementById('level').value = this.dataset.level;
                    document.getElementById('type').value = this.dataset.type;
                    document.getElementById('organizer').value = this.dataset.organizer;
                    document.getElementById('rank').value = this.dataset.rank;
                    document.getElementById('award_type').value = this.dataset.award_type;
                    document.getElementById('start_date').value = this.dataset.start_date;
                    document.getElementById('end_date').value = this.dataset.end_date;
                });
            });
        </script>


        <x-app.footer />
    </main>
</x-app-layout>
