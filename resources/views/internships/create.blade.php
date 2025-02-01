<x-app-layout>
    <div class="container-fluid">
        @if ($errors->has('participations'))
            <div class="alert alert-danger mt-5">
                <ul>
                    @foreach ($errors->get('participations') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('internships.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Add Internship</h5>

                    <form action="{{ route('internships.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="letter_date" class="form-label">Letter Date</label>
                            <input type="date" name="letter_date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="institution_name" class="form-label">Institution Name</label>
                            <input type="text" name="institution_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="major" class="form-label">Prodi / Jurusan</label>
                            <input type="text" name="major" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="participant_count" class="form-label">Jumlah Peserta</label>
                            <input type="number" name="participant_count" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="division_id" class="form-label">Penempatan</label>
                            <select name="division_id" class="form-control">
                                <option value="">Select Division</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" name="start_date" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" name="end_date" class="form-control">
                        </div>

                        <!-- Checkbox for Request Letter -->
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="request_letter" id="request_letter"
                                value="1">
                            <label class="form-check-label" for="request_letter">Request Letter</label>
                        </div>

                        <!-- Checkbox for Acceptance Letter -->
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="acceptance_letter"
                                id="acceptance_letter" value="1">
                            <label class="form-check-label" for="acceptance_letter">Acceptance Letter</label>
                        </div>

                        <!-- Checkbox for Kesbangpol Letter -->
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="kesbangpol_letter"
                                id="kesbangpol_letter" value="1">
                            <label class="form-check-label" for="kesbangpol_letter">Kesbangpol Letter</label>
                        </div>

                        <div class="mb-3">
                            <label for="contact_person" class="form-label">Contact Person</label>
                            <input type="text" name="contact_person" class="form-control" required>
                        </div>

                        <button type="button" id="add-participation-btn" class="btn btn-success mt-3">Add
                            Participation</button>
                </div>
            </div>

            <!-- Button to Add New Participant Form -->

            {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif --}}


            <!-- Section for Participations -->
            <div class="row" id="participations-section">
                <!-- Form peserta pertama -->
                <div class="col-md-6">
                    <div class="card my-3">
                        <div class="card-body">
                            <h6>Participant 1</h6>
                            <div class="mb-3">
                                <label for="participation_name" class="form-label">Name</label>
                                <input type="text" name="participations[0][name]" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="participation_email" class="form-label">Email</label>
                                <input type="email" name="participations[0][email]" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="participation_address" class="form-label">Address</label>
                                <input type="text" name="participations[0][address]" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="participation_date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" name="participations[0][date_of_birth]" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="participation_phone" class="form-label">Phone</label>
                                <input type="text" name="participations[0][phone]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary mt-4">Submit</button>
            <a href="{{ route('internships.index') }}" class="btn btn-secondary ms-2 mt-4">Cancel</a>
    </div>
    </div>
    </form>
    </div>

    <script>
        document.getElementById('add-participation-btn').addEventListener('click', function () {
            // Get the current number of participant forms (based on col-md-6)
            const participationCount = document.querySelectorAll('#participations-section .col-md-6').length;

            // Create a new participation form (using col-md-6)
            const newParticipationForm = document.createElement('div');
            newParticipationForm.classList.add('col-md-6'); // Add col-md-6 class to create a new column

            newParticipationForm.innerHTML = `
            <div class="card my-3">
                <div class="card-body">
                    <h6>Participant ${participationCount + 1}</h6>
                    <div class="mb-3">
                        <label for="participation_name" class="form-label">Name</label>
                        <input type="text" name="participations[${participationCount}][name]" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="participation_email" class="form-label">Email</label>
                        <input type="email" name="participations[${participationCount}][email]" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="participation_address" class="form-label">Address</label>
                        <input type="text" name="participations[${participationCount}][address]" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="participation_date_of_birth" class="form-label">Date of Birth</label>
                        <input type="date" name="participations[${participationCount}][date_of_birth]" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="participation_phone" class="form-label">Phone</label>
                        <input type="text" name="participations[${participationCount}][phone]" class="form-control">
                    </div>
                </div>
            </div>
        `;

            // Append the new form to the participations section inside row
            document.getElementById('participations-section').appendChild(newParticipationForm);
        });
    </script>


</x-app-layout>