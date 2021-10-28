<style>
    .parent {
        position: relative;
    }
    #flash_message {
        position: absolute;
        top: 0px;
        right: -5px;
        opacity: 0.9;
        color: white;
    }
    #flash_message:hover{
        transform: scale(1.1);
        opacity: 1.1;
    }
</style>
<div style="z-index: 99;" id="flash_message">
    @if(Session::has('flash_message'))
        <p class="alert bg-success"><i class="fa fa-thumbs-up"></i></p>
    @endif
</div>

