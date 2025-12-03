@extends('layouts.admin')

@section('title', 'Orders')

@section('page-title', 'Orders Management')

@section('content')
<div class="content-card">
    <div class="content-card-header">
        <h2>All Orders</h2>
    </div>

    @if($orders->count() > 0)
        <table class="data-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Order Date</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->full_name }}</td>
                    <td>{{ $order->user->email ?? 'N/A' }}</td>
                    <td>{{ $order->order_date->format('d M Y H:i') }}</td>
                    <td>{{ number_format($order->total_money, 0) }} ₫</td>
                    <td>
                        <span class="badge badge-{{ $order->status }}">{{ $order->status }}</span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-secondary">View</a>
                            <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete('Delete this order?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-20">
            {{ $orders->links() }}
        </div>
    @else
        <div class="no-data">
            <p>No orders found.</p>
        </div>
    @endif
</div>
@endsection
