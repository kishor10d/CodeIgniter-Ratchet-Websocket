var Connection2 = (function(){

  function Connection2(url) {

      this.open = false;

      this.socket = new WebSocket("ws://" + url);
      this.setupConnectionEvents();
    }

  Connection2.prototype = {
    setupConnectionEvents : function () {
          var self = this;

          self.socket.onopen = function(evt) { self.connectionOpen(evt); };
          self.socket.onmessage = function(evt) { self.connectionMessage(evt); };
          self.socket.onclose = function(evt) { self.connectionClose(evt); };
      },

      connectionOpen : function(evt){
          this.open = true;
          this.addSystemMessage("Connected");
    },
      connectionMessage : function(evt){
          var data = JSON.parse(evt.data);
                
          this.addChatMessage(data.msg);
      },
      connectionClose : function(evt){
          this.open = false;
          this.addSystemMessage("Disconnected");
      },

      sendMsg : function(message){
        
          this.socket.send(JSON.stringify({
              msg : message
          }));
      },

      addChatMessage : function(data){
        
        switch(data.broadType){
          case Broadcast.POST : this.addNewPost(data); break;
          default : console.log("nothing to do");
        }
      },
    
      addNewPost : function(data){
      
        var newPost = data.data;

        newHtml = "<div>"+
                "<span> "+ newPost.postText + "</span>" +
                "</div>";

        $("#messages").prepend(newHtml);
      },
    
      addSystemMessage : function(msg){
          // this.chatwindow.innerHTML += "<p>" + msg + "</p>";
      }
    };

    return Connection2;

})();
