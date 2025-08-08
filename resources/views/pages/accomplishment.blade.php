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
                                                <a href="javascript:void(0)" class="text-info me-2 btn-edit"
                                                    data-id="{{ $item->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                {{-- <a href="{{ route('accomplishment.generateQr', $item->id) }}" class="text-primary me-2" target="_blank" title="QR Code">
                                                    <i class="fas fa-qrcode"></i>
                                                </a> --}}

                                                <a href="{{ route('accomplishment.public', $item->id) }}"
                                                    target="_blank" title="Open Public Page">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <a href="{{ route('accomplishment.generateQr', $item->id) }}"
                                                    target="_blank" title="QR Code">
                                                    <i class="fas fa-qrcode"></i>
                                                </a>

                                                <a href="javascript:void(0)" class="text-danger btn-delete"
                                                    data-id="{{ $item->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
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
            document.addEventListener('DOMContentLoaded', function() {
                const canvas = document.getElementById('myChart');
                if (canvas) {
                    const ctx = canvas.getContext('2d');
                    // lanjutkan pakai Chart.js atau gambar di canvas
                }
            });
        </script>

        <x-app.footer />
    </main>
</x-app-layout>
