<x-alerts/>

@csrf
<input type="text" name="name" id="name" placeholder="Nome" value="{{ $user->name ?? old('name') }}">  {{-- old('name') pega o valor do campo --}}
<input type="email" name="email" id="email" placeholder="E-Mail" value="{{ $user->email ?? old('email') }}">
<input type="password" name="password" id="password" placeholder="Senha">

<button type="submit">Salvar Inscrição</button>
