<select name="select_change_attr" data-url="{{ $url }}" class="form-control">
    @foreach ( $tmplSelectOption as $key => $val)
    @php
       
        $xhtmlSelected = '';
        if ($key == $currentValue) $xhtmlSelected = 'selected="selected"';
    @endphp
        <option value="{{ $key }}" {{ $xhtmlSelected }}>{{ $val }}</option>
    @endforeach
</select>