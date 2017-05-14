<form action="{{route('users.roles.store', $user->id)}}" method="POST">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Assign Role(s)</h4>
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

                    @forelse($roles as $role)
                        <tr>
                            <td>{{$role->name}}</td>
                            <td><input type="checkbox" name="roles[]"
                                @if (in_array($role->id, $userRoles))
                                       checked
                                       @endif
                                       value="{{$role->id}}"/></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">
                                There is no role.
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