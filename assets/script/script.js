var element;
if ($("#overview").length) element = "#overview";
else if ($("#add").length) element = "#add";

new Vue({
  el: element,
  data: {
    friends: []
  },
  mounted: function() {
    var self = this;

    jQuery.getJSON('/ajax/get.php', null, function(friends) {
      self.friends = friends;
    });
  },
  methods: {
    deleteExpense: function(friend_index, cost_index) {
      var id = this.friends[friend_index].expenses[cost_index].id;
      this.friends[friend_index].expenses.splice(cost_index, 1);

      $.ajax({
        method: "POST",
        url: "ajax/delete.php",
        data: {
          action: "expense",
          id: id
        }
      })
    },

    someHandler: function(friend_index, cost_index) {
      var id = this.friends[friend_index].expenses[cost_index].id;
      var amount = this.friends[friend_index].expenses[cost_index].amount;

      $.ajax({
        method: "POST",
        url: "ajax/set.php",
        data: {
          action: "expense",
          id: id,
          amount: amount,
        }
      })
    }
  }
});

$(document).ready(function() {
  $("form").submit(function(e) {
      var form = $(this);
      var url = form.attr('action');

      $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function() {
          Swal(
            "Good news!",
            "Changes have been save",
            "success"
          )
        },
        fail: function(){
          Swal(
            "Bad news!",
            "Something went wrong",
            "error"
          )
        }
      });

      form.trigger("reset");
      e.preventDefault(); // avoid to execute the actual submit of the form.
  });
});
