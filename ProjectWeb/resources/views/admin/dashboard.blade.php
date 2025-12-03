@extends('layouts.admin')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')
<div class="stats-grid">
    <div class="stat-card revenue">
        <h3>Total Revenue</h3>
        <div class="stat-value">{{ number_format($totalRevenue, 0) }} ₫</div>
    </div>

    <div class="stat-card orders">
        <h3>Total Orders</h3>
        <div class="stat-value">{{ $totalOrders }}</div>
    </div>

    <div class="stat-card products">
        <h3>Total Products</h3>
        <div class="stat-value">{{ $totalProducts }}</div>
    </div>

    <div class="stat-card users">
        <h3>Total Users</h3>
        <div class="stat-value">{{ $totalUsers }}</div>
    </div>
</div>

<div class="content-card">
    <div class="content-card-header">
        <h2>Welcome to TB Shop Admin Panel</h2>
    </div>
    <p>Manage your Gundam model kit store from this admin dashboard. Use the sidebar to navigate through different sections.</p>
</div>
@endsection
