@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        @include('partials.alert')
        <div class="card">
            <div class="card-header">Upload Bill Image</div>
            <div class="card-body">
                <p class='mb-3' id='message'>
                  This form will attempt to extract water meter reading from an image
                </p>
                <form method="post" id='this-form' enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input
                            type="file"
                            name="file"
                            required='true'
                            accept="image/*" 
                            placeholder="Email"
                        />
                    </div>
                    <div class="form-group">
                        <select name='user' class='form-control' required='true'>
                          <option value="">. . . Client . . .</option>
                          @foreach ($users as $user)
                          <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                          @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ secure_asset('js/jquery-2.1.0.min.js') }}"></script>
<script>
$(document).ready(() => {
    function getMeterReading(id = 0) {
      fetch('https://do.chapchapexpress.rw/?action=meter&id='+id, {
        method: 'GET',
      })
        .then((res) => res.json())
        .then((data) => {
          $('#message').html(data[0])
        })
    }

    $("#this-form").submit(function(e) {
      e.preventDefault()
      let data = new FormData(document.forms.namedItem("this-form"))
      fetch('https://do.chapchapexpress.rw/?action=do', {
        method: 'POST',
        body: data,
      })
        .then((res) => res.json())
        .then((data) => {
          console.log(data)
          setInterval(() => {
            getMeterReading(data[0]);
          }, 5_000);
        })
    })
})
</script>
@endsection
