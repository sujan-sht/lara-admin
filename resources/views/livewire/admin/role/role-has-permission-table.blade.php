<div>
    <!-- Standard modal -->
    {{-- <div class="d-flex justify-content-between mb-3">
        <h4>All Permisions for {{$role->name}}</h4>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#module-permission">Create Module Permission</button>
    </div> --}}

    <table id="basic-datatable" class="table nowrap w-100">
        <thead>
            <tr>
                <th> # </th>
                <th>Module</th>
                <th>Browse</th>
                <th>Read</th>
                <th>Edit</th>
                <th>Add</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (!is_null($role->permissions))
                @foreach ($role->permissions as $permission)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$permission->model}}</td>
                        <td>
                            <input type="checkbox" wire:model="browse" value="1">
                        </td>
                        <td>
                            <input type="checkbox" wire:model="read" value="1">
                        </td>
                        <td>
                            <input type="checkbox" wire:model="edit" value="1">
                        </td>
                        <td>
                            <input type="checkbox" wire:model="add" value="1">
                        </td>
                        <td>
                            <input type="checkbox" wire:model="delete" value="1">
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{-- <div id="module-permission" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="module-permissionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="module-permissionLabel">Create Permission</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <label for="module">Select Module for making BREAD permissions</label>
                        <select name="module" class="select2 form-control" data-toggle="select2" data-placeholder="Select Module ...">
                            <option selected disabled>Select Module...</option>

                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Make Permission</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal --> --}}
</div>
