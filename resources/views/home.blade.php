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

                </div>

            <div class="card">
                <div class="card-header">{{ __('Select Option') }}</div>

                <div class="card-body">
                <form name="countryForm" id="countryForm" method="GET" action="{{route('home.borders') }}">
               <div class="col-sm-12">
                  <div class="form-group">
                    <select id="country" name="country" class="selectpicker">
                        <option value="" disabled selected>Select country</option>
                            @foreach($data[0] ?? [] as $country)
                            <option value="{{$country['alpha2Code']}}">{{$country["name"]}} </option>
                            @endforeach
                    </select>
                    </div>
                </div>
                @if($data[2]['name'])
                    <div class="col-sm-12">
                        <div class="card border-dark mb-6">
                            <div class="card-body text-dark">
                               <div class="card" style="width: 100%">
                                    <div class="card-header"> 
                                    <b>Borders of {{$data[2]['name']}}</b>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        @foreach($data[1] ?? [] as $border)
                                            <li class="list-group-item">{{ $border }}</li>
                                        @endforeach
                                        @if(!$data[1])
                                        <li class="list-group-item">No Results found</li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection