var messagebox  = document.getElementById('messagebox');
var username = document.getElementById("username");
var chatcontainer = document.getElementById("chatcontainer");

var conn;

username.addEventListener("keypress", function(evt){
  if (evt.which != 13) {
    return;
  }

  evt.preventDefault();

  var name = this.value;
  this.style.display = "none";
  chatcontainer.style.display = "block";

  conn = new Connection(name, "chatwindow", "192.168.1.15:2000");
});

messagebox.addEventListener("keypress", function(e){
  if (e.which != 13 || conn == undefined) {
    return;
  }

  e.preventDefault();

  if (this.value == "") {
    return;
  }

  conn.sendMsg(this.value);

  this.value = "";

});
