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
    <form action="{{ route('post.store') }}" method="POST">
      @csrf
      <label for="fname">First name:</label><br>
      <input type="text" id="name" name="name"><br>
      <label for="desc">Desc:</label><br>
      <textarea id="desc" name="description"></textarea><br><br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form> 
  </div>
</body>
</html>