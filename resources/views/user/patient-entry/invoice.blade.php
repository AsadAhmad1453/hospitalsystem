@extends('user.layouts.main')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/pages/app-invoice.css') }}">
@endsection

@section('content')
                   <section class="invoice-preview-wrapper">
                    <div class="row invoice-preview">
                        <!-- Invoice -->
                        <div class="col-xl-12 col-md-12 col-12">
                            <div class="card invoice-preview-card">
                                <div class="card-body invoice-padding pb-0">
                                    <!-- Header starts -->
                                    <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                        <div>
                                            <div class="logo-wrapper">
                                                <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                                    <defs>
                                                        <linearGradient id="invoice-linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                                            <stop stop-color="#000000" offset="0%"></stop>
                                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="invoice-linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                                            <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                                        </linearGradient>
                                                    </defs>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-400.000000, -178.000000)">
                                                            <g transform="translate(400.000000, 178.000000)">
                                                                <path class="text-primary" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill: currentColor"></path>
                                                                <path d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#invoice-linearGradient-1)" opacity="0.2"></path>
                                                                <polygon fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                                                <polygon fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                                                <polygon fill="url(#invoice-linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <h3 class="text-primary invoice-logo">Vuexy</h3>
                                            </div>
                                            <p class="card-text mb-25">{{ $patient->address }}</p>
                                            <p class="card-text mb-25">{{ $patient->city }}</p>
                                            <p class="card-text mb-0">{{ $patient->phone }}</p>
                                        </div>
                                        <div class="mt-md-0 mt-2">
                                            <h4 class="invoice-title">
                                                <span class="invoice-number">
                                                    {{ $patient->unique_number }}
                                                </span>
                                            </h4>
                                            <div class="invoice-date-wrapper">
                                                <p class="invoice-date-title">Date Issued:</p>
                                                <p class="invoice-date">{{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
                                            </div>
                                            <div class="invoice-date-wrapper">
                                                <p class="invoice-date-title">Due Date:</p>
                                                <p class="invoice-date">{{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Header ends -->
                                </div>

                                <hr class="invoice-spacing" />

                                <!-- Address and Contact starts -->
                                <div class="card-body invoice-padding pt-0">
                                    <div class="row invoice-spacing">
                                        <div class="col-xl-8 p-0">
                                            <h6 class="mb-2">Invoice To:</h6>
                                            <h6 class="mb-25">{{ $patient->name }}</h6>
                                            <p class="card-text mb-25">Shelby Company Limited</p>
                                            <p class="card-text mb-25">{{ $patient->address }}, {{ $patient->city }}</p>
                                            <p class="card-text mb-25">{{ $patient->phone }}</p>
                                            <p class="card-text mb-0">{{ $patient->email }}</p>
                                        </div>
                                        <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                            <h6 class="mb-2">Payment Details:</h6>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="pr-1">Total Due:</td>
                                                        <td><span class="font-weight-bold">{{ $totalAmount }}$</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-1">Bank name:</td>
                                                        <td>American Bank</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-1">Country:</td>
                                                        <td>United States</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-1">IBAN:</td>
                                                        <td>ETD95476213874685</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-1">SWIFT code:</td>
                                                        <td>BR91905</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Address and Contact ends -->

                                <!-- Invoice Description starts -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="py-1">Task description</th>
                                                <th class="py-1">Rate</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoices as $invoice)
                                            <tr>
                                                <td class="py-1">
                                                    <p class="card-text font-weight-bold mb-25">{{ $invoice->service->service_name }}</p>

                                                </td>
                                                <td class="py-1">
                                                    <span class="font-weight-bold">{{ $invoice->service->amount }}</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-body invoice-padding pb-0">
                                    <div class="row invoice-sales-total-wrapper">
                                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                            {{-- <p class="card-text mb-0">
                                                <span class="font-weight-bold">Salesperson:</span> <span class="ml-75">Alfie Solomons</span>
                                            </p> --}}
                                        </div>
                                        <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                                            <div class="invoice-total-wrapper">
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Subtotal:</p>
                                                    <p class="invoice-total-amount">{{ $totalAmount }}$</p>
                                                </div>
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Tax:</p>
                                                    <p class="invoice-total-amount">30%</p>
                                                </div>
                                                <hr class="my-50" />
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Total:</p>
                                                    <p class="invoice-total-amount">{{ ((0.3 * (float)$totalAmount) + (float)$totalAmount) }}$</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Invoice Description ends -->

                                <hr class="invoice-spacing" />

                                <!-- Invoice Note starts -->
                                <div class="card-body invoice-padding pt-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="font-weight-bold">Note:</span>
                                            <span>Thanks for trusting our services!</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Invoice Note ends -->
                            </div>
                        </div>
                        <!-- /Invoice -->

                        <!-- Invoice Actions -->
                        <div class=" col-12 invoice-actions mt-md-0 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <button class="btn btn-primary btn-block mb-75"  data-toggle="modal" data-target="#exampleModalCenter">
                                        Payment
                                    </button>
                                    <form action="{{ route('pay-decline', $patient->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger w-100">Decline</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Actions -->
                    </div>
                </section>

                <!-- Send Invoice Sidebar -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Transaction ID</h5>
                                <buttson type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('made-payment', $patient->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="cost" value="{{ ((0.3 * (float)$totalAmount) + (float)$totalAmount) }}">
                                <div class="modal-body d-flex">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="t-id">T.ID</label>
                                            <input type="text" id="t-id" class="form-control" placeholder="Transaction ID" name="transaction_id" required value="{{ old('transaction_id') }}" />
                                            @error('t-id')
                                                <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-1">
                                        <label>Select Bank</label>
                                        <select class="select2 form-control form-control-lg" name="bank_id">
                                            @foreach ($banks as $bank)
                                                <option value="{{ $bank->id }}" data-logo="{{ $bank->bank_logo ? asset('storage/' . $bank->bank_logo) : '' }}">
                                                    {{ $bank->bank_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('user_id')   
                                                <span class="text-danger" style="font-weight: 600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" >Accept</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Send Invoice Sidebar -->

                <!-- Add Payment Sidebar -->
                {{-- <div class="modal modal-slide-in fade" id="add-payment-sidebar" aria-hidden="true">
                    <div class="modal-dialog sidebar-lg">
                        <div class="modal-content p-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title">
                                    <span class="align-middle">Add Payment</span>
                                </h5>
                            </div>
                            <div class="modal-body flex-grow-1">
                                <form>
                                    <div class="form-group">
                                        <input id="balance" class="form-control" type="text" value="Invoice Balance: 5000.00" disabled />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="amount">Payment Amount</label>
                                        <input id="amount" class="form-control" type="number" placeholder="$1000" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="payment-date">Payment Date</label>
                                        <input id="payment-date" class="form-control date-picker" type="text" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="payment-method">Payment Method</label>
                                        <select class="form-control" id="payment-method">
                                            <option value="" selected disabled>Select payment method</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Bank Transfer">Bank Transfer</option>
                                            <option value="Debit">Debit</option>
                                            <option value="Credit">Credit</option>
                                            <option value="Paypal">Paypal</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="payment-note">Internal Payment Note</label>
                                        <textarea class="form-control" id="payment-note" rows="5" placeholder="Internal Payment Note"></textarea>
                                    </div>
                                    <div class="form-group d-flex flex-wrap mb-0">
                                        <button type="button" class="btn btn-primary mr-1" data-dismiss="modal">Send</button>
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- /Add Payment Sidebar -->

@endsection

@section('custom-js')
<script>
$(document).ready(function() {
    // Debug: Log the data-logo values
    $('select[name="bank_id"] option').each(function() {
        var logoUrl = $(this).data('logo');
        console.log('Bank: ' + $(this).text() + ', Logo URL: ' + logoUrl);
    });
    
    // Simple select2 with logo display
    $('select[name="bank_id"]').select2({
        templateResult: function(bank) {
            if (!bank.id) return bank.text;
            
            var logoUrl = $(bank.element).data('logo');
            console.log('Template Result - Bank: ' + bank.text + ', Logo: ' + logoUrl);
            
            if (logoUrl && logoUrl !== '') {
                return '<img src="' + logoUrl + '" style="height: 1rem; width: auto; margin-right: 5px; vertical-align: middle;" onerror="this.style.display=\'none\';">' + bank.text;
            }
            return bank.text;
        },
        templateSelection: function(bank) {
            if (!bank.id) return bank.text;
            
            var logoUrl = $(bank.element).data('logo');
            console.log('Template Selection - Bank: ' + bank.text + ', Logo: ' + logoUrl);
            
            if (logoUrl && logoUrl !== '') {
                return '<img src="' + logoUrl + '" style="height: 1rem; width: auto; margin-right: 5px; vertical-align: middle;" onerror="this.style.display=\'none\';">' + bank.text;
            }
            return bank.text;
        },
        escapeMarkup: function(markup) {
            return markup;
        }
    });
});
</script>
@endsection
