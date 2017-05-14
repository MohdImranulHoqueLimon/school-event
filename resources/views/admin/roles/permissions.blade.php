<form action="{{route('roles.permissions.store', $role->id)}}" method="POST">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Assign Permission</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">

                {{csrf_field()}}
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th></th>
                    </tr>

                    @forelse($permissions as $permission)
                        <tr>
                            <td>{{$permission->name}}</td>
                            <td><input type="checkbox" name="permissions[]"
                                @if (in_array($permission->id, $rolePermissions))
                                       checked
                                       @endif
                                       value="{{$permission->id}}"/></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">
                                There is no permission.
                            </td>
                        </tr>
                    @endforelse
                </table>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn blue">Save changes</button>
    </div>
</form>