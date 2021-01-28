@extends( 'base_layout' )

@section('content')
<div class="container my-5">
  <h1>Temporary login</h1>
  <form method="post" action="/login">
      @csrf
    <div class="form-group">
      <label for="formGroupExampleInput">UserName</label>
      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="username">
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Password</label>
      <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Another input" name="password">
    </div>
    <button type="submit" class="btn btn-primary"> Login </button>
  </form>
</div>
@endsection