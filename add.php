<!DOCTYPE html>
<html>
  <head>
    <?php include("snippet/head.php"); ?>
  </head>
  <body>
    <?php include("snippet/navbar.php"); ?>

    <div class="m-5" id="add">
      <form action="/form.php" method="post">
        <div class="form-group">
          <select name="friend" class="form-control">
            <option :value="friend.id" name="friend" v-for="friend in friends">{{friend.firstname}}</option>
          </select>
        </div>

        <div class="form-group">
          <input type="number" name="amount" placeholder="Amount" class="form-control">
        </div>

        <div class="form-group">
          <textarea name="description" placeholder="Description" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-outline-primary btn-block" value="Add">
        </div>
      </form>
    </div>


    <?php include("snippet/footer.php"); ?>
  </body>
</html>
