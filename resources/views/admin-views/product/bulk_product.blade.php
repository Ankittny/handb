@extends('layouts.back-end.app')

@section('content')
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">{{ translate('Bulk Orders') }}</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>{{ translate('Product ID') }}</th>
                            <th>{{ translate('Name') }}</th>
                            <th>{{ translate('Email') }}</th>
                            <th>{{ translate('Phone Number') }}</th>
                            <th>{{ translate('Quantity') }}</th>
                            <th>{{ translate('Created At') }}</th>
                            <th>{{ translate('Status') }}</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @php
                                    $product = App\Models\Product::find($order->product_id)->name;
                                @endphp
                                <td>{{ $product ?? "" }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone_number }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>

                                    <select class="form-control" onchange="updateOrderStatus(this)" data-order-id="{{ $order->id }}">
                                        <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>{{ translate('Pending') }}</option>
                                        <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>{{ translate('Approved') }}</option>
                                        <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>{{ translate('Rejected') }}</option>
                                    </select>

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-muted">{{ translate('No bulk orders found.') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-3">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>
@push('script')

<script>
    function updateOrderStatus(selectElement) {

        let orderId = selectElement.getAttribute("data-order-id");
        let status = selectElement.value;

        $.ajax({
            url: "{{ route('admin.products.bulk-export-ajax') }}",
            type: "POST",
            data: { order_id: orderId, status: status },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token for Laravel
            },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });

    }
</script>

@endpush

@endsection




