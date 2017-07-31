

                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered table-striped">
                                    <tr><th>Full Name</th> <td>{{$user->name}}</td></tr>
                                    <tr><th>Batch</th> <td>{{$user->batch}}</td></tr>
                                    <tr><th>Profession</th> <td>{{$user->profession}}</td></tr>
                                    <tr><th>Email</th> <td>{{$user->email}}</td></tr>
                                    <tr><th>Phone</th> <td>{{$user->phone}}</td></tr>
                                    <tr><th>Emergency Phone</th> <td>{{$user->emergency_phone}}</td></tr>
                                    <tr><th>Country</th> <td>{{$user->country}}</td></tr>
                                    <tr><th>Present Address</th> <td>{{$user->address}}</td></tr>
                                    <tr><th>Permanent Address</th> <td>{{$user->permanent_address}}</td></tr>
                                    <tr><th>Present City</th> <td>{{ $user->city}}</td></tr>
                                    <tr><th>Permanent City</th> <td>{{ $user->permanent_city}}</td></tr>
                                    <tr><th>Status</th> <td>@if($user->status == 1) Active @else Inactive @endif</td></tr>
                                    <tr><th>Registration Amount Paid</th>
                                        <td>
                                            @if(!empty($user->registration_payment->amount))
                                                {!! $user->registration_payment->amount !!}
                                            @else N/A
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                @if(isset($user->user_image) && $user->user_image != null)
                                <img alt="" class="" src="{{ url('/images/avatar/thumbnail_images/' . $user->user_image)}}">
                                @endif
                            </div>
                        </div>

                        