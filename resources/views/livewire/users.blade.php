<div>
<table class="table table-striped table-hover table-vcenter fs-sm">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Avatar</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Registered</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @if($users)
        @foreach($users as $user)
            <tr>
                <td>{{$user->id ? $user->id : 'No ID'}}</td>
                <td>{{$user->name ? $user->name : 'No Name'}}</td>
                <td><img class="rounded-circle" height="62" width="62" src="{{$user->avatar ? asset('/') . $user->avatar->file : 'http://placehold.it/62x62'}}" alt="{{$user->name}}"></td>
                <td>{{$user->email ? $user->email : 'No Email'}}</td>
                <td>@foreach($user->roles as $role)
                        <span class="rounded-pill bg-info-light text-info p-2">{{$role->name ? $role->name : 'No Role'}}</span>
                    @endforeach</td>
                <td>{{$user->email_verified_at ? $user->email_verified_at : 'Not Verified'}}</td>
                <td class="text-center">
                    <div class="btn-group">

                        <a href="{{route('users.edit', $user->id)}}" type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit Client">
                            <i class="fa fa-fw fa-pencil-alt"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Remove Client">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
</div>
<div class="d-flex justify-content-center">
    {!! $users->links()  !!}
</div>
