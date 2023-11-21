@extends('layouts.app')
@section('content')
    <div class="container">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SL No</th>
                    <th scope="col">Name </th>
                    <th scope="col">Email</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody id="memberBody">
                @foreach ($members as $key => $item)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->description}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection