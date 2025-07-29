@extends('templates.default')

@section('content')
    <div class="container my-4">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-warning text-dark">
                <strong>Modifica Punto di Interesse</strong>
            </div>

            <div class="card-body">
                <form action="{{ route('poi.update', $poi) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Titolo -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $poi->title) }}" required>
                    </div>

                    <!-- Descrizione -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $poi->description) }}</textarea>
                    </div>

                    <!-- Categoria -->
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria</label>
                        <select name="category">
                            @foreach($categorie as $cat)
                            <option value="{{$cat}}" @if($cat == $poi->category) selected @endif>{{$cat}}</option>
                            @endforeach
                        </select>

                    </div>

                    <!-- Coordinate -->
                    @php
                        $loc = json_decode($poi->location);
                    @endphp

                    <div class="mb-3 row">
                        <div class="col">
                            <label for="latitude" class="form-label">Latitudine</label>
                            <input type="number" step="0.000001" name="latitude" id="latitude" class="form-control" value="{{ old('latitude', $loc->latitude ?? '') }}">
                        </div>
                        <div class="col">
                            <label for="longitude" class="form-label">Longitudine</label>
                            <input type="number" step="0.000001" name="longitude" id="longitude" class="form-control" value="{{ old('longitude', $loc->longitude ?? '') }}">
                        </div>
                    </div>


                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Salva modifiche</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
