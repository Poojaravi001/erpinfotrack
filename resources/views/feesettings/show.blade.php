@extends('layouts.app')
@section('title', 'Generate Receipt')
@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Receipt</h4>
                </div>
                <div class="card-body">
                    <p><strong>Student Name:</strong> {{ $receiptDetails['name'] }}</p>
                    <p><strong>Admission No:</strong> {{ $receiptDetails['admission_no'] }}</p>
                    <p><strong>Course:</strong> {{ $receiptDetails['course'] }}</p>
                    <p><strong>Fees Title:</strong> {{ $receiptDetails['fees_title'] }}</p>
                    <p><strong>Amount Paid:</strong> ₹{{ number_format($receiptDetails['amount'], 2) }}</p>
                    <p><strong>Payment Date:</strong> {{ $receiptDetails['payment_date'] }}</p>
                    <p><strong>Payment Method:</strong> {{ $receiptDetails['payment_method'] }}</p>
                    <p><strong>Remarks:</strong> {{ $receiptDetails['remarks'] }}</p>
                </div>
                <div class="card-footer">
                    <button onclick="window.print()" class="btn btn-primary">Print Receipt</button>
                    <a href="{{ route('fees.index') }}" class="btn btn-secondary">Back to Fees List</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
