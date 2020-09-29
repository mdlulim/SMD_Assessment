@extends('layouts.app')

@section('content')
        <div class="">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8" style="width: 100%;">
            <div class="card">
                    <div class="card-header">
                    <div class="card-body">
                      <table class="table table-responsive-sm table-hover table-outline mb-0">
                        <thead class="thead-light">
                          <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Date Of Birth</th>
                            <th>Car Make</th>
                            <th>Car Colour</th>
                            <th>Date Created</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                          <tr>
                            <td>{{ $user->name }} </td>
                            <td>{{ $user->phone }} </td>
                            <td>{{ $user->email }} </td>
                            <td>{{ $user->gender }} </td>
                            <td>{{ $user->date_of_birth }} </td>
                            <td>{{ $user->car_make }} </td>
                            <td>{{ $user->car_colour }} </td>
                            <td>{{ $user->created_at }} </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection