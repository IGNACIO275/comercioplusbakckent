@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Facturas Emitidas</h1>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Cliente</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Total</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Método de Pago</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Fecha</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Estado</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @forelse ($sales as $sale)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-sm text-gray-800">{{ $sale->id }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800">{{ $sale->user->name ?? 'N/A' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800">${{ number_format($sale->total, 2) }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800">{{ $sale->payment_method }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800">{{ $sale->sale_date->format('d/m/Y') }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded bg-green-100 text-green-700">
                            {{ ucfirst($sale->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">No hay facturas registradas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $sales->links() }}
    </div>
</div>
@endsection


