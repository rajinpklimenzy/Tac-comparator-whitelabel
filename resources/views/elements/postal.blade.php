<div class="form-group">
        <label> @lang('home.municipality') </label>
       
        <select id = "dropList" required name="subpo">
        @foreach($sub_pos1 as $sub_pos)
        
            <option value ="{{$sub_pos}}"  @if($mun==$sub_pos) selected  @endif>{{$sub_pos}}</option>

        @endforeach
        </select><br>
</div>