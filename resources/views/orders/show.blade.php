@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 text-black">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-6 border-b pb-2">Detalle de la Orden #{{ $order->id }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6 text-lg">
            <div>
                <p><span class="font-semibold">Cliente:</span> {{ $order->user->name }}</p>
                <p><span class="font-semibold">Método de pago:</span> {{ ucfirst($order->payment_method) }}</p>
            </div>
            <div>
                <p><span class="font-semibold">Fecha:</span> {{ \Carbon\Carbon::parse($order->date)->format('d/m/Y H:i') }}</p>
                <p><span class="font-semibold">Total:</span> ${{ number_format($order->total, 2) }}</p>
            </div>
        </div>

        <h2 class="text-2xl font-semibold mb-4 border-b pb-2">Productos comprados</h2>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border border-gray-200 rounded-lg">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">Producto</th>
                        <th class="px-4 py-3">Cantidad</th>
                        <th class="px-4 py-3">Precio Unitario</th>
                        <th class="px-4 py-3">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-800">
                    @forelse ($order->ordenproducts as $item)
                        <tr class="border-t">
                            <td class="px-4 py-3">{{ $item->product->name }}</td>
                            <td class="px-4 py-3">{{ $item->quantity }}</td>
                            <td class="px-4 py-3">${{ number_format($item->price, 2) }}</td>
                            <td class="px-4 py-3">${{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center px-4 py-4 text-gray-500">No hay productos en esta orden.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

