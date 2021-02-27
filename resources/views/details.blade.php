@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title"> {{ __('Details about') }} {{ $track->name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table tablesorter " id="">
                                <thead class="text-primary">
                                <tr>
                                    <th class="text-center">
                                        {{ __('Name') }}
                                    </th>
                                    <th class="text-center">
                                        {{ __('Mode') }}
                                    </th>
                                    <th class="text-center">
                                        {{ __('Size') }}
                                    </th>
                                    <th class="text-center">
                                        {{ __('Date Created') }}
                                    </th>
                                    <th class="text-center">
                                        {{ __('Date Last Updated') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center">
                                        {{ $track->name }}
                                    </td>
                                    <td class="text-center">
                                        {{ $track->mode }}
                                    </td>
                                    <td class="text-center">
                                        @if($track->size == 's')
                                            {{ __('Small') }}
                                        @elseif($track->size == 'm')
                                            {{ __('Medium') }}
                                        @elseif($track->size == 'l')
                                            {{ __('Large') }}
                                        @elseif($track->size == 'xl')
                                            {{ __('Extra Large') }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ $track->created_at->diffForHumans() }}
                                    </td>
                                    <td class="text-center">
                                        {{ $track->updated_at->diffForHumans() }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card  card-plain">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Update') }} {{ $track->name }} {{ __('|') }} {{ $track->track_id }} {{ __("'s record") }}</h4></div>
                    <div class="card-body">
                        <form method="post" action="{{ route('details', $track) }}" >
                            @csrf
                            <div class="row mt-2">
                                <div class="col-6">
                                    <label for="location">{{ __('Current Shipping Information') }}<span style="color: red">{{ __('*') }}</span></label>
                                    <input name="information" id="information" class="form-control @error('information') is-invalid @enderror" placeholder="Current Shipping information/location of parcel" required value="{{ old('information') }}"/>
                                    @error('information')
                                    <span class="is-invalid text-center" role="alert" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="description">{{ __('Additional Description') }}</label>
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="is-invalid text-center" role="alert" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <button type="submit" class="btn btn-primary">{{ __('Update History') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card  card-plain">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('History about') }} {{ $track->name }} {{ __('|') }} {{ $track->track_id }}</h4></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table tablesorter" id="">
                                <thead class=" text-primary">
                                <tr>
                                    <th>
                                        {{ __('Shipping info') }}
                                    </th>
                                    <th>
                                        {{ __('Description') }}
                                    </th>
                                    <th>
                                        {{ __('Time Updated') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($details as $value)
                                    <tr>
                                        <td>
                                            {{ $value->shipping_info }}
                                        </td>
                                        <td>
                                            {{ $value->description }}
                                        </td>
                                        <td>
                                            {{ $value->created_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
