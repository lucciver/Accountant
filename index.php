<!DOCTYPE html>
<html>
<head>
  <?php include("assets/snippet/head.php"); ?>
</head>
<body>
  <?php include("assets/snippet/navbar.php"); ?>

  <div class="m-5" id="overview">
    <input class="form-control" type="text" v-model="search" placeholder="Search" aria-label="Search">

    <div class="card my-3" v-for="(friend, friend_index) in filteredList" v-if="friend.expenses.length > 0">
      <div class="card-header">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" :data-target="'#collapsible' + friend_index" aria-expanded="true" :aria-controls="'collapsible' + friend_index">
            {{ friend.firstname }} {{ friend.lastname }}
          </button>
          <div style="float: right; padding: 8px 12px; font-size: 16px;">{{ getTotal(friend.expenses) }} &euro;</div>
        </h5>
      </div>

      <div :id="'collapsible' + friend_index" class="collapse" data-parent="#overview">
        <div class="card-body">
          <hr>

          <div v-for="(cost, cost_index) in friend.expenses">
            <div class="btn btn-outline-none">
              {{ cost.description }}
            </div>

            <!-- Price row with buttons -->
            <div class="float-right">
              <button type="button" class="btn btn-outline-primary">
                {{ cost.amount }} &euro;
              </button>

              <button v-on:click="deleteExpense(friend_index, cost_index)" class="btn btn-outline-danger" type="submit">Delete</button>
            </div>

            <hr>
          </div>

        </div>
      </div>
    </div>
  </div>

  <?php include("assets/snippet/footer.php"); ?>
</body>
</html>
