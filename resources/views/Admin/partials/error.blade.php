<div class="m-2">
	@if(session()->has('message'))
        <div class="alert alert-success bg-success" style="z-index:9999999999999;" role="alert">
        	{{ session()->get('message') }}
        	<span style="cursor:pointer;font-size:25px;float:right;" class="closebtn pb-2" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>
        <!-- Refernce : https://www.codegrepper.com/code-examples/php/success+message+in+laravel -->
    @endif
</div>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger rounded" style="z-index:9999999999999;">
            <!-- <div class="text-light"> -->
            {{ $error }}
                <span style="cursor:pointer;font-size:25px;float:right;" class="closebtn pb-2" onclick="this.parentElement.style.display='none';">&times;</span>
            <!-- </div> -->
        </div>
    @endforeach
@endif