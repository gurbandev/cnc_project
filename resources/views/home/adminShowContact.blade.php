@extends('layouts.app')
@section('title', 'Contact Show')
@section('content')
    <table class="table table-striped row">
        <thead class="col-12">
        <tr class="row">
            <th class="col-0-5">#</th>
            <th class="col-1">Name</th>
            <th class="col-2-5">Email</th>
            <th class="col-2">Subject</th>
            <th class="col-2">Message</th>
            <th class="col-2">Created at</th>
            <th class="col-2">Updated at</th>
        </tr>
        </thead>
        <tbody class="col-12">
        @foreach($contacts as $contact)
            <tr class="row">
                <th class="col-0-5">{{$contact->id}}</th>
                <td class="col-1">{{$contact->name}}</td>
                <td class="col-2-5">{{$contact->email}}</td>
                <td class="col-2">{{$contact->subject}}</td>
                <td class="col-2">{{$contact->message}}</td>
                <td class="col-2">{{$contact->created_at}}</td>
                <td class="col-2">{{$contact->updated_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection