var element;
if ($("#overview").length) element = "#overview";
else if ($("#add").length) element = "#add";

new Vue({
  el: element,
  data: {
    search: '',
    friends: []
  },
  mounted: function() {
    var self = this;

    jQuery.getJSON('/ajax/get.php', null, function(friends) {
      self.friends = friends;
    });
  },
  methods: {
    getTotal: function(expenses) {
      var tempTotal = 0;

      for (var i = 0; i < expenses.length; i ++) {
        tempTotal += parseFloat(expenses[i].amount);
      }

      return Math.round(tempTotal * 100) / 100;
    },
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
  },
  computed: {
    filteredList: function() {
      var tempArray = [];

      for (var i = 0; i < this.friends.length; i ++) {
          var firstname = this.friends[i].firstname.toLowerCase();
          var lastname = this.friends[i].lastname.toLowerCase();

          if (firstname.includes(this.search.toLowerCase()) || lastname.includes(this.search.toLowerCase())) tempArray.push(this.friends[i]);
      }

      $('.collapse').collapse('hide');
      return tempArray;
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
