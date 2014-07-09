/*
 MooTools selector is not like jQuery, hence no '#' before the myButton below:
 */

$('myButton').addEvent("click", function () {

//   This chunk here actually creates the modal
    var SM = new SimpleModal({"btn_ok": "Confirm button"});
    SM.addButton("Action button", "btn primary", function () {
        alert("Add your code");
        this.hide();
    });
    SM.addButton("Cancel", "btn");
    SM.show({
        "model": "modal",
        "title": "Title",
        "contents": "Allo, Jeffaz..."
    });

});