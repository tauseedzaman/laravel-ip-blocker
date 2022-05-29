@extends("RestrictedIps.layouts.app")
@section('content')
    <div class="row">
        <div class="col my-2">
            <a href="{{ route('restricted-ips.create') }}" class="btn btn-primary float-right" type="button">Add IP</a>
        </div>
    </div>
    <div class="row">
        <div class="col py-1">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col shadow rounded">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">{{ __('IP') }}</th>
                        <th scope="col" class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($restrictedIps as $restrictedIp)
                        <tr>
                            <td class="text-center">{{ $restrictedIp->id }}</td>
                            <td class="text-center">{{ $restrictedIp->ip_address }}</td>
                            <td class="text-center">
                                <form action="{{ route('restricted-ips.destroy', $restrictedIp) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-warning">{{ __("No Restricted IP's") }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
