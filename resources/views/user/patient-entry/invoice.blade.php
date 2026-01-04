@extends('user.layouts.main')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/pages/app-invoice.css') }}">
    <style>
        :root {
            --primary-color: #0d7a65;
            --primary-light: #f6fdfb;
            --text-color: #4b4b4b;
            /* Darker text for better readability */
            --label-color: #5e5873;
            --border-color: #ebe9f1;
        }

        .invoice-preview-wrapper {
            font-family: 'Montserrat', sans-serif;
            color: var(--text-color);
        }

        /* Clean Card Styling */
        .invoice-preview-card {
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 24px 0 rgba(34, 41, 47, 0.05);
            border-radius: 8px;
            background: white;
        }

        /* Header Styling */
        .invoice-header {
            padding: 2rem;
            border-bottom: 1px solid var(--border-color);
        }

        .invoice-logo {
            color: var(--primary-color);
            font-weight: 700;
        }

        .invoice-title {
            color: var(--label-color);
            font-weight: 600;
        }

        .invoice-number {
            color: var(--primary-color);
            font-weight: 700;
        }

        /* Invoice Body */
        .invoice-body {
            padding: 2rem;
        }

        .text-label {
            color: var(--label-color);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }

        /* Table Styling */
        .table thead th {
            background-color: var(--primary-light);
            color: var(--primary-color);
            text-transform: uppercase;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            border-top: none;
            border-bottom: none;
            padding: 1rem;
        }

        .table tbody td {
            padding: 1rem;
            color: var(--text-color);
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
            font-weight: 500;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Total Section */
        .invoice-total-wrapper {
            background-color: #fcfcfc;
            border-radius: 6px;
            padding: 1.5rem;
            border: 1px solid var(--border-color);
        }

        .invoice-total-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .invoice-total-item.grand-total {
            border-top: 1px solid var(--border-color);
            padding-top: 1rem;
            margin-top: 0.5rem;
            margin-bottom: 0;
            color: var(--primary-color);
            font-size: 1.2rem;
            font-weight: 700;
        }

        /* Modern Buttons */
        .btn {
            border-radius: 6px;
            padding: 0.8rem 1rem;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            white-space: nowrap;
            /* Prevent wrapping */
            width: 100%;
            /* Ensure full width */
        }

        .btn i {
            margin-right: 8px;
            width: 18px;
            height: 18px;
        }

        .btn-outline-primary {
            border: 2px solid var(--primary-color) !important;
            color: var(--primary-color) !important;
            background: transparent !important;
            font-weight: 700;
        }

        .btn-outline-primary:hover {
            background: var(--primary-color) !important;
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(13, 122, 101, 0.25);
        }

        .btn-outline-danger {
            border: 2px solid #ea5455 !important;
            color: #ea5455 !important;
            background: transparent !important;
            font-weight: 700;
        }

        .btn-outline-danger:hover {
            background: #ea5455 !important;
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(234, 84, 85, 0.25);
        }

        /* Modal Polish */
        .modal-content {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ebe9f1;
            border-radius: 10px 10px 0 0;
            padding: 1.5rem;
        }
    </style>
@endsection

@section('content')
    <section class="invoice-preview-wrapper p-1">
        <div class="row invoice-preview justify-content-center">
            <!-- Invoice Document -->
            <div class="col-xl-9 col-md-10 col-12">
                <div class="card invoice-preview-card">
                    <!-- Header -->
                    <div class="invoice-header">
                        <div class="d-flex justify-content-between flex-md-row flex-column">
                            <div>
                                <div class="mb-2">
                                    <div class="logo-wrapper">
                                        <img src="{{ asset('website-assets/images/logo/logo.png') }}" alt="Shafayaat Logo"
                                            height="50">
                                    </div>
                                </div>
                                <p class="mb-25" style="color: #4b4b4b;">{{ $patient->address }}</p>
                                <p class="mb-25" style="color: #4b4b4b;">{{ $patient->city }}</p>
                                <p class="mb-0" style="color: #4b4b4b;">{{ $patient->phone }}</p>
                            </div>
                            <div class="mt-md-0 mt-3 text-md-right">
                                <h4 class="invoice-title mb-1">
                                    INVOICE <span class="invoice-number">#{{ $patient->unique_number }}</span>
                                </h4>
                                <div class="invoice-date-wrapper mb-50">
                                    <span class="invoice-date-title text-label">Date Issued:</span>
                                    <span class="font-weight-bold ml-1"
                                        style="color: #4b4b4b;">{{ \Carbon\Carbon::now()->format('d/m/Y') }}</span>
                                </div>
                                <div class="invoice-date-wrapper">
                                    <span class="invoice-date-title text-label">Due Date:</span>
                                    <span class="font-weight-bold ml-1"
                                        style="color: #4b4b4b;">{{ \Carbon\Carbon::now()->format('d/m/Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="invoice-body">
                        <div class="row mb-5">
                            <div class="col-xl-7 col-md-7 col-12">
                                <h6 class="mb-2 text-label">Invoice To</h6>
                                <h5 class="mb-1 text-dark font-weight-bold">{{ $patient->name }}</h5>
                                <p class="mb-25" style="color: #4b4b4b;">{{ $patient->address }}, {{ $patient->city }}
                                </p>
                                <p class="mb-25" style="color: #4b4b4b;">{{ $patient->phone }}</p>
                                <p class="mb-0" style="color: #4b4b4b;">{{ $patient->email }}</p>
                            </div>
                            <div class="col-xl-5 col-md-5 col-12 mt-md-0 mt-2">
                                <h6 class="mb-2 text-label">Payment Details</h6>
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="text-label" style="text-transform: none;">Total Due:</span>
                                    <span class="font-weight-bold"
                                        style="color: var(--primary-color); font-size: 1.1rem;">Rs.
                                        {{ $totalAmount }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-label" style="text-transform: none;">Bank Name:</span>
                                    <span class="font-weight-bold text-dark">Shafayaat Hospital Account</span>
                                </div>
                            </div>
                        </div>

                        <!-- Invoice Table -->
                        <div class="invoice-table-wrapper mb-5">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" width="60%">Description</th>
                                        <th scope="col" class="text-right">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoices as $invoice)
                                        <tr>
                                            <td>
                                                <span
                                                    class="font-weight-600 text-dark">{{ $invoice->service->service_name }}</span>
                                            </td>
                                            <td class="text-right font-weight-bold" style="color: #4b4b4b;">Rs.
                                                {{ $invoice->service->amount }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Total Section -->
                        <div class="row">
                            <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                <p class="mb-0 small" style="color: #6e6b7b;">
                                    Thank you for choosing Shafayaat Hospital.<br>
                                    This is a computer generated invoice.
                                </p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                                <div class="invoice-total-wrapper w-100" style="max-width: 320px;">
                                    <div class="invoice-total-item">
                                        <span class="text-label" style="text-transform: none;">Subtotal:</span>
                                        <span class="font-weight-bold text-dark">Rs. {{ $totalAmount }}</span>
                                    </div>
                                    <div class="invoice-total-item">
                                        <span class="text-label" style="text-transform: none;">Tax (30%):</span>
                                        <span class="font-weight-bold text-dark">Rs.
                                            {{ 0.3 * (float) $totalAmount }}</span>
                                    </div>
                                    <div class="invoice-total-item grand-total">
                                        <span class="font-weight-bold">Total Due:</span>
                                        <span class="font-weight-bold">Rs.
                                            {{ 0.3 * (float) $totalAmount + (float) $totalAmount }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Invoice Actions -->
            <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <button class="btn btn-outline-primary btn-block mb-2" data-toggle="modal"
                            data-target="#exampleModalCenter">
                            Process Payment
                        </button>
                        <form action="{{ route('pay-decline', $patient->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-block">
                                Decline
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Payment Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Process Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('made-payment', $patient->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="cost"
                        value="{{ 0.3 * (float) $totalAmount + (float) $totalAmount }}">
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label class="font-weight-bold text-dark" for="t-id">Transaction ID <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="t-id" class="form-control"
                                    placeholder="Enter Transaction ID" name="transaction_id" required
                                    value="{{ old('transaction_id') }}" />
                                @error('t-id')
                                    <span class="text-danger small font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-1">
                                <label class="font-weight-bold text-dark">Select Bank <span
                                        class="text-danger">*</span></label>
                                <select class="select2 form-control" name="bank_id">
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}"
                                            data-logo="{{ $bank->bank_logo ? asset($bank->bank_logo) : '' }}">
                                            {{ $bank->bank_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="text-danger small font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light border-0">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script>
        $(document).ready(function() {
            // Simple select2 with logo display
            $('select[name="bank_id"]').select2({
                width: '100%',
                templateResult: function(bank) {
                    if (!bank.id) return bank.text;
                    var logoUrl = $(bank.element).data('logo');
                    if (logoUrl && logoUrl !== '') {
                        return $('<span class="d-flex align-items-center"><img src="' + logoUrl +
                            '" class="rounded-circle mr-1" style="height: 20px; width: 20px; object-fit: cover;"> ' +
                            bank.text + '</span>');
                    }
                    return bank.text;
                },
                templateSelection: function(bank) {
                    if (!bank.id) return bank.text;
                    var logoUrl = $(bank.element).data('logo');
                    if (logoUrl && logoUrl !== '') {
                        return $('<span class="d-flex align-items-center"><img src="' + logoUrl +
                            '" class="rounded-circle mr-1" style="height: 20px; width: 20px; object-fit: cover;"> ' +
                            bank.text + '</span>');
                    }
                    return bank.text;
                },
                escapeMarkup: function(markup) {
                    return markup;
                }
            });

            // Animate invoice card on load
            $('.invoice-preview-card').css({
                'opacity': 0,
                'transform': 'translateY(10px)'
            }).animate({
                'opacity': 1,
                'transform': 'translateY(0)'
            }, 500);
        });
    </script>
@endsection
