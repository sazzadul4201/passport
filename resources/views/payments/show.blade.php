@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('payments.index') }}">Payment</a>
    </li>
    <li class="breadcrumb-item active">Detail</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        @include('common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Details</strong>
                        <a href="{{ route('payments.index') }}" class="btn btn-light">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @include('payments.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection