
// Function to submit the form after a delay
function delayedSubmit() {
    document.getElementById("js-wizard-form").submit();
}

// Wait for 2 minutes (2 * 60 * 1000 milliseconds) before submitting
setTimeout(delayedSubmit, 2 * 60 * 1000);

var progressBar = document.querySelector('.progress-bar');
var btns = document.querySelectorAll('.btn-next');
var btnBacks = document.querySelectorAll('.btn-back');


var element = document.querySelector('.progress-bar');
var styleAttribute = element.getAttribute('style');

var numericValue = parseFloat(styleAttribute.match(/width:\s*([\d.]+)%/)[1]);

var currentProgress=numericValue

for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener('click', function(event) {
        event.preventDefault();

        currentProgress += 5.55; // Increase progress by 25

        progressBar.style.width = currentProgress + '%';

        var progressVal = document.querySelector('.progress-val');
        progressVal.textContent = currentProgress + '%';
        progressVal.style.opacity = 1;
        window.scrollTo(0, 0)

    });
}

for (var i = 0; i < btnBacks.length; i++) {
    btnBacks[i].addEventListener('click', function(event) {
        event.preventDefault();


        currentProgress -= 5.55; // Decrease progress by 25

        progressBar.style.width = currentProgress + '%';

        var progressVal = document.querySelector('.progress-val');
        progressVal.textContent =parseInt(document.getElementsByClassName('progress-val')[0].textContent)-1;
        progressVal.style.opacity = 1;
        window.scrollTo(0, 0)

    });
}

(function ($) {
    'use strict';
    /*[ Wizard Config ]
        ===========================================================*/
    
    try {
    
    
        $("#js-wizard-form").bootstrapWizard({
            'tabClass' : 'nav-tab',
            'nextSelector': '.btn-next',
            'previousSelector' : '.btn-back',
            'lastSelector': '.btn-last',
            'onNext': function(tab, navigation, index) {
                var progressBar = $('#js-progress').find('.progress-bar');
                var progressVal = $('#js-progress').find('.progress-val');
                var current = index + 1;
                if (current > 1) {
                    var val = parseFloat(progressBar.text());
                    val += 5.55;
                    progressVal.text(current+'');
                }
    
            },
            'onPrevious' : function(tab, navigation, index) {
                var progressBar = $('#js-progress').find('.progress-bar');
                var progressVal = $('#js-progress').find('.progress-val');
                var current = index - 1;
                if (current !== 1) {
                    var val = parseFloat(progressBar.text());
                    val -= 5.55;
                }
    
            }
    
        });
    
    }
    catch (e) {
        console.log(e)
    }

})(jQuery);


