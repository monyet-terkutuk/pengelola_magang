<x-app-layout>



    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Division Data</h6>
                        <a href="{{ route('divisions.create') }}" class="btn btn-primary mt-3 mb-3">
                            <i class="fas fa-plus"></i> Add New Division
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
                                            Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Decription
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($divisions as $index => $division)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 mx-5">{{ $index + 1 }}</p>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $division->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="align-middle text-center mx-5">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $division->description }}</span>
                                            </td>
                                            <td class="d-flex justify-content-center align-items-center gap-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <a href="{{ route('divisions.edit', $division->id) }}" class="btn-none">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('divisions.destroy', $division->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this division?');">
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




    {{-- <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Division Data</h5>
                    <a href="{{ route('divisions.create') }}" class="btn btn-primary mt-3 mb-3">
                        <i class="fas fa-plus"></i> Add New Division
                    </a>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">No</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Description</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($divisions as $index => $division)
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">{{ $index + 1 }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{ $division->name }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $division->description }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="{{ route('divisions.edit', $division->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('divisions.destroy', $division->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this division?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i> Delete
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
    </div> --}}
</x-app-layout>