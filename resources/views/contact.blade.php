@extends('layouts.app')

@section('content')
        <div class="">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8" style="width: 75%;">
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            @endif
            @if ($submitError)
                <div class="alert alert-danger">{{ $submitError }}</li> </div>
            @endif
            <form method="post" action="{{ route('store') }}">
                @csrf
                @method('POST')
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <div class="form-group">
                                        <label for="InputName">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"  placeholder="Name" required>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="InputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="InputPhone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"  placeholder="Phone number" required>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="InputDateOfBirth">Date of birth</label>
                                        <input class="form-control" id="date_of_birth" type="date" name="date_of_birth" pplaceholder="{{ __('Date of birth') }}" value="" autofocus>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="InputGender">Gender</label>
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                             <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <div class="form-group">
                                        <label for="InputName">Name</label>
                                        <input type="text" class="form-control" id="name2" name="name2"  placeholder="Name" required>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="InputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="email2" name="email2" aria-describedby="emailHelp" placeholder="Enter email" required>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="InputPhone">Phone</label>
                                        <input type="text" class="form-control" id="phone2" name="phone2"  placeholder="Phone number" required>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="InputcarMake">Car Make</label>
                                        <input type="text" class="form-control" id="car_make" name="car_make"  placeholder="Car Make">
                                      </div>
                                    <div class="form-group">
                                        <label for="InputCarColour">Car Colour</label>
                                        <input type="text" class="form-control" id="car_colour" name="car_colour"  placeholder="Car Colour">
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                        </div>
                        <button id="btnSubmit" class="btn btn-block btn-success" type="submit">{{ __('Submit') }}</button>
                </div>
            </form>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection