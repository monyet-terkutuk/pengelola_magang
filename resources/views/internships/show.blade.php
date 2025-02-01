<x-app-layout>
    <div class="container-fluid">
        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Internship Details</h5>

                <!-- Internship Details -->
                <div class="mb-3">
                    <strong>Letter Date:</strong>
                    <p>{{ $internship->letter_date }}</p>
                </div>

                <div class="mb-3">
                    <strong>Institution Name:</strong>
                    <p>{{ $internship->institution_name }}</p>
                </div>

                <div class="mb-3">
                    <strong>Major:</strong>
                    <p>{{ $internship->major }}</p>
                </div>

                <div class="mb-3">
                    <strong>Participant Count:</strong>
                    <p>{{ $internship->participant_count }}</p>
                </div>

                <div class="mb-3">
                    <strong>Division:</strong>
                    <p>{{ $internship->division ? $internship->division->name : 'Not Assigned' }}</p>
                </div>

                <div class="mb-3">
                    <strong>Start Date:</strong>
                    <p>{{ $internship->start_date }}</p>
                </div>

                <div class="mb-3">
                    <strong>End Date:</strong>
                    <p>{{ $internship->end_date }}</p>
                </div>

                <!-- Checkbox Data -->
                <div class="mb-3">
                    <strong>Request Letter:</strong>
                    <p>{{ $internship->request_letter ? 'Yes' : 'No' }}</p>
                </div>

                <div class="mb-3">
                    <strong>Acceptance Letter:</strong>
                    <p>{{ $internship->acceptance_letter ? 'Yes' : 'No' }}</p>
                </div>

                <div class="mb-3">
                    <strong>Kesbangpol Letter:</strong>
                    <p>{{ $internship->kesbangpol_letter ? 'Yes' : 'No' }}</p>
                </div>

                <div class="mb-3">
                    <strong>Contact Person:</strong>
                    <p>{{ $internship->contact_person }}</p>
                </div>

                <!-- Participants List -->
                <h5 class="fw-semibold mb-4 mt-5">Participants</h5>

                @if ($internship->participations->isEmpty())
                    <p>No participants added yet.</p>
                @else
                    <div class="row">
                        @foreach ($internship->participations as $index => $participant)
                            <div class="col-md-6">
                                <div class="card my-3">
                                    <div class="card-body">
                                        <h6>Participant {{ $index + 1 }}</h6>
                                        <div class="mb-3">
                                            <strong>Name:</strong>
                                            <p>{{ $participant->name }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <strong>Email:</strong>
                                            <p>{{ $participant->email }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <strong>Address:</strong>
                                            <p>{{ $participant->address }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <strong>Date of Birth:</strong>
                                            <p>{{ $participant->date_of_birth }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <strong>Phone:</strong>
                                            <p>{{ $participant->phone }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('internships.index') }}" class="btn btn-secondary">Back to Internship List</a>
        </div>
    </div>
</x-app-layout>