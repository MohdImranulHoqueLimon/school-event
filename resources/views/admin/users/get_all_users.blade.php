  <!-- BEGIN GLOBAL MANDATORY STYLES -->

  {!! Html::style('assets/admin/global/plugins/bootstrap/css/bootstrap.min.css') !!}
  {!! Html::style('assets/admin/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}
  
  <div class="portlet-body" style="background-color:#fff;">      
    <table style="background-color:#fff;">
            <tr>
                <th style="border-bottom: 1px solid #ccc;margin-bottom: 10px;">Serial No.</th>
                <th style="border-bottom: 1px solid #ccc;margin-bottom: 10px;">Name</th>
                <th style="border-bottom: 1px solid #ccc">Profession</th>
                <th style="border-bottom: 1px solid #ccc">Batch</th>
                <th style="border-bottom: 1px solid #ccc">Phone</th>
                <th style="border-bottom: 1px solid #ccc">Email</th>
                <th style="border-bottom: 1px solid #ccc">City</th>
                <th style="border-bottom: 1px solid #ccc">Image</th>

            </tr>
            <?php 
            $i = 0;
            foreach($users as $user) { 
                $i++;
                ?>


            <tr style="border:1px solid">
                <td style="border-bottom: 1px solid #ccc;margin-bottom: 10px;">{{$i}}</td>
                <td style="border-bottom: 1px solid #ccc;margin-bottom: 10px;">{{$user->name}}</td>
                <td style="border-bottom: 1px solid #ccc;margin-bottom: 10px;">{{$user->profession}}</td>
                <td style="border-bottom: 1px solid #ccc;margin-bottom: 10px;">{{$user->batch}}</td>
                <td style="border-bottom: 1px solid #ccc;margin-bottom: 10px;">{{$user->phone}}</td>
                <td style="border-bottom: 1px solid #ccc;margin-bottom: 10px;">{{$user->email}}</td>
                <td style="border-bottom: 1px solid #ccc;margin-bottom: 10px;">{{$user->city}}</td>
                <td style="border-bottom: 1px solid #ccc;margin-bottom: 10px;">
                   @if(isset($user->user_image) && $user->user_image != null)
                   <img alt="Profile Image" style="height: 320px;width: 400px;border:none !important" class="" src="{{ url('/images/avatar/normal_images/' . $user->user_image)}}">
                   @endif
               </td>

           </tr>
           <?php } ?>

   </table>
</div>
