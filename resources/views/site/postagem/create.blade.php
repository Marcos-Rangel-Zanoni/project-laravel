<!-- resources/views/postagem/create.blade.php -->

<div class="user-postagem">
    <form id="form-post" enctype="multipart/form-data">

        @csrf
        <h1>Postagem</h1>
        <textarea id="dadosReset" name="texto" placeholder="Digite seu texto aqui" required></textarea>

        <!-- Campo oculto no formulário -->
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">


        <div class="wrap">
            <button type="submit" class="button">Enviar</button>
          </div>
    </form>

    <!-- Exemplo de exibição de mensagens após a postagem -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

{{-- <script>
    $(document).ready(function() {
        const addStoreUrl = '/postagem/add';
        const addPullDb = '/postagem/pull'
        const formPost = $('#form-post');
        const dadosReset = $('#dadosReset');

        formPost.on('submit', function(e) {
            e.preventDefault();
            const dadosForm = new FormData(this);
            envBd(dadosForm);
            formPost.each(function() {
                this.reset();
            });

            loadForm();
        });

        function envBd(dadosForm) {
            $.ajax({
                    url: addStoreUrl,
                    type: 'POST',
                    data: dadosForm,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                })
                .done(function(response) {
                    console.log("Success");
                    userPost(response);
                    loadForm();

                })
                .fail(function(error, status) {
                    console.log("Error");
                })
        }

        function loadForm() {
            $.ajax({
                    url: addPullDb,
                    type: 'GET',
                    dataType: 'json',
                })
                .done(function(data) {
                    console.log('Entrou e carregou os dados');
                    userPost(data);
                })
                .fail(function(xhr, status, error) {
                    console.error('Erro ao carregar dados', error);
                });
        }

        function userPost(data) {
            const pullContainer = $('#post');
            pullContainer.empty();

            if (data.length === 0) {
                console.log('Não há comentários');
            } else {
                data.forEach(function(item) {
                    const pull = $('<div>').addClass('pull');
                    const pullHeader = $('<div>').addClass('pull-header');
                    const pullAuthor = $('<div>').addClass('pull-author').append($('<h3>').text(
                        item.user_id));
                    const pullDate = $('<div>').addClass('pull-date').append($('<p>').text(item
                        .created_at));
                    const pullBody = $('<div>').addClass('pull-body').append($('<p>').text(item
                        .texto));

                    pull.append(pullHeader, pullAuthor, pullDate, pullBody);
                    pullContainer.append(pull);


                });
                loadComments();
            }
        }


    });
</script>
<script>
    const textarea = document.querySelector('textarea');
    textarea.addEventListener('keyup', e => {
        textarea.style.height = "63px";
        let scHeight = e.target.scHeight;
        textarea.style.height = `${scHeight}px`;
    });
</script> --}}
