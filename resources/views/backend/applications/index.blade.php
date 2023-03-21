@extends('backend.layouts.app')
@section('title', 'Aplicaciones')
@section('content')
    <div class="box-content">
        <div class="box-heading">
            <div class="box-title">
                <h3 class="mb-35">@yield('title')</h3>
            </div>
            <div class="box-breadcrumb">
                <div class="breadcrumbs">
                    <ul>
                        <li><a class="icon-home" href="{{ route('backend.dashboard.index') }}">Dashboard</a></li>
                        <li><span>@yield('title')</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <livewire:backend.applications-index/>

    </div>
@endsection
