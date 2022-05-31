@extends("RestrictedIps.layouts.app")
@section('content')
    <div class="row">
        <div class="col my-2">
            <a href="{{ route('restricted-ips.index') }}" class="btn btn-primary float-right" type="button">Cencal</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form method="post" action="{{ route('restricted-ips.store') }}">
                @csrf
                <div class="form-group">
                    <label for="ip_address">{{ __('IP') }}</label>
                    <input type="text" class="form-control" id="ip_address" name="ip_address"
                        placeholder="{{ __('IP') }}">
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </form>
        </div>
    </div>
@endsection
