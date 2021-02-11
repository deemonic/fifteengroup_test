{{ csrf_field() }}

<input id="contact_id" type="hidden" name="contact_id" value="{{ $contact }}" />

<div class="form-group{{ $errors->has('address_1') ? ' has-error' : '' }}">
    <label for="address_1" class="col-md-4 control-label">Address Line 1</label>
    <div class="col-md-12">
        <input id="address_1" type="text" class="form-control" name="address_1"
               value="{{ old('address_1', $contact_address->address_1) }}">
        @if ($errors->has('address_1'))
            <span class="help-block">
                <strong>{{ $errors->first('address_1') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('address_2') ? ' has-error' : '' }}">
    <label for="last_name" class="col-md-4 control-label">Address Line 2</label>
    <div class="col-md-12">
        <input id="address_2" type="text" class="form-control" name="address_2"
               value="{{ old('address_2', $contact_address->address_2) }}">
        @if ($errors->has('address_2'))
            <span class="help-block">
                <strong>{{ $errors->first('address_2') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
    <label for="town" class="col-md-4 control-label">Town</label>
    <div class="col-md-12">
        <input id="town" type="text" class="form-control" name="town"
               value="{{ old('town', $contact_address->town) }}">
        @if ($errors->has('town'))
            <span class="help-block">
                <strong>{{ $errors->first('town') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('county') ? ' has-error' : '' }}">
    <label for="county" class="col-md-4 control-label">County</label>
    <div class="col-md-12">
        <input id="county" type="text" class="form-control" name="county"
               value="{{ old('county', $contact_address->county) }}">
        @if ($errors->has('county'))
            <span class="help-block">
                <strong>{{ $errors->first('county') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
    <label for="postcode" class="col-md-4 control-label">Postcode</label>
    <div class="col-md-12">
        <input id="postcode" type="text" class="form-control" name="postcode"
               value="{{ old('postcode', $contact_address->postcode) }}">
        @if ($errors->has('postcode'))
            <span class="help-block">
                <strong>{{ $errors->first('postcode') }}</strong>
            </span>
        @endif
    </div>
</div>


