@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        @include('partials.alert')
        <div class="card">
            <div class="card-header">Upload Bill Image</div>
            <div class="card-body">
                <p class='mb-3'>This form will attempt to extract water meter reading from an image</p>
                <form method="post" id='this-form'>
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
                        <select name="user" class='form-control' required='true'>
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
    $("#this-form").submit(function(e) {
      e.preventDefault()
      let data = new FormData()
      let input = document.querySelector('input[type="file"]')
      data.append('file', input.files[0])

      fetch('https://jaided.ai/api/output', {
        method: 'POST',
        body: data,
        mode: 'no-cors',
        headers: {
          'apikey': 'SLsurNtcK9lUD1NRCuEab2VDC7GuRoD0',
          'username': '6hislain',
        },
      })
        .then((res) => res.json())
        .then((data) => console.log(data))
    })
})
</script>
@endsection
