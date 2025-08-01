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
                                    <a href="#" class="btn btn-dark btn-primary">
                                        <i class="fas fa-plus me-2"></i> Add Accomplishment
                                    </a>
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
                                        <th class="text-uppercase font-weight-bold">Class</th>
                                        <th class="text-uppercase font-weight-bold">Organizer</th>
                                        <th class="text-uppercase font-weight-bold">Rank</th>
                                        <th class="text-uppercase font-weight-bold">Award</th>
                                        <th class="text-uppercase font-weight-bold">Date</th>
                                        <th class="text-uppercase font-weight-bold">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($accomplishments as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->member->full_name ?? '-' }}</td>
                                            <td>{{ $item->event_name }}</td>
                                            <td>{{ $item->level }}</td>
                                            <td>{{ $item->class }}</td>
                                            <td>{{ $item->organizer }}</td>
                                            <td>{{ $item->rank }}</td>
                                            <td>
                                                {{ $item->awards['type'] ?? '-' }}
                                            </td>
                                            <td>{{ $item->day }}/{{ $item->month }}/{{ $item->year }}</td>
                                            <td>
                                                <a href="#"><i class="fas fa-edit"></i></a>
                                                <a href="#"><i class="fas fa-trash text-danger"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <x-app.footer />
    </main>
</x-app-layout>