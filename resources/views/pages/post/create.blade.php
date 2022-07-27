<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Posts</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  
  <div class="container">

    <form class="needs-validation" action="{{ route('post.store') }}" method="POST">
      @csrf
      <label for="fname">First name:</label><br>
      <input type="text" id="name" name="name" maxlength="11" value="{{ old('name') }}"><br>

      {{-- METHOD 2 --}}
      @error('name')
        <div class="">
          {{$errors->first('name')}}
        </div>
      @enderror

      <label for="desc">Desc:</label><br>
      <textarea id="desc" name="description">{{ old('description') }}</textarea>
      @error('description')
        <div class="">
          please enter
        </div>
      @enderror
      </br></br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form> 
  </div>
</body>
</html>