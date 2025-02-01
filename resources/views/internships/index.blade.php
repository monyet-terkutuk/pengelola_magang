<x-app-layout>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Internship Table</h6>
                        <a href="{{ route('internships.create') }}" class="btn btn-primary mt-3 mb-3">
                            <i class="fas fa-plus"></i> Add New Internship
                        </a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal Surat</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Institution Name
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Jumlah Peserta</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Penempatan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Pelaksanaan Magang</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kelengkapan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Contact Person</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($internships as $index => $internship)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 mx-3">{{ $index + 1 }}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($internship->letter_date)->format('j F Y') }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $internship->institution_name }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $internship->major }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $internship->participant_count }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $internship->division ? $internship->division->name : 'No Division' }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($internship->start_date)->format('j F') }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($internship->end_date)->format('j F Y') }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm  {{ $internship->documentation == 'Lengkap' ? 'bg-gradient-primary' : 'bg-gradient-secondary' }}">{{ $internship->documentation }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $internship->contact_person }}</span>
                                            </td>
                                            <td class="d-flex justify-content-center align-items-center gap-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <a href="{{ route('internships.edit', parameters: $internship->id) }}"
                                                        class="">
                                                        <i class="fas fa-edit btn-none"></i>
                                                    </a>
                                                    <form action="{{ route('internships.destroy', $internship->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this internship?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn-none">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
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
    </div>





</x-app-layout>