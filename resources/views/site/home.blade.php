@extends('layouts.layout')



@section('content')


    <div class="window-containers-carousel">
        
        <div class="">

            <!--This is the main container that contains the whole timeline.-->
            <section class="design-section">
                <div class="timeline">

                    <!--Well, The reason for this div is to fill space.
                        This space is technically used for keeping dates,
                        but I didn't find the need for dates. However, I'll provide
                        you the styling for dates, so that you can use it if you
                        wanted to.-->
                    <div class="timeline-empty">
                    </div>

                    <!--This is the class where the timeline graphics are
                        housed in. Note that we have timeline-circle
                        here for that pointer in timeline.-->

                    <div class="timeline-middle">
                        <div class="timeline-circle"></div>
                    </div>
                    <div class="timeline-component timeline-content">
                       
                        <h3></h3>
                        <p></p>
                        <p>2 horas Português</p>

                    </div>
                    <div class="timeline-component timeline-content">
                        <h3>Dia 25 de maio de 2023</h3>
                        <p>2 horas Português</p>
                        <p>2 horas Química</p>
                        <p>2 horas Biologia</p>
                    </div>
                    <div class="timeline-middle">
                        <div class="timeline-circle"></div>
                    </div>
                    <div class="timeline-empty">
                    </div>

                    <div class="timeline-empty">
                    </div>

                    <div class="timeline-middle">
                        <div class="timeline-circle"></div>
                    </div>
                    <div class=" timeline-component timeline-content">
                        <h3>Dia 26 de maio de 2023</h3>
                        <p>4 horas Química</p>
                        <p>2 horas Biologia</p>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
