<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pembelian</title>
    <link rel="stylesheet" href="{{ public_path('b3/bootstrap.min.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .header, .footer {
            text-align: center;
            color: #777;
        }
        .header {
            margin-top: 20px;
            margin-bottom: 50px;
        }
        .footer {
            margin-top: 50px;
            font-size: 12px;
        }
        .company-info, .supplier-info, .invoice-info {
            margin-bottom: 40px;
        }
        .company-info h4, .supplier-info h4, .invoice-info h4 {
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f8f8f8;
        }
        .totals-table {
            width: 300px;
            float: right;
        }
        .totals-table td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="header">
            <img width="180" src="{{ public_path('images/ujaylogin.png') }}" alt="Logo">
                       <h1>Invoice Pembelian</h1>
            <h2>Reference: <strong>{{ $purchase->reference }}</strong></h2>
        </div>
        <div class="row">
            <div class="col-md-4 company-info">
                <h4>Nama Perusahaan</h4>
                <strong>{{ settings()->company_name }}</strong>
                <div>{{ settings()->company_address }}</div>
                <div>Email: {{ settings()->company_email }}</div>
                <div>Phone: {{ settings()->company_phone }}</div>
            </div>

            <div class="col-md-4 supplier-info">
                <h4>Nama Supplier</h4>
                <strong>{{ $supplier->supplier_name }}</strong>
                <div>{{ $supplier->address }}</div>
                <div>Email: {{ $supplier->supplier_email }}</div>
                <div>Phone: {{ $supplier->supplier_phone }}</div>
            </div>

            <div class="col-md-4 invoice-info">
                <h4>Surat Faktur</h4>
                <div>Invoice: <strong>INV/{{ $purchase->reference }}</strong></div>
                <div>Date: {{ \Carbon\Carbon::parse($purchase->date)->format('d M, Y') }}</div>
                               <div>Status: <strong>{{ $purchase->status }}</strong></div>
                <div>Payment Status: <strong>{{ $purchase->payment_status }}</strong></div>
            </div>
        </div>

        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga Barang</th>
                        <th>Kuantitas</th>
                        <th>Diskon</th>
                        <th>Pajak</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchase->purchaseDetails as $item)
                        <tr>
                            <td>{{ $item->product_name }} <br> <span class="badge badge-success">{{ $item->product_code }}</span></td>
                            <td>{{ format_currency($item->unit_price) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ format_currency($item->product_discount_amount) }}</td>
                            <td>{{ format_currency($item->product_tax_amount) }}</td>
                            <td>{{ format_currency($item->sub_total) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="totals-table">
            <table class="table">
                <tbody>
                    <tr>
                        <td><strong>Discount ({{ $purchase->discount_percentage }}%)</strong></td>
                        <td>{{ format_currency($purchase->discount_amount) }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tax ({{ $purchase->tax_percentage }}%)</strong></td>
                        <td>{{ format_currency($purchase->tax_amount) }}</td>
                    </tr>
                    <tr>
                        <td><strong>Shipping</strong></td>
                        <td>{{ format_currency($purchase->shipping_amount) }}</td>
                    </tr>
                    <tr>
                        <td><strong>Grand Total</strong></td>
                        <td><strong>{{ format_currency($purchase->total_amount) }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>{{ settings()->company_name }} &copy; {{ date('Y') }}.</p>
        </div>
    </div>
</body>

</html>

