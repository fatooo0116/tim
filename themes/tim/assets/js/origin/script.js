
    var didScroll = false;    
    $(window).scroll(function() {
        didScroll = true;     
    });
    
    setInterval(function() {
        if( didScroll ) {
            didScroll = false;

            var scrollVal = $(window).scrollTop();
            console.log(scrollVal);
            if(scrollVal>100){
                $("header").addClass("fixed");
                if(!$("header").hasClass("sw")){
                    setTimeout(function(){
                         $("header").addClass("sw");
                    }, 100);
                }
            }else{
                $("header").removeClass("fixed");
                $("header").removeClass("sw");
            }      
        
        }
    }, 250);


    


