<option value="">Select State</option>
@foreach($state as $thisState)
    <option value="{{$thisState->id}}"
        @if($selectedVal == $thisState->id)
            selected="selected"
        @endif
    >
        {{$thisState->name}}
    </option>
@endforeach