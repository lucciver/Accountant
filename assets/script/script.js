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
});

$(document).ready(function() {
  $("#form").submit(function(e) {
      var form = $(this);
      var url = form.attr('action');

      $.ajax({
             type: "POST",
             url: url,
             data: form.serialize(), // serializes the form's elements.
             success: function(data) {
                 form.trigger("reset");
                 swal({
                  title: "Changes have been saved",
                  icon: "success",
                });
             }
           });

      e.preventDefault(); // avoid to execute the actual submit of the form.
  });
});
