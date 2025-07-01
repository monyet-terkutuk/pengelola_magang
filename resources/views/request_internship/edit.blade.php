<x-app-layout>
    <div class="container-fluid">
        <form action="{{ route('request-internship.update', $internship->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Update Internship</h5>



                    <div class="mb-3">
                        <label for="letter_date" class="form-label">Letter Date</label>
                        <input type="date" name="letter_date" class="form-control"
                            value="{{ $internship->letter_date }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="institution_name" class="form-label">Institution Name</label>
                        <input type="text" name="institution_name" class="form-control"
                            value="{{ $internship->institution_name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="major" class="form-label">Major</label>
                        <input type="text" name="major" class="form-control" value="{{ $internship->major }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="participant_count" class="form-label">Participant Count</label>
                        <input type="number" name="participant_count" class="form-control"
                            value="{{ $internship->participant_count }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="division_id" class="form-label">Division</label>
                        <select name="division_id" class="form-control">
                            <option value="">Select Division</option>
                            @foreach ($divisions as $division)
                                <option value="{{ $division->id }}" {{ $division->id == $internship->division_id ? 'selected' : '' }}>
                                    {{ $division->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{ $internship->start_date }}">
                    </div>

                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control" value="{{ $internship->end_date }}">
                    </div>

                    <!-- Request Letter Checkbox -->
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="request_letter" id="request_letter"
                            value="1" {{ $internship->request_letter ? 'checked' : '' }}>
                        <label class="form-check-label" for="request_letter">
                            Request Letter
                        </label>
                    </div>

                    <!-- Acceptance Letter Checkbox -->
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="acceptance_letter" id="acceptance_letter"
                            value="1" {{ $internship->acceptance_letter ? 'checked' : '' }}>
                        <label class="form-check-label" for="acceptance_letter">
                            Acceptance Letter
                        </label>
                    </div>

                    <!-- Kesbangpol Letter Checkbox -->
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="kesbangpol_letter" id="kesbangpol_letter"
                            value="1" {{ $internship->kesbangpol_letter ? 'checked' : '' }}>
                        <label class="form-check-label" for="kesbangpol_letter">
                            Kesbangpol Letter
                        </label>
                    </div>

                    <div class="mb-3">
                        <label for="contact_person" class="form-label">Contact Person</label>
                        <input type="text" name="contact_person" class="form-control"
                            value="{{ $internship->contact_person }}">
                    </div>

                    <button type="button" class="btn btn-secondary" id="add-participant">Add Participant</button>

                </div>
            </div>
            <div class="row" id="participants">
                <!-- Form peserta pertama -->
                <div class="col-md-6">
                    <div class="card my-3">
                        <div class="card-body">
                            @foreach ($internship->participations as $index => $participation)
                                <div class="participant-form">
                                    <h6>Participant {{ $index + 1 }}</h6>
                                    <input type="hidden" name="participations[{{ $index }}][id]"
                                        value="{{ $participation->id }}">
                                    <div class="mb-3">
                                        <label for="participation_name_{{ $index }}" class="form-label">Name</label>
                                        <input type="text" name="participations[{{ $index }}][name]"
                                            id="participation_name_{{ $index }}" class="form-control"
                                            value="{{ $participation->name }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="participation_email_{{ $index }}" class="form-label">Email</label>
                                        <input type="email" name="participations[{{ $index }}][email]"
                                            id="participation_email_{{ $index }}" class="form-control"
                                            value="{{ $participation->email }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="participation_address_{{ $index }}" class="form-label">Address</label>
                                        <input type="text" name="participations[{{ $index }}][address]"
                                            id="participation_address_{{ $index }}" class="form-control"
                                            value="{{ $participation->address }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="participation_date_of_birth_{{ $index }}" class="form-label">Date of
                                            Birth</label>
                                        <input type="date" name="participations[{{ $index }}][date_of_birth]"
                                            id="participation_date_of_birth_{{ $index }}" class="form-control"
                                            value="{{ $participation->date_of_birth }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="participation_phone_{{ $index }}" class="form-label">Phone</label>
                                        <input type="text" name="participations[{{ $index }}][phone]"
                                            id="participation_phone_{{ $index }}" class="form-control"
                                            value="{{ $participation->phone }}">
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('request-internship.index') }}" class="btn btn-secondary ms-2">Cancel</a>

        </form>
    </div>

    <script>
        document.getElementById('add-participant').addEventListener('click', function () {
            var index = document.querySelectorAll('.participant-form').length;
            var participantsDiv = document.getElementById('participants');
            var newParticipantDiv = document.createElement('div');
            newParticipantDiv.classList.add('col-md-6');

            newParticipantDiv.innerHTML = `
            <div class="card my-3">
                <div class="card-body">
                <h6>Participant ${index + 1}</h6>
                <div class="mb-3">
                    <label for="participation_name_${index}" class="form-label">Name</label>
                    <input type="text" name="participations[${index}][name]" id="participation_name_${index}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="participation_email_${index}" class="form-label">Email</label>
                    <input type="email" name="participations[${index}][email]" id="participation_email_${index}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="participation_address_${index}" class="form-label">Address</label>
                    <input type="text" name="participations[${index}][address]" id="participation_address_${index}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="participation_date_of_birth_${index}" class="form-label">Date of Birth</label>
                    <input type="date" name="participations[${index}][date_of_birth]" id="participation_date_of_birth_${index}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="participation_phone_${index}" class="form-label">Phone</label>
                    <input type="text" name="participations[${index}][phone]" id="participation_phone_${index}" class="form-control">
                </div>
                </div>
                </div>

            `;

            participantsDiv.appendChild(newParticipantDiv);
        });
    </script>
</x-app-layout>