@include('layouts.layout')



<div class="container-slider">
    <div class="slider">
        <div class="box1">
        </div>
        <div class="box2">
        </div>
        <div class="box3">
        </div>
        <div class="box4">
        </div>
        <div class="box5">
        </div>
        <div class="box6">
        </div>
        <div class="box7">
        </div>
    </div>
</div>
<div id="test"></div>
<hr>
<div class="box-body">
    <h2>Sobre</h2>
    <p>Este trabalho trata sobre o desenvolvimento de um site para fins educativos, especificamente para conteúdo de vestibulares. O projeto é pensado de forma que atende às pessoas com baixa renda. Para o site manter-se sempre monetizado, optou-se pelo método de Propagandas e Cooperativismo de plataforma, em que visa o professor fazer divulgações de suas mentorias, o capital arrecadado será dividido para os professores.</p>
    <p>O site permite que o usuário realize o cadastro para disfrutar das ferramentas, sendo elas, gerenciamento do seu plano de estudos para organizar sua rotina, além de ter bloco de notas e um fórum onde está presente outros usuários para ajudar nos estudos, assim, criando uma interação entre as pessoas.</p>
    <p>Para que o usuário tenha a facilidade nos estudos, o projeto terá uma ferramenta que criara uma rotina, em que o usuário poderá personalizar ou até mesmo criar, ajudando a ter resiliência no aprendizado e ter uma noção de quanto tempo falta para o vestibular. Para criar a rotina, caso o usuário escolha que o site a construa, perguntas serão feitas e de acordo com as respostas, a sugestão de rotina é gerada, mas pode alterar, caso queira. A site apresenta quais matérias devem ser estudada no dia.</p>
    <p>A ferramenta de anotação será um lugar com pastas personalizadas, com bloco de notas, para que o usuário coloque dúvidas e anotações para revisar, ferramentas extras para ajudar a estilizar as anotações.  </p>
    <p>O fórum ajuda os usuários a se ajudarem, assim podem trocar de nível e ganhar insígnias, como forma de incentivo, além de ter professores ajudando dentro do fórum. As redações postadas no fórum, serão corrigidas pela comunidade e professores. O site propõe aos professores divulgação de suas mentorias e ajuda no fórum. O projeto desenvolvido para ser um site com gamificação, fazendo com que o cliente fique ativo.</p>
    <p></p>
</div>
<script type="text/javascript">
    function rotate() {
        var lastChild = $('.slider div:last-child').clone();
        /*$('#test').html(lastChild)*/
        $('.slider div').removeClass('firstSlide')
        $('.slider div:last-child').remove();
        $('.slider').prepend(lastChild)
        $(lastChild).addClass('firstSlide')
    }

    window.setInterval(function() {
        rotate()
    }, 4000);
</script>

<footer>
    <p>&copy; 2023 - Todos os direitos reservados</p>
</footer>
