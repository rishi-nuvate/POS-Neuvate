@extends('layouts.layoutMaster')

@section('title', 'List-Brands')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light float-left">Master / Brands /</span> View
    </h4>
    <!-- Master Brands List -->


    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table" id="datatable-list">
                <thead>
                <tr>
                    <th>SR No.</th>
                    <th>Brand Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $num=1 @endphp
                @foreach($brands as $brand)
                    <tr>
                        <td class="text-bold">{{$num}}</td>
                        <td>{{$brand->name}}</td>
                        <td>
                            <a class="btn btn-icon btn-label-primary mx-2" href="{{route('brand.edit',['brand' => $brand->id])}}"><i
                                    class="ti ti-edit mx-2 ti-sm"></i></a>
                            <button type="button" class="btn btn-icon btn-label-danger mx-2"><i
                                    class="ti ti-trash mx-2 ti-sm"></i></button>
                        </td>
                    </tr>
                    @php $num++ @endphp
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
