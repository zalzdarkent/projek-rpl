<div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form wire:submit="generateReport">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Dari Tanggal <span class="text-danger">*</span></label>
                                    <input wire:model="start_date" type="date" class="form-control" name="start_date">
                                    @error('start_date')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Sampai Tanggal <span class="text-danger">*</span></label>
                                    <input wire:model="end_date" type="date" class="form-control" name="end_date">
                                    @error('end_date')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Pembayaran</label>
                                    <select wire:model.live="payments" class="form-control" name="payments">
                                        <option value="">Pilih Pembayaran</option>
                                        <option value="sale">Penjualan</option>
                                        <option value="sale_return">Retur Penjualan</option>
                                        <option value="purchase">Pembelian</option>
                                        <option value="purchase_return">Retur Pembelian</option>
                                    </select>
                                    @error('payments')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Metode Pembayaran</label>
                                    <select wire:model="payment_method" class="form-control" name="payment_method">
                                        <option value="">Pilih Metode Pembayaran!</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Credit Card">Credit Card</option>
                                        <option value="Bank Transfer">Bank Transfer</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                <span wire:target="generateReport" wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <i wire:target="generateReport" wire:loading.remove class="bi bi-shuffle"></i>
                                Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if($information->isNotEmpty())
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <table class="table table-bordered table-striped text-center mb-0">
                            <div wire:loading.flex class="col-12 position-absolute justify-content-center align-items-center" style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Reference</th>
                                <th>{{ ucwords(str_replace('_', ' ', $payments)) }}</th>
                                <th>Total</th>
                                <th>Payment Method</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($information as $data)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($data->date)->format('d M, Y') }}</td>
                                    <td>{{ $data->reference }}</td>
                                    <td>
                                        @if($payments == 'sale')
                                            {{ $data->sale->reference }}
                                        @elseif($payments == 'purchase')
                                            {{ $data->purchase->reference }}
                                        @elseif($payments == 'sale_return')
                                            {{ $data->saleReturn->reference }}
                                        @elseif($payments == 'purchase_return')
                                            {{ $data->purchaseReturn->reference }}
                                        @endif
                                    </td>
                                    <td>{{ format_currency($data->amount) }}</td>
                                    <td>{{ $data->payment_method }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">
                                        <span class="text-danger">Tidak ada data yang tersedia!</span>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div @class(['mt-3' => $information->hasPages()])>
                            {{ $information->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="alert alert-warning mb-0">
                        Tidak ada data yang tersedia!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
