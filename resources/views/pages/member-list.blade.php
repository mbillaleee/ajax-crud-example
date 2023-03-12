@foreach($members as $member)
<tr>
    <td scope="row">1</td>
    <td scope="row">{{ $member->name }}</td>
    <td scope="row">{{ $member->email }}</td>
    <td scope="row">{{ $member->description }}</td>
    <td scope="row">
        <a href="#" class="btn btn-success edit" data-id="{{ $member->id }}" data-name="{{ $member->name }}" data-email="{{ $member->email }}" data-description="{{ $member->description }}">Edit</a>
        <a href="#" class="btn btn-danger delete" data-id="{{ $member->id }}">Delete</a>
    </td>
</tr>
@endforeach