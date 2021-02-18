{{ csrf_field() }}

<input id="order_number" type="hidden" class="form-control" name="order_number" value="{{ $order_number }}">

<div class="form-group{{ $errors->has('contact_id') ? ' has-error' : '' }}">
    <label for="contact_id" class="col-md-4 control-label">Order for</label>
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

<div class="form-group col-md-6">
    <button onclick="addLineItem()" id="addLineItemBtn" type="button" class="btn btn-outline-primary">Add new line item</button>
</div>

<!-- Default Line Item -->
<div id="lineItemContainer">

    <div id="lineItem" class="form-group row align-items-center bg-light p-3">

        <div class="form-group{{ $errors->has('product') ? ' has-error' : '' }}">
            <label for="product" class="col-md-12 control-label">Item</label>
            <div class="col-md-12">
                <input id="product" type="text" class="form-control" name="lineItems[lineItem_0][product]" value="{{ old('lineItems[lineItem_0][product]', $order->product) }}">
                @if ($errors->has('lineItems[lineItem_0][product]'))
                    <span class="help-block">
                        <strong>{{ $errors->first('product') }}</strong>
                    </span>
                @endif
            </div>
        </div>



        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
            <label for="price" class="col-md-12 control-label">Unit Price</label>
            <div class="col-md-12">
                <input id="price" type="text" class="form-control" name="lineItems[lineItem_0][price]" value="{{ old('price', $order->product) }}">
                @if ($errors->has('price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                @endif
            </div>
        </div>

    </div>
</div>



<script>

        let i = 0;

        function addLineItem() {

            i++

            let lineItem = '<div id="lineItem" class="form-group row align-items-center bg-light p-3">'
                + '<div class="form-group{{ $errors->has('product') ? ' has-error' : '' }}">'
                + '<label for="product_' + i + '" class="col-md-12 control-label">Item</label>'
                + '<div class="col-md-12">'
                + '<input id="product_' + i + '" type="text" class="form-control" name="lineItems[lineItem_'+ i +'][product]" value="{{ old('product', $order->product) }}">'
                + '</div>'
                + '</div>'
                + '<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">'
                + '<label for="price_' + i + '" class="col-md-12 control-label">Unit Price</label>'
                + '<div class="col-md-12">'
                + '<input id="price_' + i + '" type="text" class="form-control" name="lineItems[lineItem_'+ i +'][price]" value="{{ old('price', $order->price) }}">'
                + '</div>'
                + '</div>'
                + '</div>';

            $('#lineItemContainer').append(lineItem);

        }

</script>
