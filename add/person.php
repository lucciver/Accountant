<!DOCTYPE html>
<html>
  <head>
    <?php include("../snippet/head.php"); ?>
  </head>
  <body>
    <?php include("../snippet/navbar.php"); ?>

    <div class="m-5" id="add">
      <form action="/ajax/set.php" method="post">
        <div class="form-group">
          <input type="text" name="first" placeholder="First name" class="form-control">
        </div>

        <div class="form-group">
          <input type="text" name="last" placeholder="Last name" class="form-control">
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-outline-primary btn-block" value="Add">
        </div>
      </form>
    </div>


    <?php include("../snippet/footer.php"); ?>
  </body>
</html>
