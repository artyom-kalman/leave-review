<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Оставьте отзыв</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><link rel='stylesheet' href='https://static.fontawesome.com/css/fontawesome-app.css'>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'><link rel="stylesheet" href="src/styles.css">

</head>
<body>

<div class="bg-primary">  
  <div class="container d-flex align-items-center justify-content-center">
    <div class="col justify-content-center">    
      
      <!-- star rating -->
      <div class="rating-wrapper">
        
        <!-- star 5 -->
        <input type="radio" id="5-star-rating" name="star-rating" value="5">
        <label for="5-star-rating" class="star-rating">
          <i class="fas fa-star d-inline-block"></i>
        </label>
        
         <!-- star 4 -->
        <input type="radio" id="4-star-rating" name="star-rating" value="4">
        <label for="4-star-rating" class="star-rating star">
          <i class="fas fa-star d-inline-block"></i>
        </label>
        
         <!-- star 3 -->
        <input type="radio" id="3-star-rating" name="star-rating" value="3">
        <label for="3-star-rating" class="star-rating star">
          <i class="fas fa-star d-inline-block"></i>
        </label>
        
        <!-- star 2 -->
        <input type="radio" id="2-star-rating" name="star-rating" value="2">
        <label for="2-star-rating" class="star-rating star">
          <i class="fas fa-star d-inline-block"></i>
        </label>
        
        <!-- star 1 -->
        <input type="radio" id="1-star-rating" name="star-rating" value="1">
        <label for="1-star-rating" class="star-rating star">
          <i class="fas fa-star d-inline-block"></i>
        </label>
        
      </div>
      
      <div class="form-group mt-5">
        <label for="comment" class="text-white">Комментарий</label>
        <textarea class="form-control" id="comment"></textarea>
      </div>

      <button type="button" class="btn btn-dark" id="send">Отправить</button>

    </div>
  </div>
</div>

<script src='https://use.fontawesome.com/releases/v5.0.2/js/all.js'></script>

<!-- <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script> -->
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script> -->
<!-- <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script> -->

</body>
</html>
