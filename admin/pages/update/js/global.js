
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


