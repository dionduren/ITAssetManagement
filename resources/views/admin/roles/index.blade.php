@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Roles Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
@endsection

@section('subcontent')
    <div class="intro-y mt-8">
        <h2 class="text-lg font-medium">Manage Roles</h2>
    </div>

    <!-- Add Role Button -->
    <div class="mt-4">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#roleModal" id="open-create-modal">
            Add Role
        </button>
    </div>

    <!-- Roles Table -->
    <div class="intro-y box mt-5 p-5">
        <div id="tabulator"></div>
    </div>

    <!-- Bootstrap Modal for Create & Edit -->
    <div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="roleModalLabel">Add Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="role-form">
                        @csrf
                        <input type="hidden" id="role-id">

                        <div class="mb-3">
                            <label for="role-name" class="form-label">Role Name</label>
                            <input type="text" id="role-name" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="role-description" class="form-label">Description</label>
                            <textarea id="role-description" name="description" class="form-control"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@pushOnce('styles')
    @vite('resources/css/vendors/tabulator.css')
@endPushOnce

@pushOnce('vendors')
    @vite('resources/js/vendors/tabulator.js')
@endPushOnce

@pushOnce('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @vite('resources/js/pages/admin/user_roles.js')
@endPushOnce
