<x-app-layout>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Edit Division</h5>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('divisions.update', $division->id) }}" method="POST">
                            @csrf
                            @method('PUT') <!-- Menandakan bahwa ini adalah request untuk update data -->

                            <div class="mb-3">
                                <label for="name" class="form-label">Division Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $division->name) }}" required>
                                @error('name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description"
                                    rows="3">{{ old('description', $division->description) }}</textarea>
                                @error('description')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('divisions.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>