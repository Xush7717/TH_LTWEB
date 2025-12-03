@extends('layouts.app')

@section('title', 'Lab Thực Hành - TBShop')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/custom/labs.css') }}">
@endpush

@section('content')
<section class="labs">
    <div class="lab-card">
        <h3>Lab01: HTML</h3>
        <ul>
            <a href="{{ asset('lab/Lab01/Vi_du/lab01_bai3.html') }}">
                <li>Lab1_3</li>
            </a>
            <a href="{{ asset('lab/Lab01/Vi_du/lab01_bai4.html') }}">
                <li>Lab1_4</li>
            </a>
        </ul>
    </div>
    <div class="lab-card">
        <h3>Lab02: Table & List</h3>
        <ul>
            <a href="{{ asset('lab/Lab02/Vi_du_Lab01/lab02_bai1.html') }}">
                <li>Lab2_1</li>
            </a>
            <a href="{{ asset('lab/Lab02/Vi_du_Lab01/lab02_bai2.html') }}">
                <li>Lab2_2</li>
            </a>
            <a href="{{ asset('lab/Lab02/Vi_du_Lab01/lab02_bai3.html') }}">
                <li>Lab2_3</li>
            </a>
        </ul>
    </div>
    <div class="lab-card">
        <h3>Lab03: Frame & Form</h3>
        <ul>
            <a href="{{ asset('lab/Lab03/Vi_du_Lab01/lab03_bai1.html') }}">
                <li>Lab3_1</li>
            </a>
            <a href="{{ asset('lab/Lab03/Vi_du_Lab01/lab03_bai2.html') }}">
                <li>Lab3_2</li>
            </a>
            <a href="{{ asset('lab/Lab03/Vi_du_Lab01/lab03_bai3.html') }}">
                <li>Lab3_3</li>
            </a>
        </ul>
    </div>
    <div class="lab-card">
        <h3>Lab04: CSS cơ bản</h3>
        <ul>
            <a href="{{ asset('lab/Lab04/Vi_du/lab04_bai1.html') }}">
                <li>Lab4_1</li>
            </a>
            <a href="{{ asset('lab/Lab04/Vi_du/lab04_bai2.html') }}">
                <li>Lab4_2</li>
            </a>
            <a href="{{ asset('lab/Lab04/Vi_du/lab04_bai3.html') }}">
                <li>Lab4_3</li>
            </a>
        </ul>
    </div>
    <div class="lab-card">
        <h3>Lab05: Các thuộc tính CSS</h3>
        <ul>
            <a href="{{ asset('lab/Lab05/Bai_2/lab05_bai1.html') }}">
                <li>Lab5_1</li>
            </a>
            <a href="{{ asset('lab/Lab05/Vi_du/') }}">
                <li>Lab5_2</li>
            </a>
            <a href="{{ asset('lab/Lab05/Bai_2/lab05_bai3.html') }}">
                <li>Lab5_3</li>
            </a>
        </ul>
    </div>
    <div class="lab-card">
        <h3>Lab06: Xây dựng layout responsive bằng CSS</h3>
        <ul>
            <a href="{{ asset('lab/Lab06/Bai_2_Minh_hoa_layout/lab06_ menu_responsive.html') }}">
                <li>Lab6_1</li>
            </a>
            <a href="{{ asset('lab/Lab06/Bai_2_Minh_hoa_layout/lab06_bai2.html') }}">
                <li>Lab6_2</li>
            </a>
            <a href="{{ asset('lab/Lab06/Bai_2_Minh_hoa_layout/lab06_bai3.html') }}">
                <li>Lab6_3</li>
            </a>
        </ul>
    </div>
    <div class="lab-card">
        <h3>Lab07: Javascript</h3>
        <ul>
            <a href="{{ asset('lab/Lab07/Vi_du/lab07_bai1.html') }}">
                <li>Lab7_1</li>
            </a>
            <a href="{{ asset('lab/Lab07/demo_bai_2/lab07_bai2.html') }}">
                <li>Lab7_2</li>
            </a>
        </ul>
    </div>
    <div class="lab-card">
        <h3>Lab08: Javascript nâng cao</h3>
        <ul>
            <a href="{{ asset('lab/Lab08/lab08_slider.html') }}">
                <li>Lab8_1</li>
            </a>
            <a href="{{ asset('lab/Lab08/lab08_slider_auto.html') }}">
                <li>Lab8_2</li>
            </a>
            <a href="{{ asset('lab/Lab08/lab08_json.html') }}">
                <li>Lab8_3</li>
            </a>
        </ul>
    </div>
</section>
@endsection
