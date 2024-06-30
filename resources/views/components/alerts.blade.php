    {{-- Verifica se existe algum erro com a verificação e caso exista o retorna aqui --}}
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="error">{{ $error }}</div>
        @endforeach
    @endif

    @if(session()->has('success'))
        <div class="success text-green-500">{{ session('success') }}</div>
    @endif

    @if(session()->has('warning'))
        <div class="warning texte-yellow-500">{{ session('warning') }}</div>
    @endif

    @if(session()->has('danger'))
        <div class="danger texte-red-500">{{ session('danger') }}</div>
    @endif
