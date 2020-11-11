@extends('users')

@section('list')
<table>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}} {{$user->surname}}</td>
            <td>{{$user->email}}</td>
            <td class="icon"><a onclick="toggleDeleteModal({{$user->id}})" class="dashicons dashicons-trash"></a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection