@extends('layouts.app')

@section('title', 'Receipt')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <h4>Receipt</h4>
                            <p>Name: {{ $receiptDetails['name'] }}</p>
                            <p>Admission No: {{ $receiptDetails['admission_no'] }}</p>
                            <p>Course: {{ $receiptDetails['course'] }}</p>
                            <p>Fees Title: {{ $receiptDetails['fees_title'] }}</p>
                            <p>Amount: {{ number_format($receiptDetails['amount'], 2) }}</p>
                            <p>Payment Date: {{ $receiptDetails['payment_date'] }}</p>
                            <p>Payment Method: {{ $receiptDetails['payment_method'] }}</p>
                            <p>Remarks: {{ $receiptDetails['remarks'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection