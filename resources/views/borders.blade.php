@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} -->
                <form name="countryForm" id="countryForm" method="POST" action="{{route('home.borders') }}">
                    <select id="country" name="country" class="mdb-select md-form">
                        <option value="" disabled selected>Choose your option</option>
                            @foreach($countries as $country)
                            <option value="{{$country['alpha2Code']}}">{{$country["name"]}} </option>
                            @endforeach
                    </select>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
<script>
$('country').on('change',function(){
    $('countryForm').submit();
});
</script>