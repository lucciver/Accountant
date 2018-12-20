let element;
if ($("#overview").length) element = "#overview";
else if ($("#add").length) element = "#add";

new Vue({
  el: element,
  data: {
    friends: []
  },
  mounted: function() {
    var self = this;

    jQuery.getJSON('/ajax/data.php', null, (friends) => {
      self.friends = friends;
    });
  },
});
