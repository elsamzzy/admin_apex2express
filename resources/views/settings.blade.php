@extends('layouts.app')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title"> {{ __('Settings') }} {{ __('|') }} {{ __('Change Password') }}</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('settings') }}" >
                            @csrf
                            <div class="row mt-2">
                                <div class="col-4">
                                    <label for="old_password">{{ __('Current Password') }}<span style="color: red">{{ __('*') }}</span></label>
                                    <input name="old_password" id="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Your Current Password" required/>
                                    @if(session('password'))
                                        <span class="is-invalid text-center" role="alert" style="color: red">
                                            <strong>{{ session('password') }}</strong>
                                        </span>
                                    @endif
                                    @error('old_password')
                                        <span class="is-invalid text-center" role="alert" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="password">{{ __('New Password') }}<span style="color: red">{{ __('*') }}</span></label>
                                    <input name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password" required/>
                                    @error('password')
                                        <span class="is-invalid text-center" role="alert" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="password_confirmation">{{ __('Confirm Password') }}<span style="color: red">{{ __('*') }}</span></label>
                                    <input name="password_confirmation" id="password-confirm" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" required/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <button type="submit" class="btn btn-primary">{{ __('Change Password') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title"> {{ __('Settings') }} {{ __('|') }} {{ __('Change Details') }}</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('info') }}" >
                            @csrf
                            <div class="row mt-2">
                                <div class="col-6">
                                    <label for="phone">{{ __('Mobile Phone') }}<span style="color: red">{{ __('*') }}</span></label>
                                    <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Your Mobile Phone" required value="{{ auth()->user()->phone }}"/>
                                    @error('phone')
                                    <span class="is-invalid text-center" role="alert" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="Address">{{ __('Your Address') }}<span style="color: red">{{ __('*') }}</span></label>
                                    <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Your Address" required value="{{ auth()->user()->address }}" />
                                    @error('address')
                                    <span class="is-invalid text-center" role="alert" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <button type="submit" class="btn btn-primary">{{ __('Change Details') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
