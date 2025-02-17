@extends('admin.sistema')

@section('admin')

<div class="container">
    <h2>Entrega de Vehículo</h2>

    <form action="{{ route('entregas.store', $orden->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Fecha de Entrega:</label>
            <input type="date" class="form-control" name="fecha_entrega" value="{{ now()->toDateString() }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Policía que Recibe:</label>
            <select name="personal_recibio_id" class="form-control" required>
                @foreach($policiales as $p)
                    <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Kilometraje Actual:</label>
            <input type="number" class="form-control" name="kilometraje_actual" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Observaciones:</label>
            <textarea class="form-control" name="observaciones"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Registrar Entrega</button>
    </form>
</div>

@endsection
