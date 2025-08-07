<!-- accomplishment/modal.blade.php -->

<div class="modal fade" id="accomplishmentModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="margin-left: 27%">
        <div class="modal-content">
            <form id="accomplishment-form" method="POST" action="{{ route('accomplishment.store') }}">
                @csrf
                <input type="hidden" name="_method" id="form-method" value="POST">

                <div class="modal-header">
                    <h5 class="modal-title">Add Accomplishment</h5>
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

            if (!form) return;

            // Saat klik tombol edit
            $('.edit-btn').on('click', function() {
                const btn = $(this);

                form.member_id.value = btn.data('member_id');
                form.category.value = btn.data('category');
                form.event_name.value = btn.data('event_name');
                form.level.value = btn.data('level');
                form.type.value = btn.data('type');
                form.organizer.value = btn.data('organizer');
                form.start_date.value = btn.data('start_date');
                form.end_date.value = btn.data('end_date');

                // Ubah form ke mode EDIT
                form.setAttribute('action', `/accomplishment/${btn.data('id')}`);
                document.getElementById('form-method').value = 'PUT';
                submitText.innerText = 'Update';
            });


            // Reset error + form saat modal ditutup
            $('#accomplishmentModal').on('hidden.bs.modal', function() {
                form.reset();
                document.querySelectorAll('small.text-danger').forEach(el => el.innerText = '');

                // Kembalikan action ke route store
                form.setAttribute('action', '{{ route('accomplishment.store') }}');
                document.getElementById('form-method').value = 'POST';

                // Ubah tombol kembali
                submitText.innerText = 'Save';
            });


            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const url = form.getAttribute('action');
                const token = form.querySelector('input[name="_token"]').value;
                const formData = new FormData(form);

                // Clear error
                document.querySelectorAll('small.text-danger').forEach(el => el.innerText = '');

                // Disable button & show loading
                submitBtn.disabled = true;
                spinner.classList.remove('d-none');
                submitText.innerText = 'Saving...';

                fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json',
                        },
                        body: formData
                    })
                    .then(async res => {
                        const data = await res.json();
                        if (res.ok) {
                            alert('Berhasil menambahkan!');
                            $('#accomplishmentModal').modal('hide');
                            window.location.reload();
                        } else if (data.errors) {
                            for (let field in data.errors) {
                                const el = document.getElementById('error-' + field.replace(/\./g,
                                    '_'));
                                if (el) el.innerText = data.errors[field][0];
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error submitting form:', error);
                        alert('Terjadi kesalahan saat menyimpan data.');
                    })
                    .finally(() => {
                        // Enable button & hide loading
                        submitBtn.disabled = false;
                        spinner.classList.add('d-none');
                        submitText.innerText = 'Save';
                    });
            });
        });
    </script>
@endpush
