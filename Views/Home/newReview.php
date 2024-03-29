<div class="container d-flex align-items-center justify-content-center">
    <div class="col justify-content-center">    
      <form method="POST">
        <!-- star rating -->
        <div class="rating-wrapper">
          
          <!-- star 5 -->
          <input type="radio" id="5-star-rating" name="rating" value="5">
          <label for="5-star-rating" class="star-rating">
            <i class="fas fa-star d-inline-block"></i>
          </label>
          
          <!-- star 4 -->
          <input type="radio" id="4-star-rating" name="rating" value="4">
          <label for="4-star-rating" class="star-rating star">
            <i class="fas fa-star d-inline-block"></i>
          </label>
          
          <!-- star 3 -->
          <input type="radio" id="3-star-rating" name="rating" value="3">
          <label for="3-star-rating" class="star-rating star">
            <i class="fas fa-star d-inline-block"></i>
          </label>
          
          <!-- star 2 -->
          <input type="radio" id="2-star-rating" name="rating" value="2">
          <label for="2-star-rating" class="star-rating star">
            <i class="fas fa-star d-inline-block"></i>
          </label>
          
          <!-- star 1 -->
          <input type="radio" id="1-star-rating" name="rating" value="1">
          <label for="1-star-rating" class="star-rating star">
            <i class="fas fa-star d-inline-block"></i>
          </label>
          
        </div>
        
        <div class="form-group mt-5">
          <label for="comment" class="text-white">Комментарий</label>
          <textarea class="form-control" name="comment"></textarea>
        </div>

        <button type="submit" name="send" class="btn btn-dark" value="send">Отправить</button>
      </form>
    </div>
</div>