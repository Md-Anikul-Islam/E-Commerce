                       <!--slider design fornt page-->


<section id="slider">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                               <?php
                                   $all_published_slider=DB::table('tbl_slider')
                                                 ->where('publication_status',1)
                                                 ->get();
                                   foreach($all_published_slider as $v_slider){?>
                                <?php } ?>
                            </div>  
                        </div>  
                    </div>  
                </div>

                <div id="carousel-example-generic" class="carousel slide " data-ride="carousel">
                
                <ol class="carousel-indicators">
                
                    @foreach($all_published_slider as $v_slider)
                        <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                    @endforeach
                
                </ol>
                
              
                <div class="carousel-inner" role="listbox">
                    @foreach($all_published_slider as $v_slider)
                        <div class="item {{ $loop->first ? ' active' : '' }}" >
                            <img src="{{ $v_slider->slider_image }}"  style="width:750px;  height:350px;" >
                        </div>
                    @endforeach
                    
                </div>

                
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

         </div>
     </div>
 </section>
 