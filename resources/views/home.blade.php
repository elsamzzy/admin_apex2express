@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title"> {{ __('All Logistics') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table tablesorter " id="">
                                @if( $list->count() === 0 )
                                    <p> {{ __('You have not added logistics details for tracking') }} </p>
                                @else
                                    <thead class="text-primary">
                                    <tr>
                                        <th class="text-center">
                                            {{ __('Tracking Number') }}
                                        </th>
                                        <th class="text-center">
                                            {{ __('Tracking ID') }}
                                        </th>
                                        <th class="text-center">
                                            {{ __('Mode') }}
                                        </th>
                                        <th class="text-center">
                                            {{ __('Size') }}
                                        </th>
                                        <th class="text-center">
                                            {{ __('Origin') }}
                                        </th>
                                        <th class="text-center">
                                            {{ __('Destination') }}
                                        </th>
                                        <th class="text-center">
                                            {{ __('Weight(Kg)') }}
                                        </th>
                                        <th class="text-center">
                                            {{ __('Arrival Date') }}
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
                                    @foreach($list as $value)
                                        <tr>
                                            <td class="text-center">
                                                <a href="{{ route('details', $value) }}" >{{ $value->tracking_number }}</a>
                                            </td>
                                            <td class="text-center">
                                                {{ $value->name }}{{ __('_') }}{{ $value->id }}
                                            </td>
                                            <td class="text-center">
                                                {{ $value->mode }}
                                            </td>
                                            <td class="text-center">
                                                @if($value->size == 's')
                                                    {{ __('Small') }}
                                                @elseif($value->size == 'm')
                                                    {{ __('Medium') }}
                                                @elseif($value->size == 'l')
                                                    {{ __('Large') }}
                                                @elseif($value->size == 'xl')
                                                    {{ __('Extra Large') }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                {{ $value->date }}
                                            </td>
                                            <td class="text-center">
                                                {{ $value->created_at->diffForHumans() }}
                                            </td>
                                            <td class="text-center">
                                                {{ $value->updated_at->diffForHumans() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--
            <div class="col-md-12">
                <div class="card  card-plain">
                    <div class="card-header">
                        <h4 class="card-title"> Table on Plain Background</h4>
                        <p class="category"> Here is a subtitle for this table</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table tablesorter " id="">
                                <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Country
                                    </th>
                                    <th>
                                        City
                                    </th>
                                    <th class="text-center">
                                        Salary
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        Dakota Rice
                                    </td>
                                    <td>
                                        Niger
                                    </td>
                                    <td>
                                        Oud-Turnhout
                                    </td>
                                    <td class="text-center">
                                        $36,738
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Minerva Hooper
                                    </td>
                                    <td>
                                        Curaçao
                                    </td>
                                    <td>
                                        Sinaai-Waas
                                    </td>
                                    <td class="text-center">
                                        $23,789
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Sage Rodriguez
                                    </td>
                                    <td>
                                        Netherlands
                                    </td>
                                    <td>
                                        Baileux
                                    </td>
                                    <td class="text-center">
                                        $56,142
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Philip Chaney
                                    </td>
                                    <td>
                                        Korea, South
                                    </td>
                                    <td>
                                        Overland Park
                                    </td>
                                    <td class="text-center">
                                        $38,735
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Doris Greene
                                    </td>
                                    <td>
                                        Malawi
                                    </td>
                                    <td>
                                        Feldkirchen in Kärnten
                                    </td>
                                    <td class="text-center">
                                        $63,542
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Mason Porter
                                    </td>
                                    <td>
                                        Chile
                                    </td>
                                    <td>
                                        Gloucester
                                    </td>
                                    <td class="text-center">
                                        $78,615
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Jon Porter
                                    </td>
                                    <td>
                                        Portugal
                                    </td>
                                    <td>
                                        Gloucester
                                    </td>
                                    <td class="text-center">
                                        $98,615
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            -->
        </div>
    </div>
@endsection
