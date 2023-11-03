@include('layouts.layout')


<div class="name-position">

    <h1>{{ Auth::user()->name }}</h1>
</div>

<div class="">
    <div class="profile-change-img">
        <div class="profile-image">
            <img id="img-char" src="{{ Auth::user()->image }}" alt="Imagem do usuário">
        </div>
    </div>
    <div class="">
        @auth
            <form action="{{ route('upload.image') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="edit-img">

                    <label class="file-input">
                        <input type="file" name="image" id="inimg-char">
                        <span class="file-input-label"><i class="file-input-icon fas fa-upload"></i></span>
                    </label>
                </div>
                <input type="hidden" name="aumentar_experiencia" value="1">
                <button type="submit" class="upload-button">Enviar</button>
                <hr>
            </form>
        @endauth
    </div>
</div>
<div style="margin-bottom: 40%">
    <button onclick="mostrarConteudo(1)" id="botao1" class="botao-selecionado">Inventario</button>
    <button onclick="mostrarConteudo(2)" id="botao2">Dados Pessoais</button>
    <button onclick="mostrarConteudo(3)" id="botao3">Missões</button>

    <div id="conteudo1" class="conteudo mostrar">
        <div class="inventory">
            <h2>Inventário</h2>
            <h4>Troféus</h4>
            <div class="trofeus-container">
                <div class="inventory-item trofeu-50">
                    <img src="{{ asset('img/trofeus/WhatsApp_Image_2023-06-18_at_18.44.02-removebg-preview.png') }}"
                        alt="Troféu 1">
                    <p>Level 50</p>
                </div>
                <div class="inventory-item trofeu-100">
                    <img src="{{ asset('img/trofeus/WhatsApp_Image_2023-06-18_at_18.44.52-removebg-preview.png') }}"
                        alt="Troféu 2">
                    <p>Level 100</p>
                </div>
                <div class="inventory-item trofeu-500">
                    <img src="{{ asset('img/trofeus/WhatsApp_Image_2023-06-18_at_18.45.09-removebg-preview.png') }}"
                        alt="Troféu 2">
                    <p>Level 500</p>
                </div>
                <div class="inventory-item trofeu-1000">
                    <img src="{{ asset('img/trofeus/WhatsApp_Image_2023-06-18_at_18.45.29-removebg-preview.png') }}"
                        alt="Troféu 2">
                    <p>Level 1000</p>
                </div>
            </div>
            <hr>
            <h4>Insignias</h4>
            <div class="inventory-item insignia-50">
                <img src="{{ asset('img/insignias/WhatsApp_Image_2023-06-18_at_23.24.53-removebg-preview.png') }}"
                    alt="Troféu 1">
                <p>Level 50</p>
            </div>
            <div class="inventory-item insignia-100">
                <img src="{{ asset('img/insignias/WhatsApp_Image_2023-06-18_at_23.25.37-removebg-preview.png') }}"
                    alt="Troféu 2">
                <p>Level 100</p>
            </div>
            <div class="inventory-item insignia-500">
                <img src="{{ asset('img/insignias/WhatsApp_Image_2023-06-18_at_23.25.59-removebg-preview.png') }}"
                    alt="Troféu 2">
                <p>Level 500</p>
            </div>
            <div class="inventory-item insignia-1000">
                <img src="{{ asset('img/insignias/WhatsApp_Image_2023-06-18_at_23.26.12-removebg-preview.png') }}"
                    alt="Troféu 2">
                <p>Level 1000</p>
            </div>
        </div>
    </div>

    <div id="conteudo2" class="conteudo">
        <div class="perfil-content">
            <div class="">
                <div class="" style="
            position: absolute; width: 33%;">
                    <div class="">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="" style="
            position: absolute;
            left: 46%; width: 43%;">
                    <div class="">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
                
            </div>
            @csrf
            <input type="hidden" name="aumentar_experiencia" value="1">

        </div>


    </div>
    <div id="conteudo3" class="conteudo">
        <form action="{{ route('incrementar-experiencia') }}" method="POST">
            @csrf
            <button type="submit">Incrementar Experiência</button>
        </form>       
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var level = document.querySelector('.user-lvl-number');
        var userLevel = level.innerText; // Nível do usuário

        // Selecionar as divs dos troféus
        var trofeu50Div = document.querySelector('.trofeu-50');
        var trofeu100Div = document.querySelector('.trofeu-100');
        var trofeu500Div = document.querySelector('.trofeu-500');
        var trofeu1000Div = document.querySelector('.trofeu-1000');
        var insignia50Div = document.querySelector('.insignia-50');
        var insignia100Div = document.querySelector('.insignia-100');
        var insignia500Div = document.querySelector('.insignia-500');
        var insignia1000Div = document.querySelector('.insignia-1000');

        // Verificar o nível do usuário e exibir as divs correspondentes
        if (userLevel >= 50) {
            trofeu50Div.style.display = 'inline-block';
        }

        if (userLevel >= 100) {
            trofeu100Div.style.display = 'inline-block';
        }

        if (userLevel >= 500) {
            trofeu500Div.style.display = 'inline-block';
        }

        if (userLevel >= 1000) {
            trofeu1000Div.style.display = 'inline-block';
        }
        if (userLevel >= 50) {
            insignia50Div.style.display = 'inline-block';
        }

        if (userLevel >= 100) {
            insignia100Div.style.display = 'inline-block';
        }

        if (userLevel >= 500) {
            insignia500Div.style.display = 'inline-block';
        }

        if (userLevel >= 1000) {
            insignia1000Div.style.display = 'inline-block';
        }
    });
</script>
<script>
    var file = document.getElementById("inimg-char");
    var img = document.getElementById("img-char");
    file.addEventListener("change", (e) => {
        img.src = URL.createObjectURL(e.target.files[0]);
    })
</script>
<script>
    var conteudos = document.getElementsByClassName("conteudo");
    var botoes = document.getElementsByTagName("button");

    function mostrarConteudo(conteudoId) {
        for (var i = 0; i < conteudos.length; i++) {
            conteudos[i].classList.remove("mostrar");
        }
        var conteudo = document.getElementById("conteudo" + conteudoId);
        conteudo.classList.add("mostrar");

        for (var i = 0; i < botoes.length; i++) {
            botoes[i].classList.remove("botao-selecionado");
        }
        var botao = document.getElementById("botao" + conteudoId);
        botao.classList.add("botao-selecionado");
    }
</script>
