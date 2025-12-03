@extends('layouts.admin')

@section('title', 'Users')

@section('page-title', 'Users Management')

@section('content')
<div class="content-card">
    <div class="content-card-header">
        <h2>All Users</h2>
    </div>

    @if($users->count() > 0)
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Orders</th>
                    <th>Registered</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number ?? 'N/A' }}</td>
                    <td>
                        @if($user->role === 'admin')
                            <span class="badge badge-processing">Admin</span>
                        @else
                            <span class="badge badge-pending">Customer</span>
                        @endif
                    </td>
                    <td>{{ $user->orders_count }}</td>
                    <td>{{ $user->created_at->format('d M Y') }}</td>
                    <td>
                        @if($user->role !== 'admin')
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete('Delete this user?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        @else
                            <span class="text-muted">Protected</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-20">
            {{ $users->links() }}
        </div>
    @else
        <div class="no-data">
            <p>No users found.</p>
        </div>
    @endif
</div>
@endsection
