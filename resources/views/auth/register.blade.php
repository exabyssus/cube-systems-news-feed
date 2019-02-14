@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <register-form url-register="{{ url('/register') }}"
                                       url-verify-email="{{ route('verify.email', ':email') }}"></register-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--@push('scripts')--}}
    {{--<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>--}}
{{--@endpush--}}
