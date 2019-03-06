$(function(){
	$("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        transitionEffectSpeed: 300,
        labels: {
            next: "Next",
            previous: "Back"
        },
        onStepChanging: function (event, currentIndex, newIndex) { 
            if ( newIndex === 1 ) {
                $('.steps ul').addClass('step-2');
            } else {
                
                $('.steps ul').removeClass('step-2');
            }
            if ( newIndex === 2 ) {
                $('.steps ul').addClass('step-3');
                $('.actions ul').addClass('mt-7');
            } else {
                $('.steps ul').removeClass('step-3');
                $('.actions ul').removeClass('mt-7');
            }
            return true; 
        }
    });
    // Custom Button Jquery Steps
    $('.forward').click(function(){
    	$("#wizard").steps('next');
    })
    $('.backward').click(function(){
        $("#wizard").steps('previous');
    })
    // Grid 
    

    $(".grid .grid-item").each(function () {
        if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
        $(this).addClass('active');
         }
        else {
        $(this).removeClass('active');
        }
    });

    $(".grid .grid-item").on("click", function (e) {
        $(this).toggleClass('active');
        var $checkbox = $(this).find('input[type="checkbox"]');
        $checkbox.prop("checked",!$checkbox.prop("checked"))

        e.preventDefault();
});
    // Click to see password 
    $('.password i').click(function(){
        if ( $('.password input').attr('type') === 'password' ) {
            $(this).next().attr('type', 'text');
        } else {
            $('.password input').attr('type', 'password');
        }
    }) 
    // Date Picker
    var dp1 = $('#dp1').datepicker().data('datepicker');
    dp1.selectDate( new Date( ));
})
