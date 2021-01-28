@push( 'page_css' )

<style>
	#filter-collapse{
		max-width: 90vw;
	}
	#filter-collapse .filter-text{
		width: 25%!important;
		word-break: break-all!important;
	}
	#filter-collapse .filter-text.filter-to-text{
		width: 6%!important;
	}
	#filter-collapse .data_button_container{
		width: 100%;
	}
	#filter-collapse .data_button_container.filter_button{
		width: auto;
	}
	.full-width{
		width: 73%;
	}
	.full-width input{
		width: 100%;
	}
	.half-width{
		width: 32%;
	}
	.half-width input{
		width: 100%;
	}
	.loader{
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		background-color: #8080807d!important;
	}
	.spinner-grow{
		width: 6rem!important;
		height: 6rem!important;
	}
	.fullscreen{
		height: 100vh!important;
		width: 6rem;
	}
	.filter-text{
		font-size: 15px!important;
		font-weight: 800!important;
	}
	.filter-text-input{
		font-size: 12px!important;
		font-weight: 800!important;
	}
	.pointer-cursor{
		cursor: auto!important;
	}
	.mm, .hh, .ss{
		background-color: #ffffff;
		font-weight: bold;
	}
	.exam .title{
		font-weight: bold;
		font-size: 35px;
	}
	.text-attempt{
		color: #008000!important;
		font-size: 13px!important;
		
	}
	.text-n_attempt{
		color: #ff0000!important;
		font-size: 13px!important;
		
	}
	.text-review{
		color: #ffdf00!important;
		font-size: 13px!important;
		
	}
	.text-current{
		color: #4b78ff!important;
		font-size: 13px!important;
		
	}
	.attempt{
		background-color: #008000;
	}
	.n_attempt{
		background-color: #ff0000;
	}
	.review{
		background-color: #ffdf00;
	}
	.current{
		background-color: #4b78ff;
	}
	.question_summary span{
		font-size: 20px;
		color: #ffffff;
		font-weight: 700;
		/*min-width: 2.9rem;*/
	}
	.question_summary{
		background-color: #eaefff;
		border-radius: 0.5rem;
		position: sticky;
		top: 0.5rem;
	}
	.w-fit-content{
		width: fit-content;
	}
	.icon{
		font-size: 2rem;
	}
	.qs_type{
		text-transform: uppercase;
		font-weight: 800;
		color: #0000005c;
		font-size: 11px;
	}
	.question{
		font-size: 40px;
		font-weight: 600;
		color: #3f424e;
	}
	.option-number{
		background-color: #ff0000;
		border-radius: 1rem;
		font-weight: 800;
		font-size: 20px;
		color: #ffffff;
	}
	.option-text{
		font-size: 17px;
		font-weight: 600;
	}
	.option{
		background-color: #ff00002e;
		border-color: #ff0000!important;
		border-radius: 1rem;
		border: 1px solid;
	}
	input:checked + label .option{
		background-color: #0080002e!important;
		border-color: #008000!important;
		border: 1px solid;
	}
	input:checked + label .option-number{
		background-color: #008000;
	}
	input[type="checkbox"][readonly], input[type="checkbox"][readonly] + label {
		pointer-events: none;
	}
	.z-index-up{
		z-index: 999!important
	}
	.p-left-absolute{
		left: 0;
		position: absolute;
	}
	.p-relative{
		position: relative;
	}
	.p-absolute{
		position: absolute;
		top: 0;
		right: 0;
	}
	/*.btn.btn-primary, .bg-primary{
		background-color: #3165ff!important;
	}*/
	.btn.btn-primary, .bg-primary{
		background-color: #3165ffde!important;
	}
	.btn-primary-background{
		background-color: #eaefff;
		border-radius: 0.25rem;
	}
	.btn-primary-background span{
		font-weight: 100;
		font-size: 12px;
	}
	.btn-secondary:hover{
		color: #3165ff!important;
	}
	.bg-primary{
		background-color: #3165ffde!important;
	}
	.bg-primary-dark{
		background-color: #4b78ff!important;
	}
	.text-primary{
		color: #3165ffde!important;
	}
	.border-primary{
		border: 1px solid #3165ffde!important;
		border-radius: 1rem!important;
	}
	.bg-secondary, .btn-secondary{
		background-color: #eaefff!important;
	}
	.btn-secondary{
		border-color: #3165ffde!important;
	}
	.logo-container .logo{
		font-size: 20px;
		max-width: 5rem;
		height: auto;
	}
	.project-title{
		font-size: 30px;
		font-weight: 700;
		color: #3165ffde;
	}
	.fa.fa-user{
		font-size: 30px;
	}
	.data_element{
		border-color: #3165ffde!important;
		border: 2px solid;
		border-radius: 1rem;
	}
	.data_button_container{

	}
	.data_name{
		font-weight: 600;
		font-size: 30px;
		color: #3165ffde;
	}
	.data_button{
		border-color: #3165ffde!important;
		border: 2px solid;
		border-radius: 0.5rem;
	}
	.data_button span{
		color: #ffff;
	}
	.data_button button{
		background-color: #eaefff!important;
		color: #3165ffde;
	}
	.nav-item.nav-link.active{
		background-color: #3165ffde!important;
		font-weight: 600;
		color: #ffff!important;
	}
	.nav-item.nav-link{
		color: #3165ffde!important;
	}
	.pointer{
		cursor: pointer;
	}
	.badge-primary{
		background-color: #3165ffde!important;
	}
	.font-weight-bold{
		font-weight: bold;
	}
	.data_description{
		font-size: 13px;
		color: #3165ffde;
		text-align: justify;
	}
	/*.data_time .label{
		font-weight: 700;
		font-size: 13px;
	}*/
	.data_time .label{
		font-weight: 100;
		font-size: 12px;
	}
	.data_time .value{
		font-weight: 700;
		font-size: 11px;
		border-radius: 0.25rem;
	}
	.badge{
		border-radius: 0.50rem!important;
	}
	.instruction .title{
		font-weight: 800;
		font-size: 20px;
		/*text-align: center;*/
		text-decoration: underline;
	}
	.instruction .key{
		font-weight: 600;
		font-size: 15px;
	}
	.content ol li{
		font-weight: 600;
		font-size: 15px;
	}
	.instruction .value{
		font-size: 13px;
	}
	.font-bold{
		font-weight: 800;
	}
	.no-border{
		border-radius: 0px;
	}
	.btn-primary:not(:disabled):not(.disabled):active:focus, .show > .btn-primary.dropdown-toggle:focus {
	    box-shadow: 0 0 0 .2rem #eaefff!important;
	}
	.btn-primary:not(:disabled):not(.disabled):active, .show > .btn-primary.dropdown-toggle {
	    color: #fff!important;
	    background-color: #3165ffde!important;
	    border-color: #eaefff!important;
	}
	.instruction_container{
		position: absolute;
		left: 0;
		top: 0;
		width: 100vw;
		height: 75vh;
	}
	.small-msg{
		font-size: 13px;
		text-align: center;
	}
	.score .heading{
		font-size: 17px;
		font-weight: 800;
	}
	.marks .heading{
		font-size: 13px;
		font-weight: 800;
	}
	.correct_option .heading{
		font-size: 13px;
		font-weight: 800;
	}
	.answer_check .fa.fa-check{
		color: #008000!important;
		font-size: 40px;
	}
	.answer_check .fa.fa-times{
		color: #ff0000!important;
		font-size: 40px;
	}
	.badge-correct{
		background-color: #008000!important;
		color: #ffffff;
	}
	.back_button{
		font-weight: 100!important;
		font-size: 11px!important;
	}
	.time{
		background-color: #3165ffde;
		border-radius: 0.3rem;
		color: #ffffff;
		font-size: 13px;
		font-weight: bold;
	}
	.time_exam{
		font-size: 13px!important;
		font-weight: 800;
	}
	.profile_pic{
		max-width: 4rem;
	}
	.profile_pic img{
		width: 100%;
		height: auto;
	}
	.rounded{
		border-radius: 0.5rem!important;
	}
	.filter-text{
		width: 12rem!important;
	}
	input.full-width{
		width: 25.5rem!important;
	}
	input.half-width{
		width: 12rem!important;
	}
	.filter-to-text{
		width: 1rem!important;
	}
	.filter-text.w-auto{
		width: auto!important;
	}
	/*hover button*/
	a.bg-primary:focus, a.bg-primary:hover, button.bg-primary:focus, button.bg-primary:hover, button.btn-primary:focus, button.btn-primary:hover {
	    background-color: #3165ffde!important;
	    color: inherit!important;
	    box-shadow: none;
	}
	a.bg-primary.interactive:focus, a.bg-primary.interactive:hover, button.bg-primary.interactive:focus, button.bg-primary.interactive:hover, button.btn-primary.interactive:focus, button.btn-primary.interactive:hover {
	    background-color: #eaefff!important;
	    color: #3165ffde!important;
	}
	a.bg-secondary:focus, a.bg-secondary:hover, button.bg-secondary:focus, button.bg-secondary:hover, button.btn-secondary:focus, button.btn-secondary:hover {
	    background-color: #eaefff!important;
	    color: inherit!important;
	    box-shadow: none;
	}
	a.bg-secondary.interactive:focus, a.bg-secondary.interactive:hover, button.bg-secondary.interactive:focus, button.bg-secondary.interactive:hover, button.btn-secondary.interactive:focus, button.btn-secondary.interactive:hover {
	    background-color: #c1cbea!important;
	    color: #eaefff!important;

	}
	.score_qs_container{
		box-shadow: 0 8px 6px -6px grey;
	}
	.qs_number{
		font-size: 30px!important;
		font-weight: 200!important;
	}
	.color-dot{
		width: 0.8rem;
		height: 0.8rem;
	}
	.btn-primary-background.submit{
		background-color: #d1e8d1!important;
	}
	.btn-primary-background.submit .btn-primary{
		background-color: #008000!important;
	}
	.submit button.bg-primary.interactive:focus, .submit button.bg-primary.interactive:hover, .submit button.btn-primary.interactive:focus, .submit button.btn-primary.interactive:hover {
	    background-color: #d1e8d1!important;
	    color: #eaefff!important;

	}
</style>

@endpush