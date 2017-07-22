<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group ">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                         style="width: 200px; height: 150px;">
                        @if(isset($user->user_image) && $user->user_image != null)
                            <img alt="" class="" src="{{ url('/images/avatar/thumbnail_images/' . $user->user_image)}}">
                        @endif
                    </div>
                    <div>
                        <span class="btn red btn-outline btn-file">
                            <span class="fileinput-new"> Select image </span>
                            <span class="fileinput-exists"> Change </span>
                            <input type="file" name="user_image">
                        </span>
                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
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
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">Full Name
                    <span class="required" aria-required="true"> * </span>
                </label>
                <input id="name" type="text" class="form-control" name="name"
                       value="{{ old('name', isset($user) ? $user->name: null) }}"
                       required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="profession" class="control-label">Profession
                    <span class="required" aria-required="true"> * </span>
                </label>
                <input id="profession" type="text" class="form-control" name="profession"
                       value="{{ old('profession', isset($user) ? $user->profession: null) }}"
                       required autofocus>
                @if ($errors->has('profession'))
                    <span class="help-block">
                        {{ $errors->first('profession') }}
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label for="email" class="control-label">Phone
                    <span class="required" aria-required="true"> * </span>
                </label>
                <input id="phone" type="text" class="form-control" name="phone"
                       value="{{ old('phone', isset($user) ? $user->phone:null) }}"
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
                <label for="email" class="control-label">Emergency Phone
                    
                </label>
                <input id="emergency_phone" type="text" class="form-control" name="emergency_phone"
                       value="{{ old('emergency_phone', isset($user) ? $user->emergency_phone:null) }}" autofocus>
                @if ($errors->has('emergency_phone'))
                    <span class="help-block">
                        {{ $errors->first('emergency_phone') }}
                    </span>
                @endif
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label for="batch" class="control-label">Batch
                    <span class="required" aria-required="true"> * </span>
                </label>
                <select name="batch" class="form-control">
                    <option value=""> --- Select --- </option>
                    @for($i = date('Y'); $i >= 1947; $i--)
                        <option value="{{ $i }}"
                                @if(isset($user) && isset($user->batch) && $user->batch == $i) selected @endif>
                            {!! $i !!}
                        </option>
                    @endfor
                </select>
                @if ($errors->has('batch'))
                    <span class="help-block">
                        {{ $errors->first('batch') }}
                    </span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="email" class="control-label">Email
                    <span class="required" aria-required="true"> * </span>
                </label>
                <input id="email" type="text" class="form-control" name="email"
                       value="{{ old('email', isset($user) ? $user->email:null) }}"
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

                <label for="country" class="control-label">Country
                    <span class="required" aria-required="true"> * </span>
                </label>

                <select id="country" type="text" class="form-control" name="country" required>
                    <option value="">--Select Country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country['country_name'] }}"
                                @if(isset($countries) && isset($user) && $country['country_name'] == $user->country) selected @endif>
                            {{ $country['country_name'] }}
                        </option>
                    @endforeach
                </select>

                @if ($errors->has('country'))
                    <span class="help-block">
                        {{ $errors->first('country') }}
                    </span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="city" class="control-label">Present City
                    <span class="required" aria-required="true"> * </span>
                </label>
                <input id="city" type="text" class="form-control" name="city"
                       @if(isset($user)) value="{{$user->city}}" @endif
                       required autofocus>
                @if ($errors->has('city'))
                    <span class="help-block">{{ $errors->first('city') }}</span>
                @endif
            </div>
        </div>

        {{--<div class="col-md-3">
            <div class="form-group">
                <label for="permanent_city" class="control-label">Permanent City
                    <span class="required" aria-required="true"> * </span>
                </label>
                <input id="permanent_city" type="text" class="form-control" name="permanent_city"
                       @if(isset($user)) value="{{$user->permanent_city}}" @endif
                       required autofocus>
                @if ($errors->has('permanent_city'))
                    <span class="help-block">{{ $errors->first('permanent_city') }}</span>
                @endif
            </div>
        </div>--}}
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="address" class="control-label">Present Address
                    <span class="required" aria-required="true"> * </span>
                </label>
                <input id="address" type="text" class="form-control" name="address"
                       @if(isset($user)) value="{{$user->address}}" @endif required autofocus>
                @if ($errors->has('address'))
                    <span class="help-block">{{ $errors->first('address') }}</span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="permanent_address" class="control-label">Permanent Address
                    <span class="required" aria-required="true"> * </span>
                </label>
                <input id="permanent_address" type="text" class="form-control" name="permanent_address"
                       @if(isset($user)) value="{{$user->address}}" @endif required autofocus>
                @if ($errors->has('permanent_address'))
                    <span class="help-block">{{ $errors->first('permanent_address') }}</span>
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
                <input id="password" type="password" class="form-control" name="password"
                       value="{{ old('password', isset($user) ? '':'123456') }}"
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
                        <option value="{{$status}}" @if (isset($user) && ($user->status === $status)) selected @endif>
                            {!! \App\Support\Configs\Constants::$user_status_name[$status] !!}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>


    <div class="row">

    </div>
</div>
<div class="form-actions right">
    <a href="{{route('users.index')}}" class="btn default">Cancel</a>
    <button type="submit" class="btn blue">
        <i class="fa fa-check"></i> Save
    </button>
</div>