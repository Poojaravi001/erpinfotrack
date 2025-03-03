@extends('layouts.app')

@section('title', 'Fee Settings')

@section('css')
    <link rel="stylesheet" href="{{ asset('bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible show fade">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10 mb-3">
                                    <h6 class="col-deep-purple">Fees</h6>
                                </div>
                                <div class="col-2 mb-3">
                                    <a href="{{ route('feesettings.create') }}" class="btn btn-primary btn-block">Add Fees</a>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table table-striped table-sm" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Academic Year</th>
                                            <th>Course Name</th>
                                            <th>Semester</th>
                                            <th>Fee Type</th>
                                            <th>Amount</th>
                                            <th>Grand Total</th>
                                            <th>Edit</th>
                                            {{-- <th>Delete</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($feeSettings) && $feeSettings->count() > 0)
                                            @foreach($feeSettings as $key => $feeSetting)
                                                @foreach($feeSetting->feeItems as $index => $feeItem)
                                                    <tr>
                                                        @if($index == 0)
                                                            <td rowspan="{{ $feeSetting->feeItems->count() }}">{{ $key+1 }}</td>
                                                            <td rowspan="{{ $feeSetting->feeItems->count() }}">{{ $feeSetting->academic_year }}</td>
                                                            <td rowspan="{{ $feeSetting->feeItems->count() }}">{{ $feeSetting->course->name ?? 'N/A' }}</td>
                                                            <td rowspan="{{ $feeSetting->feeItems->count() }}">{{ $feeSetting->semester }}</td>
                                                        @endif
                                                        <td>{{ $feeItem->fee_type }}</td>
                                                        <td>{{ number_format($feeItem->amount, 2) }}</td>
                                                        @if($index == 0)
                                                            <td rowspan="{{ $feeSetting->feeItems->count() }}">{{ number_format($feeSetting->grandTotal, 2) }}</td>
                                                            <td rowspan="{{ $feeSetting->feeItems->count() }}">
                                                                <a href="{{ route('feesettings.edit', $feeSetting->id) }}" class="btn btn-primary ">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            </td> 
                                                            {{-- <td rowspan="{{ $feeSetting->feeItems->count() }}">
                                                                <form action="{{ route('feesettings.destroy', $feeSetting->id) }}" method="POST" style="display:inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </td> --}}
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center">No records found.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
    <script src="{{ asset('bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            });
        });
    </script>
@endsection