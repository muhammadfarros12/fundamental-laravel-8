@extends('layouts.app')
{{-- https://bit.ly/mastering-task-form --}}
@section('main')
<div class="mt-5 mx-auto" style="width: 380px">

    <div class="card">
        <div class="card-body">

            @if (session('status'))
                <div class="alert alert-success">
                    A Fresh verification link has been sent to your email
                </div>
            @endif

            Before proceeding, please check your email for verivication.
            Or <form action="{{ route('verification.send') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ _('click here to request another') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection