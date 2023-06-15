@extends('admin.admin')
@section('titulo', 'Crear Tour en Ingles')
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @if (session('status'))
                <div class="text-success">
                    <div class="alert alert-danger" role="alert">
                        {{ session('status') }}
                    </div>
                </div>
            @endif
        </div>
        <div class="col-12 mt-2">
            <div class="row" style="padding: 1em; border-radius: 10px;">
                <div class="col-lg-6 float-left">
                    <h3>Crear Nuevo Tour en español</h3>
                </div>
                <div class="col-lg-6">
                    <a href="/tours" class="btn btn-primary float-right">Volver</a>
                </div>
            </div>
            <form action="{{ route('tours.update', $tour->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-4 mt-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"
                            value="{{ old('nombre', isset($tour) ? $tour->nombre : '') }}" required>
                        @error('nombre')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-8 mt-3">
                        <label for="descripcion">Descripción</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control"
                            value="{{ old('descripcion', isset($tour) ? $tour->descripcion : '') }}" required>
                        @error('descripcion')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-4 mt-3">
                        <label for="precioReal">Precio Real</label>
                        <input type="number" name="precioReal" class="form-control" id="precioReal"
                            value="{{ old('precioReal', isset($tour) ? $tour->precioReal : '') }}" required>
                        @error('precioReal')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-4 mt-3">
                        <label for="precioPublicado">Precio Publicado</label>
                        <input type="number" name="precioPublicado" class="form-control" id="precioPublicado"
                            value="{{ old('precioPublicado', isset($tour) ? $tour->precioPublicado : '') }}" required>
                        @error('precioPublicado')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-4 mt-3">
                        <label for="dias">Días</label>
                        <input type="number" name="dias" class="form-control" id="dias"
                            value="{{ old('dias', isset($tour) ? $tour->dias : '') }}" required>
                        @error('dias')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-4 mt-3">
                        <label for="categoria">Categoría:</label>
                        <select name="categoria" id="categoria" class="form-control" required>
                            @foreach ($categorias as $id => $nombre)
                                <option value="{{ $id }}">{{ $nombre }}</option>
                            @endforeach
                        </select>
                        @error('categoria')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-4 mt-3">
                        <label for="lugarInicio">Lugar de inicio</label>
                        <input type="text" name="lugarInicio" class="form-control" id="lugarInicio"
                            value="{{ old('lugarInicio', isset($tour) ? $tour->lugarInicio : '') }}">
                        @error('lugarInicio')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-4 mt-3">
                        <label for="lugarFin">Lugar de fin</label>
                        <input type="text" name="lugarFin" class="form-control" id="lugarFin"
                            value="{{ old('lugarFin', isset($tour) ? $tour->lugarFin : '') }}">
                        @error('lugarFin')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-4 mt-3">
                        <label for="imgThumb">Imagen Thumbnail</label>
                        <input type="file" name="imgThumb" class="form-control" id="imgThumb">
                        @error('imgThumb')
                            <div>{{ $message }}</div>
                        @enderror
                        <img id="imgThumbPrev" src="{{ asset($tour->imgThumb) }}"
                            style="width: 100%; height: 200px; object-fit: cover;">
                    </div>

                    <div class="col-lg-4 mt-3">
                        <label for="img">Imagen principal</label>
                        <input type="file" name="img" class="form-control" id="img">
                        @error('img')
                            <div>{{ $message }}</div>
                        @enderror
                        <img id="imgPrev" src="{{ asset($tour->img) }}"
                            style="width: 100%; height: 200px; object-fit: cover;">
                    </div>

                    <div class="col-lg-4 mt-3">
                        <label for="mapa">Mapa</label>
                        <input type="file" class="form-control" name="mapa" id="mapa">
                        @error('mapa')
                            <div>{{ $message }}</div>
                        @enderror
                        <img id="imgMapaPrev" src="{{ asset($tour->mapa) }}"
                            style="width: 100%; height: 200px; object-fit: cover;">
                    </div>

                    <div class="col-lg-12 mt-3">
                        <label for="galeria">Imágenes de la galería:</label>
                        <input type="file" class="form-control" name="galeria[]" id="galeria" multiple>
                        @error('galeria')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="contenido">Contenido</label>
                        <textarea name="contenido" class="ckeditor form-control" id="contenido" required>{{ old('contenido', $tour->contenido) }}</textarea>
                        @error('contenido')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="resumen">Resumen</label>
                        <textarea name="resumen" class="ckeditor form-control" id="resumen" required>{{ old('resumen', $tour->resumen) }}</textarea>
                        @error('resumen')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg-12 mt-3">
                        <label for="detallado">Detallado</label>
                        <textarea name="detallado" class="ckeditor form-control" id="detallado" required>{{ old('detallado', $tour->detallado) }}</textarea>
                        @error('detallado')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="incluidos">Incluidos</label>
                        <textarea name="incluidos" class="ckeditor form-control" id="incluidos" required>{{ old('incluidos', $tour->incluidos) }}</textarea>
                        @error('incluidos')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="importante">Importante</label>
                        <textarea name="importante" class="ckeditor form-control" id="importante">{{ old('importante', $tour->importante) }}</textarea>
                        @error('importante')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-12">
                        <label for="keywords">Palabras clave</label>
                        <input type="text" name="keywords" class="form-control" id="keywords"
                            value="{{ old('keywords', isset($tour) ? $tour->keywords : '') }}" required>
                        @error('keywords')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg-12">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug"
                            value="{{ old('slug', isset($tour) ? $tour->slug : '') }}" required>
                        @error('slug')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>                    

                    <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
                </div>
            </form>

        </div>
    </div>
    <script type="text/javascript">
        CKEDITOR.replace('.ckeditor', {
            extraPlugins: 'youtube',
            toolbar: [
                ['Youtube']
            ]
        });
    </script>
    <script>
        const seleccionArchivosThumb = document.querySelector("#imgThumb");
        const imagenPrevisualizacionThumb = document.querySelector("#imgThumbPrev");
        seleccionArchivosThumb.addEventListener("change", () => {
            mostrarPrevisualizacion(seleccionArchivosThumb, imagenPrevisualizacionThumb);
        });

        const seleccionArchivosImg = document.querySelector("#img");
        const imagenPrevisualizacionImg = document.querySelector("#imgPrev");
        seleccionArchivosImg.addEventListener("change", () => {
            mostrarPrevisualizacion(seleccionArchivosImg, imagenPrevisualizacionImg);
        });

        const seleccionArchivosMapa = document.querySelector("#mapa");
        const imagenPrevisualizacionMapa = document.querySelector("#imgMapaPrev");
        seleccionArchivosMapa.addEventListener("change", () => {
            mostrarPrevisualizacion(seleccionArchivosMapa, imagenPrevisualizacionMapa);
        });

        function mostrarPrevisualizacion(input, imagen) {
            const archivos = input.files;
            if (!archivos || !archivos.length) {
                imagen.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            imagen.src = objectURL;
        }
    </script>

@endsection
