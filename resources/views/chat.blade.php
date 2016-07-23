<html>
  </head>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/chat.css')}}"/>
  </head>
<body id="body">    
    <div class="container">
        <div class="col-md-12 col-lg-6 col-lg-offset-3">
            <div class="panel">
              <!--Heading-->
            <div class="panel-heading">
              <h3 class="panel-title">Chat</h3>
            </div>
            <!--Widget body-->
            <div id="demo-chat-body" class="collapse in">
              <div class="nano has-scrollbar" style="height:380px">
                <div class="nano-content pad-all" tabindex="0" style="right: -17px;">
                  <ul class="list-unstyled media-block">
                    <li class="mar-btm" v-for="message in messages">
                      <div v-bind:class="$index % 2 == 0 ? 'media-right' : 'media-left'">
                        <img src="http://localhost/images/we.jpg" class="img-circle img-sm" alt="Profile Picture">
                      </div>
                      <div class="media-body pad-hor" v-bind:class="$index % 2 == 0 ? 'speech-right' : ''">
                        <div class="speech">
                          <a href="#" class="media-heading">Maagii</a>
                          <p style="color:green">@{{ message }}</p>
                          <p class="speech-time">@{{ $index }}
                          <i class="fa fa-clock-o fa-fw"></i>02:47 :D
                          </p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              <div class="nano-pane"><div class="nano-slider" style="height: 141px; transform: translate(0px, 0px);"></div></div></div>
              <!--Widget footer-->
              <div class="panel-footer">
                <div class="row">
                  <div class="col-xs-9">
                    <input class="chat-input form-control" style="height:30px; !important"/>
                  </div>
                  <div class="col-xs-3">
                    <button class="btn btn-primary btn-block" type="submit">Send</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    <script>  
      var socket = io('http://flexgym:3000/');

      new Vue({
        el: 'body',

        data: {
            messages: []
        },

        ready: function(){
          socket.on('flexgym:App\\Events\\Chat', function(data){
            this.messages.unshift(data.messageText);
          }.bind(this));
        }
      });

      function send()
      {
          $.ajax({
            url: "/chat/send",
            type: "GET", //send it through get method
            data:{ username:'tuvshoo', message: $('.chat-input').val()},
            success: function(response) {
              //Do Something
              $('.chat-input').val('');
            },
            error: function(xhr) {
            }
          });
      }

      $(document).ready(function() {

          $(".chat-input" ).keydown(function(event) {
            debugger;
            if ( event.which == 13 ) {
              send();
            }
          });  

          $("button").click(function(){
              send();
          });
      });
    </script>
  </body>
</html>