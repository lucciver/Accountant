<!DOCTYPE html>
<html>
<head>
  <?php include("snippet/head.php"); ?>
</head>
<body>
  <?php include("snippet/navbar.php"); ?>

  <div class="m-5" id="overview">
    <div class="card my-3" v-for="(friend, index) in friends" v-if="friend.expenses.length > 0">
      <div class="card-header">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" :data-target="'#collapsible' + index" aria-expanded="true" :aria-controls="'collapsible' + index">
            {{ friend.firstname }} {{ friend.lastname }}
          </button>
        </h5>
      </div>

      <div :id="'collapsible' + index" class="collapse show" data-parent="#overview">
        <div class="card-body">
          <hr>

          <div v-for="cost in friend.expenses">
            <div class="btn btn-outline-none">
              {{ cost.description }}
            </div>

            <form action="ajax/delete.php" method="post" class="float-right">
              <div class="btn btn-outline-primary">
                {{ cost.amount }} &euro;
              </div>

              <input name="id" type="hidden" :value="cost.id">
              <input class="btn btn-outline-danger" type="submit" value="Delete">
            </form>
            <hr>
          </div>

        </div>
      </div>
    </div>
  </div>

  <?php include("snippet/footer.php"); ?>
</body>
</html>
