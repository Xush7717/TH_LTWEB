@extends('layouts.admin')

@section('title', 'Order Details')

@section('page-title', 'Order #' . $order->id . ' Details')

@section('content')
<div class="content-card">
    <div class="content-card-header">
        <h2>Order Information</h2>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back to Orders</a>
    </div>

    <div class="order-info-grid">
        <div class="order-info-item">
            <label>Order ID</label>
            <p>#{{ $order->id }}</p>
        </div>

        <div class="order-info-item">
            <label>Order Date</label>
            <p>{{ $order->order_date->format('d M Y H:i') }}</p>
        </div>

        <div class="order-info-item">
            <label>Status</label>
            <p><span class="badge badge-{{ $order->status }}">{{ $order->status }}</span></p>
        </div>

        <div class="order-info-item">
            <label>Total Amount</label>
            <p class="text-success">{{ number_format($order->total_money, 0) }} ₫</p>
        </div>
    </div>
</div>

<div class="content-card">
    <div class="content-card-header">
        <h2>Customer Information</h2>
    </div>

    <div class="order-info-grid">
        <div class="order-info-item">
            <label>Full Name</label>
            <p>{{ $order->full_name }}</p>
        </div>

        <div class="order-info-item">
            <label>Email</label>
            <p>{{ $order->user->email ?? 'N/A' }}</p>
        </div>

        <div class="order-info-item">
            <label>Phone Number</label>
            <p>{{ $order->phone_number }}</p>
        </div>

        <div class="order-info-item">
            <label>Shipping Address</label>
            <p>{{ $order->shipping_address }}</p>
        </div>

        @if($order->note)
        <div class="order-info-item">
            <label>Note</label>
            <p>{{ $order->note }}</p>
        </div>
        @endif
    </div>
</div>

<div class="content-card">
    <div class="content-card-header">
        <h2>Order Items</h2>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderDetails as $detail)
            <tr>
                <td>{{ $detail->product->name ?? 'N/A' }}</td>
                <td>{{ number_format($detail->price, 0) }} ₫</td>
                <td>{{ $detail->quantity }}</td>
                <td>{{ number_format($detail->total_price, 0) }} ₫</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr style="font-weight: bold; background: var(--bg-light);">
                <td colspan="3" class="text-right">Total:</td>
                <td>{{ number_format($order->total_money, 0) }} ₫</td>
            </tr>
        </tfoot>
    </table>
</div>

<div class="content-card">
    <div class="content-card-header">
        <h2>Update Order Status</h2>
    </div>

    <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-row">
            <div class="form-group">
                <label for="status" class="form-label">Order Status</label>
                <select id="status" name="status" class="form-select">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                @error('status')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Status</button>
        </div>
    </form>
</div>
@endsection
