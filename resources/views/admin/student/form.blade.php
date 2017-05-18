<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="full_name" class="control-label">Full Name
                    <span class="required" aria-required="true"> * </span>
                </label>
                <input id="full_name" type="text" class="form-control" name="full_name"
                       @if(isset($student)) value="{{$student->email}}" @endif required autofocus>
                @if ($errors->has('full_name'))
                    <span class="help-block">{{ $errors->first('full_name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="username" class="control-label">Username
                    @if (!isset($user)) <span class="required" aria-required="true"> * </span> @endif
                </label>
                <input id="username" type="text" class="form-control" name="username"
                       @if(isset($student)) value="{{$student->username}}" @endif required autofocus>
                <span class="help-block">
                </span>
                @if ($errors->has('username'))
                    <span class="help-block">{{ $errors->first('username') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="phone" class="control-label">Phone
                    <span class="required" aria-required="true"> * </span>
                </label>
                <input id="phone" type="text" class="form-control" name="phone"
                       @if(isset($student)) value="{{$student->phone}}" @endif required autofocus>
                @if ($errors->has('phone'))
                    <span class="help-block">{{ $errors->first('phone') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email" class="control-label">Email
                    <span class="required" aria-required="true"> * </span>
                </label>
                <input id="email" type="text" class="form-control" name="email"
                       @if(isset($student)) value="{{$student->email}}" @endif
                       required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="address" class="control-label">Address
                    <span class="required" aria-required="true"> * </span>
                </label>
                <input id="address" type="text" class="form-control" name="phone"
                       @if(isset($student)) value="{{$student->address}}" @endif required autofocus>
                @if ($errors->has('address'))
                    <span class="help-block">{{ $errors->first('address') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="city" class="control-label">City
                    <span class="required" aria-required="true"> * </span>
                </label>
                <input id="city" type="text" class="form-control" name="city"
                       @if(isset($student)) value="{{$student->city}}" @endif
                       required autofocus>
                @if ($errors->has('city'))
                    <span class="help-block">{{ $errors->first('city') }}</span>
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
                       @if(isset($student)) value="{{$student->password}}" @endif
                       {{isset($user) ? '':'required'}} autofocus>
                <span class="help-block">
                    {{isset($user) ? 'Left it blank if you do not want to change!!!':'by default: 123456;'}}
                </span>
                @if ($errors->has('email'))
                    <span class="help-block">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="status" class="control-label">Status</label>

                <select name="status" id="status" class="form-control">
                    @foreach(\App\Support\Configs\Constants::$student_status as $status)
                        <option value="{{$status}}"
                                @if(isset($student->status) && $student->status == $status) selected @endif>
                            @if($status == 1) Active @else Inactive @endif
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
