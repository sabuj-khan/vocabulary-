;(function($){
    $(document).ready(function(){
        $("#login").on('click', function(){
            $(".form-area h4").html("Log In");
            $("#action").val("login");
            $("#submit").val("Log In");
        });
        $("#register").on('click', function(){
            $(".form-area h4").html("Register");
            $("#action").val("register");
            $("#submit").val("Submit");
        });

        $(".menu-item").on('click', function(){
            $(".helement").hide();
            var target = '#'+$(this).data('target');
            $(target).show();
        })
        $("#alphabets").on('change', function(){
            var char = $(this).val().toUpperCase();
            
            if('ALL' == char){
                $("#twords tr").show();
                return true;
            }

            $("#twords tr:gt(0)").hide();
            
            $("#twords td").filter(function(){
                return $(this).text().indexOf(char) == 0;
            }).parent().show();
        });




    })
})(jQuery);