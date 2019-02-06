<!DOCTYPE html>
<html>
<head>
  <?php include("assets/snippet/head.php"); ?>
</head>
<body>
  <?php include("assets/snippet/navbar.php"); ?>

  <div class="m-5" id="overview">
    <div class="card my-3" v-for="(friend, friend_index) in friends" v-if="friend.expenses.length > 0">
      <div class="card-header">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" :data-target="'#collapsible' + friend_index" aria-expanded="true" :aria-controls="'collapsible' + friend_index">
            {{ friend.firstname }} {{ friend.lastname }}
          </button>
        </h5>
      </div>

      <div :id="'collapsible' + friend_index" class="collapse" :class="{ 'show' : friend_index === 0 }" data-parent="#overview">
        <div class="card-body">
          <hr>

          <div v-for="(cost, cost_index) in friend.expenses">
            <div class="btn btn-outline-none">
              {{ cost.description }}
            </div>

            <!-- Price row with buttons -->
            <div class="float-right">
              <button type="button" class="btn btn-outline-primary" data-toggle="modal" :data-target="'#modal' + cost.id">
                {{ cost.amount }} &euro;
              </button>

              <button v-on:click="deleteExpense(friend_index, cost_index)" class="btn btn-outline-danger" type="submit">Delete</button>
            </div>

            <hr>

            <!-- Modal -->
            <div class="modal fade" :id="'modal' + cost.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                      <div class="form-group mb-0 ">
                        <input type="number" step="0.01" name="amount" placeholder="Amount" v-on:change="persist" v-model="cost.amount" class="form-control">
                      </div>
                    </div>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <?php include("assets/snippet/footer.php"); ?>
</body>
</html>
