@extends('layouts.layoutMaster')

@section('title', 'List-Season')

@section('content')

    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/master') }}">Master</a>
            </li>
            <li class="breadcrumb-item active">Season</li>
            <li class="breadcrumb-item active">View</li>
        </ol>
    </nav>
{{--    --}}
{{--    <h4 class="py-3 mb-4">--}}
{{--        <span class="text-muted fw-light float-left">Master / Season /</span> View--}}
{{--    </h4>--}}
    <!-- Master Season -->


    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table" id="datatable-list">
                <thead>
                <tr>
                    <th>SR No.</th>
                    <th>Season Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $num =1 @endphp
                @foreach($seasons as $season)

                    <tr>
                        <td class="text-bold"> {{$num}} </td>
                        <td>{{$season->name}}</td>
                        <td>
                            <a class="btn btn-icon btn-label-primary mx-2" href="{{route('season.edit',['season'=> $season->id])}}"><i
                                    class="ti ti-edit mx-2 ti-sm"></i></a>
                            <button type="button" class="btn btn-icon btn-label-danger mx-2"><i
                                    class="ti ti-trash mx-2 ti-sm"></i></button>
                        </td>
                    </tr>
                    @php$num++ @endphp
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
