var Connection = (function(){

  function Connection(username, chatWindowId, url) {
    this.username = username;
    this.chatwindow = document.getElementById(chatWindowId);

    this.open = false;

    this.socket = new WebSocket("ws://" + url);
    this.setupConnectionEvents();
  }

  Connection.prototype = {
    updateUsername : function(){
      this.socket.send(JSON.stringify({
        action: 'setname',
        username: this.username
      }));
    },

    addChatMessage : function(name, msg){
      if(msg == "clear"){
        this.chatwindow.innerHTML = "";
        return;
      }
      this.chatwindow.innerHTML += "<p>" + name + ":  " + msg + "</p>";
    },

    addSystemMessage : function(msg){
      this.chatwindow.innerHTML += "<p>" + msg + "</p>";
    },

    setupConnectionEvents : function () {
      var self = this;

      self.socket.onopen = function(evt) { self.connectionOpen(evt); };
      self.socket.onmessage = function(evt) { self.connectionMessage(evt); };
      self.socket.onclose = function(evt) { self.connectionClose(evt); };
    },

    connectionOpen : function(evt){
      this.open = true;
      this.addSystemMessage("Connected");

      this.updateUsername();
    },
    connectionMessage : function(evt){
      if(!this.open)
        return;

      var data = JSON.parse(evt.data);
      if(data.action == "setname"){
        if(data.success)
          this.addSystemMessage("Set username to " + this.username);
        else
          this.addSystemMessage("Username " + this.username + " has been taken");
      }
      else if(data.action == "message"){
        this.addChatMessage(data.username, data.msg);
      }

    },
    connectionClose : function(evt){
      this.open = false;
      this.addSystemMessage("Disconnected");
    },

    sendMsg : function(message){
      console.log(this.open);
      if(this.open){
        this.socket.send(JSON.stringify({
          action: "message",
          msg : message
        }));

        this.addChatMessage(this.username, message);

      } else {
        this.addSystemMessage("You are not connected");
      }
    }

  };

  return Connection;

})();
