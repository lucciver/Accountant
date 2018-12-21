<!DOCTYPE html>
<html>
<head>
  <?php include("assets/snippet/head.php"); ?>
</head>
<body>
  <?php include("assets/snippet/navbar.php"); ?>

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

            <!-- Price row with buttons -->
            <form action="ajax/delete.php" method="post" class="float-right">
              <button type="button" class="btn btn-outline-primary" data-toggle="modal" :data-target="'#modal' + cost.id">
                {{ cost.amount }} &euro;
              </button>

              <input name="id" type="hidden" :value="cost.id">
              <input class="btn btn-outline-danger" type="submit" value="Delete">
            </form>
            <hr>


            <!-- Modal -->
            <div class="modal fade" :id="'modal' + cost.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit price</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="ajax/set.php" method="post" class="float-right">
                    <div class="modal-body">
                      <div class="form-group">
                        <input type="number" step="0.01" name="amount" placeholder="Amount" :value="cost.amount" class="form-control">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <input name="id" type="hidden" :value="cost.id">
                      <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-outline-primary">Save changes</button>
                    </div>
                  </form>

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
