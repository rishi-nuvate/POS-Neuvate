@extends('layouts.layoutMaster')

@section('title', 'List-Tags')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light float-left">Master / Tags /</span> View
    </h4>
    <!-- Master Tags List -->


    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table" id="datatable-list">
                <thead>
                @php $num=1 @endphp


                <tr>
                    <th>SR No.</th>
                    <th>Tag Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                <tr>
                    <td class="text-bold">{{$num}}</td>
                    <td>{{$tag->name}}</td>
                    <td>
                        <a class="btn btn-icon btn-label-primary mx-2" href="{{route('tags.edit',['tag' => $tag->id])}}"><i
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
