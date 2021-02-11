@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Contact address</div>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('address.store') }}">
                            @include('.contacts.partials.address-form')
                            <div class="form-group">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
