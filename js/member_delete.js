bootbox.dialog({
  message: "Are you sure you want to delete this member?",
  title: "Delete Member",
  buttons: {
    Cancel: {
      label: "Cancel",
      className: "btn-default",
      callback: function() {
        console.log("great success");
      }
    },
    danger: {
      label: "Delete",
      className: "btn-danger",
      callback: function() {
        console.log("uh oh, look out!");
      }
    }
  }
});
