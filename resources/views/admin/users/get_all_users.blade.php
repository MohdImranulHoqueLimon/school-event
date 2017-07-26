  <!-- BEGIN GLOBAL MANDATORY STYLES -->
   
    {!! Html::style('assets/admin/global/plugins/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('assets/admin/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}
  
                                <table class="table table-striped table-bordered table-hover table-checkable order-column"
                                       id="sample_1" style="overflow-x: scroll !important; min-width: 1300px !important;">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Profession</th>
                                        <th>Batch</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th >City</th>
                                        <th>Image</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)

                                        <?php
                                        ?>

                                        <tr class="odd gradeX">
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->profession}}</td>
                                            <td>{{$user->batch}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{$user->city}}</td>
                                            <td>
                                                 @if(isset($user->user_image) && $user->user_image != null)
                                                <img alt="Profile Image" style="height: 320px;width: 400px" class="" src="{{ url('/images/avatar/normal_images/' . $user->user_image)}}">
                                                @endif
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                  
                                    </tbody>
                                </table>
                            