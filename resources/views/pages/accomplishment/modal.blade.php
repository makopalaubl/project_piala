<!-- accomplishment/modal.blade.php -->

<div class="modal fade" id="accomplishmentModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="margin-left: 27%">
        <div class="modal-content">
            <form id="accomplishment-form" method="POST" action="{{ route('accomplishment.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="accomplishment-modal-title">Add Accomplishment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    @include('pages.accomplishment.form')
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="submit-btn" class="btn btn-primary">
                        <span class="spinner-border spinner-border-sm d-none" id="submit-spinner" role="status"
                            aria-hidden="true"></span>
                        <span id="submit-text">Save</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            const form = document.getElementById('accomplishment-form');
            const submitBtn = document.getElementById('submit-btn');
            const spinner = document.getElementById('submit-spinner');
            const submitText = document.getElementById('submit-text');

            // Reset form & error saat modal ditutup
            $('#accomplishmentModal').on('hidden.bs.modal', function() {
                form.reset();
                document.getElementById('accomplishment-modal-title').innerText = 'Add Accomplishment';
                form.setAttribute('action', `{{ route('accomplishment.store') }}`);
                form.querySelector('input[name="_method"]')?.remove();
                submitText.innerText = 'Save';
                submitBtn.disabled = false;
                spinner.classList.add('d-none');
                document.querySelectorAll('small.text-danger').forEach(el => el.innerText = '');
            });

            // Handle klik edit
            $('.btn-edit').on('click', function() {
                const id = $(this).data('id');

                fetch(`/accomplishment/${id}`, {
                        headers: {
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => {
                        if (!res.ok) throw new Error('Data not found');
                        return res.json();
                    })
                    .then(data => {
                        // Ubah title
                        document.getElementById('accomplishment-modal-title').innerText =
                            'Edit Accomplishment';
                        submitText.innerText = 'Update';

                        // Set action to PUT
                        form.setAttribute('action', `/accomplishment/${id}`);
                        if (!form.querySelector('input[name="_method"]')) {
                            const methodInput = document.createElement('input');
                            methodInput.type = 'hidden';
                            methodInput.name = '_method';
                            methodInput.value = 'PUT';
                            form.appendChild(methodInput);
                        }

                        // Isi form sesuai ID field
                        document.getElementById('event_name').value = data.event_name;
                        document.getElementById('level').value = data.level;
                        document.getElementById('type').value = data.type;
                        document.getElementById('organizer').value = data.organizer;
                        document.getElementById('rank').value = data.rank;
                        document.getElementById('awards').value = data.awards?.type ?? '';
                        document.getElementById('start_date').value = data.start_date;
                        document.getElementById('end_date').value = data.end_date;
                        document.getElementById('member_id').value = data.member_id;
                        document.getElementById('category').value = data.category;
                        document.getElementById('barcode_trophy').value = data.barcode_trophy;
                        document.getElementById('street').value = data.street;
                        document.getElementById('province').value = data.province;
                        document.getElementById('zip_code').value = data.zip_code;
                        document.getElementById('country').value = data.country;
                        document.getElementById('condition').value = data.condition;
                        document.getElementById('notes').value = data.notes;

                        $('#accomplishmentModal').modal('show');
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Gagal mengambil data.');
                    });
            });

            // Handle delete
            $('.btn-delete').on('click', function() {
                const id = $(this).data('id');

                if (confirm('Yakin ingin menghapus data ini?')) {
                    fetch(`/accomplishment/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            }
                        })
                        .then(res => {
                            if (res.ok) {
                                alert('Data berhasil dihapus!');
                                window.location.reload();
                            } else {
                                alert('Gagal menghapus data!');
                            }
                        })
                        .catch(err => {
                            console.error(err);
                            alert('Terjadi kesalahan saat menghapus.');
                        });
                }
            });
        });
    </script>
@endpush
