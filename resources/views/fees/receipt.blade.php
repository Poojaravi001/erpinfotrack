@extends('layouts.app')
@section('title', 'Fee Receipt')

@section('main')
<div class="main-content" x-data="app">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="print-container" id="print-receipt">
                        <!-- First Receipt -->
                        <div class="receipt-card">
                            <div class="receipt-header">
                                <h2 class="receipt-title">Fee Receipt</h2>
                                <p class="college-name">Pollachi College of Arts and Science</p>
                                <p class="college-address">Dharapuram Main Road, Poosaripatti, Pollachi, Tamil Nadu 642205</p>
                            </div>

                            <div class="receipt-body">
                                <div class="receipt-row">
                                    <span class="receipt-label">Date:</span>
                                    <span class="receipt-value">{{ $fee->payment_date }}</span>
                                </div>
                                <div class="receipt-row">
                                    <span class="receipt-label">Receipt No:</span>
                                    <span class="receipt-value">RCPT-{{ str_pad($fee->id, 6, '0', STR_PAD_LEFT) }}</span>
                                </div>
                                <div class="receipt-row">
                                    <span class="receipt-label">Admission No:</span>
                                    <span class="receipt-value">{{ $fee->admission_id }}</span>
                                </div>
                                <div class="receipt-row">
                                    <span class="receipt-label">Student Name:</span>
                                    <span class="receipt-value">{{ $fee->admission->name }}</span>
                                </div>
                                <div class="receipt-row">
                                    <span class="receipt-label">Department:</span>
                                    <span class="receipt-value">{{ $fee->admission->course->name }}</span>
                                </div>

                                <table class="receipt-table">
                                    <thead>
                                        <tr>
                                            <th>Fee Type</th>
                                            <th>Amount (₹)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach($fee->feeDetails as $detail) --}}
                                        <tr>
                                            <td>{{ $fee->fee_type }}</td>
                                            <td>₹{{ number_format($fee->amount, 2) }}</td>
                                        </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>

                                <div class="receipt-row total-row">
                                    <span class="receipt-label">Total Paid:</span>
                                    <span class="receipt-value">₹{{ number_format($fee->amount, 2) }}</span>
                                </div>
                                <div class="receipt-row">
                                    <span class="receipt-label">Payment Method:</span>
                                    <span class="receipt-value">{{ $fee->payment_method }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Second Receipt (Duplicate for Printing) -->
                        <div class="receipt-card">
                            <div class="receipt-header">
                                <h2 class="receipt-title">Fee Receipt</h2>
                                <p class="college-name">Pollachi College of Arts and Science</p>
                                <p class="college-address">Dharapuram Main Road, Poosaripatti, Pollachi, Tamil Nadu 642205</p>
                            </div>

                            <div class="receipt-body">
                                <div class="receipt-row">
                                    <span class="receipt-label">Date:</span>
                                    <span class="receipt-value">{{ $fee->payment_date }}</span>
                                </div>
                                <div class="receipt-row">
                                    <span class="receipt-label">Receipt No:</span>
                                    <span class="receipt-value">RCPT-{{ str_pad($fee->id, 6, '0', STR_PAD_LEFT) }}</span>
                                </div>
                                <div class="receipt-row">
                                    <span class="receipt-label">Admission No:</span>
                                    <span class="receipt-value">{{ $fee->admission_id }}</span>
                                </div>
                                <div class="receipt-row">
                                    <span class="receipt-label">Student Name:</span>
                                    <span class="receipt-value">{{ $fee->admission->name }}</span>
                                </div>
                                <div class="receipt-row">
                                    <span class="receipt-label">Department:</span>
                                    <span class="receipt-value">{{ $fee->admission->course->name }}</span>
                                </div>

                                <table class="receipt-table">
                                    <thead>
                                        <tr>
                                            <th>Fee Type</th>
                                            <th>Amount (₹)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($fee->feeDetails ?? [] as $detail)
                                        <tr>
                                            <td>{{ $fee->fee_type }}</td>
                                            <td>₹{{ number_format($fee->amount, 2) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="receipt-row total-row">
                                    <span class="receipt-label">Total Paid:</span>
                                    <span class="receipt-value">₹{{ number_format($fee->amount, 2) }}</span>
                                </div>
                                <div class="receipt-row">
                                    <span class="receipt-label">Payment Method:</span>
                                    <span class="receipt-value">{{ $fee->payment_method }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Print Button -->
                    <div class="receipt-footer no-print">
                        <button onclick="printReceipt()" class="print-button">Print</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- CSS Styles -->
<style>
    .print-container {
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    .receipt-card {
        font-family: 'Poppins', sans-serif;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        padding: 20px;
        width: 48%;
        border: 1px solid #e0e0e0;
    }

    .receipt-header {
        text-align: center;
        margin-bottom: 10px;
    }

    .receipt-title {
        font-size: 22px;
        font-weight: 700;
        color: #2c3e50;
    }

    .receipt-body {
        line-height: 1.8;
    }

    .receipt-row {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        border-bottom: 1px dashed #e0e0e0;
    }

    .total-row {
        font-weight: bold;
    }

    .receipt-label {
        font-weight: 500;
        color: #495057;
    }

    .receipt-value {
        font-weight: 600;
        color: #212529;
    }

    .receipt-table {
        width: 100%;
        margin-top: 10px;
        border-collapse: collapse;
    }

    .receipt-table th, .receipt-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .receipt-table th {
        background: #007bff;
        color: #fff;
    }

    .print-button {
        background: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-size: 16px;
        transition: 0.3s;
    }

    .print-button:hover {
        background: #0056b3;
    }

    @media print {
        body * {
            visibility: hidden;
        }
        #print-receipt, #print-receipt * {
            visibility: visible;
        }
        #print-receipt {
            display: flex;
            justify-content: space-between;
        }
        .no-print {
            display: none !important;
        }
    }
</style>

<!-- Print Function -->
<script>
    function printReceipt() {
        window.print();
    }
</script>
@endsection
