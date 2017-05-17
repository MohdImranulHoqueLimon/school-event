<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Name
                    <span class="required" aria-required="true"> * </span>
                </label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', isset($user) ? $user->name: null) }}"
                        required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>
        </div>
        @if (!isset($user))
        <div class="col-md-6">
            <div class="form-group">
                <label for="username" class="control-label">Username
                    @if (!isset($user)) <span class="required" aria-required="true"> * </span> @endif
                </label>
                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}"
                       {{isset($user) ? '':'required'}} autofocus>
                <span class="help-block">
                    {{isset($user) ? 'Left it blank if you do not want to change!!!':'by default: 123456;'}}
                </span>
                @if ($errors->has('username'))
                    <span class="help-block">
                        {{ $errors->first('username') }}
                    </span>
                @endif
            </div>
        </div>
        @endif
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="email" class="control-label">Phone
                    <span class="required" aria-required="true"> * </span>
                </label>
                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone', isset($user) ? $user->phone:null) }}"
                       required autofocus>
                @if ($errors->has('phone'))
                    <span class="help-block">
                        {{ $errors->first('phone') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email" class="control-label">Email
                    <span class="required" aria-required="true"> * </span>
                </label>
                <input id="email" type="text" class="form-control" name="email" value="{{ old('email', isset($user) ? $user->email:null) }}"
                        required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="password" class="control-label">Password
                    @if (!isset($user)) <span class="required" aria-required="true"> * </span> @endif
                </label>
                <input id="password" type="password" class="form-control" name="password" value="{{ old('password', isset($user) ? '':'123456') }}"
                       {{isset($user) ? '':'required'}} autofocus>
                <span class="help-block">
                    {{isset($user) ? 'Left it blank if you do not want to change!!!':'by default: 123456;'}}
                </span>
                @if ($errors->has('email'))
                    <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="status" class="control-label">Status</label>

                <select name="status" id="status" class="form-control">
                    @foreach(\App\Support\Configs\Constants::$user_status as $status)
                        <option value="{{$status}}"
                                @if (isset($user) && ($user->status === $status)) selected @endif>{{$status}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="role" class="control-label">Assign Role(s)</label>
            <div class="mt-checkbox-list" data-error-container="#form_2_services_error">
                @foreach($roles as $role)
                    <label class="mt-checkbox">
                        <input value="{{$role->id}}" name="roles[]"
                               @if ((isset($user)) && in_array($role->id, $userRoles)) checked @endif
                               type="checkbox"> {{ $role->name }}
                        <span></span>
                    </label>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">

    </div>
</div>
<div class="form-actions right">
    <a href="{{route('users.index')}}" class="btn default">Cancel</a>
    <button type="submit" class="btn blue">
        <i class="fa fa-check"></i> Save</button>
</div>