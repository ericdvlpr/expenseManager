@include('includes.header')
    <div class="container-fluid mt-5" >
        <div class="row">
            <?php if(Auth::user()){ ?>
                <div class="col-md-4">
                    @include('includes.sidebar')
                </div>   
                <div class="col-md-8">
                        @yield('content')
                    </div>  
            <?php }else{?>    
                <div class="col-md-12">
                    @yield('content')
                </div>
            <?php }?>
        </div>
            
    </div>
@include('includes.footer')