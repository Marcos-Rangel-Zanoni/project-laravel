{{-- @include('layouts.layout') --}}
{{-- <div class="">
    <ul>
        <li><a href="#tab1" class="tab-link">Item 1</a></li>
        <li><a href="#tab2" class="tab-link">Item 2</a></li>
        <li><a href="#tab3" class="tab-link">Item 3</a></li>
    </ul>
</div>
<div id="tab1" class="tab-content">
    <h2>Conteúdo da aba 1</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>

<div id="tab2" class="tab-content">
    <h2>Conteúdo da aba 2</h2>
    <p>Ut semper arcu ut feugiat ultricies. Fusce auctor, metus ac consequat vulputate, odio nisl mollis purus,
        eget lobortis odio nibh at dui.</p>
</div>

<div id="tab3" class="tab-content">
    <h2>Conteúdo da aba 3</h2>
    <p>Praesent hendrerit ligula quis nulla vestibulum, at iaculis ex pharetra.</p>
</div> --}}
<style>
    body {
        margin: 0;
        padding: 0;
    }

    .container {
        height: 2000px;
    }

    .indicador-container {
        width: 100px;
        height: 100px;
        background-color: red;
        position: fixed;
        top: -100px;
        left: 50%;
        transform: translateX(-50%);
        transition: top 0.5s;
    }

    .indicador-container.active {
        top: 0;
    }

    .text-container {
        display: none;
        position: fixed;
        top: 100px;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        background-color: #f9f9f9;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .indicador-container.active+.text-container {
        display: block;
    }
</style>

<div class="indicador-container"></div>

<div class="text-container">
    <h2>Texto Revelado</h2>
    <p>Este é o texto que será revelado quando o indicador chegar à parte inferior da página.</p>
</div>
<script>
    < script >
        window.addEventListener('scroll', function() {
            var indicator = document.querySelector('.indicador-container');
            var textContainer = document.querySelector('.text-container');

            var windowHeight = window.innerHeight;
            var scrollPosition = window.scrollY || window.pageYOffset;

            var indicatorPosition = indicator.offsetTop;

            if (scrollPosition >= indicatorPosition - windowHeight / 2) {
                indicator.classList.add('active');
            }
        });
</script>
</script>
<script>
    // $(document).ready(function() {
    //     $('.tab-link').click(function(e) {
    //         e.preventDefault();

    //         var target = $(this).attr('href');

    //         $('.tab-content').removeClass('visible');
    //         $(target).toggleClass('visible');
    //     });
    // });
</script>


{{-- 
<div class="">
    <div class="">
        <div class="">
            <div class="">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="">
            <div class="">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="">
            <div class="">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
        <div class="">
            <div class="">
                <form action="{{ route('upload.image') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image">
                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
