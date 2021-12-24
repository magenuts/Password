require(['jquery'],function($){
    $(document).ready(function() {
      if(window.moduleConfig == 1){
        $( "input[type='password']" ).after(
          function() {
            return "<span toggle='#"+this.id+"' class='eye-open field-icon toggle-password'></span>"
          });
        $(document).on('click', '.toggle-password' , function() {
            $(this).toggleClass("eye-open");
            $(this).toggleClass("eye-close");
              var input = $($(this).attr("toggle"));
              if (input.attr("type") == "password") {
              input.attr("type", "text");
              } else {
              input.attr("type", "password");
            }
        });
      }
    });
});