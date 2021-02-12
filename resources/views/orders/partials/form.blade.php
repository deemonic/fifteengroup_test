{{ csrf_field() }}

<div class="form-group{{ $errors->has('product') ? ' has-error' : '' }}">
    <label for="product" class="col-md-4 control-label">Product</label>
    <div class="col-md-12">
        <input id="product" type="text" class="form-control" name="product"
               value="{{ old('product', $order->product) }}">
        @if ($errors->has('product'))
            <span class="help-block">
                <strong>{{ $errors->first('product') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('contact_id') ? ' has-error' : '' }}">
    <label for="contact_id" class="col-md-4 control-label">Contact</label>
    <div class="col-md-12">
        <select name="contact_id" id="contact_id" class="form-control">
            <option value="">Please select...</option>
            @foreach($contacts as $contact)

                <option value="{{ $contact->id }}"
                    {{ old('contact_id', $contact->id) ? ' selected' : ''}}>
                    {{ $contact->first_name }} {{ $contact->last_name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('contact_id'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_id') }}</strong>
            </span>
        @endif
    </div>
</div>
