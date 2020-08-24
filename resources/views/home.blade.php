@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="hero-unit">
                <h1>Welcome to Blueion Country Borders</h1>
                <p>This application it display a list of all the countries that border the selected country</p>
                <p>
                    <a class="btn btn-primary btn-large">
                    Learn more
                    </a>
                </p>
                </div>

            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                
                <form name="countryForm" id="countryForm" method="GET" action="{{route('home.borders') }}">
                    <select id="country" name="country" class="mdb-select md-form">
                        <option value="" disabled selected>Choose your option</option>
                            @foreach($countries ?? '' as $country)
                            <option value="{{$country['alpha2Code']}}">{{$country["name"]}} </option>
                            @endforeach
                    </select>
                     @foreach($borders ?? '' as $border)
                            <span class="badge badge-success">
                            {{ $border }}
                            </span>
                     @endforeach
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

