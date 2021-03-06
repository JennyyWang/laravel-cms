@component('mail::message')
# Hi {{ $customer->name }},

@component('mail::panel')
Your order is in progressing now <br>
<table>
    <tr>
        <td style="width: 40%;"><h4>Order #{{ $order->serial_number }}</h4></td>
        <td style="width: 60%;">
            <p style="text-align: right;">
                Place order #:
                <b style="color: #409EFF;">{{ $order->place_order_number }}</b>
            </p>
        </td>
    </tr>
    <tr>
        <td><h5 style="padding-left: 12px; font-weight: bold;">Status</h5></td>
        <td><span style="color: red;">Pending</span></td>
    </tr>
    <tr>
        <td>
            <h5 style="padding-left: 12px; font-weight: bold;">Order Cost (GST INCL)</h5>
        </td>
        <td>{{ config('system.CURRENCY').number_format($order->total,2) }}</td>
    </tr>
    <tr>
        <td>
            <h5 style="padding-left: 12px; font-weight: bold;">Shipment Fee</h5>
        </td>
        <td>{{ $order->delivery_charge>0 ? config('system.CURRENCY').number_format($order->delivery_charge,2) : 'Free' }}</td>
    </tr>

    <tr>
        <td>
            <h5 style="padding-left: 12px; font-weight: bold;">Total (GST INCL)</h5>
        </td>
        <td>{{ config('system.CURRENCY').number_format($order->total+$order->delivery_charge,2) }}</td>
    </tr>
    <tr>
        <td>
            <h5 style="padding-left: 12px; font-weight: bold;">Ship to</h5></td>
        <td>{{ $customer->addressText() }}</td>
    </tr>
</table>
<br>
@component('mail::button', ['url' => $viewOrderUrl, 'color' => 'green'])
View Order Details
@endcomponent

@endcomponent

Thanks!<br>
@endcomponent
