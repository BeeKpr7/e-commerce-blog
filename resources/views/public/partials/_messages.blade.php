@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>Success:</strong>{{ Session::get('success') }}
    </div>
@endif
{{-- ERREUR  RECUPERER --}}
@if (isset($errors))
    @if (count($errors) > 0)

        <div class="alert alert-danger" role="alert" style="width:100%;border-radius:5%;">
            <strong>Erreurs:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endif
