const currentDate = new Date().getDate();
setCookie();
const correctAnswers = ['D','C','B','D','B','B','A','B','C','A','B','B','A','A','A','A','A','A','B','B','C','B','B','A','A','B','B','A','B','B','B','C','B','C','C','B','A','C','D','D','C','B','A','D','C','C','D','C','B','A'];
const handle_form = document.querySelector('.quiz-form');
const result = document.querySelector('.result');
const quiz_section = document.querySelector('.quiz');


handle_form.addEventListener('submit',e=>{
    e.preventDefault();
    let score = 0;
    const userAnswers = [handle_form.q1.value,handle_form.q2.value,handle_form.q3.value,handle_form.q4.value,handle_form.q5.value,handle_form.q6.value,handle_form.q7.value,handle_form.q8.value,handle_form.q9.value,handle_form.q10.value,handle_form.q11.value,handle_form.q12.value,handle_form.q13.value,handle_form.q14.value,handle_form.q15.value,handle_form.q16.value,handle_form.q17.value,handle_form.q18.value,handle_form.q19.value,handle_form.q20.value,handle_form.q21.value,handle_form.q22.value,handle_form.q23.value,handle_form.q24.value,handle_form.q25.value,handle_form.q26.value,handle_form.q27.value,handle_form.q28.value,handle_form.q29.value,handle_form.q30.value,handle_form.q31.value,handle_form.q32.value,handle_form.q33.value,handle_form.q34.value,handle_form.q35.value,handle_form.q36.value,handle_form.q37.value,handle_form.q38.value,handle_form.q39.value,handle_form.q40.value,handle_form.q41.value,handle_form.q42.value,handle_form.q43.value,handle_form.q44.value,handle_form.q45.value,handle_form.q46.value,handle_form.q47.value,handle_form.q48.value,handle_form.q49.value,handle_form.q50.value];

    //check answers

    userAnswers.forEach((answer,index)=>{
        if(answer === correctAnswers[index]){
            score +=2;
        }
    });

    // show result on page
    scrollTo(0,0);
    result.querySelector('span').textContent = `${score}%`;
    result.classList.remove('d-none');

    let output = 0;
    const timer = setInterval(()=>{
        result.querySelector('span').textContent = `${output}%`;
        if(output === score){
            clearInterval(timer);
        }
        else{
            output++;
        }
        
    },10);
    quiz_section.remove();
    document.querySelector(".countdown").style.display = "none";
});


document.onkeydown = function(e) {
    if(event.keyCode == 123) {
        return false;
     }
    if(e.ctrlKey && e.shiftKey && e.which == 'I'.charCodeAt(0)) {
       return false;
    }
    if(e.ctrlKey && e.shiftKey && e.which == 'C'.charCodeAt(0)) {
       return false;
    }
    if(e.ctrlKey && e.shiftKey && e.which == 'J'.charCodeAt(0)) {
       return false;
    }
    if(e.ctrlKey && e.which == 'U'.charCodeAt(0)) {
       return false;
    }
  }

  document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
  });

let i= 0;
const timer = setInterval(()=>{
    i++;
    if(i === 5){
        clearInterval(timer);
    }
},3000);

var countDown = 30 * 60 * 1000;
var x = setInterval(function() {
    let score = 0;
    const userAnswers = [handle_form.q1.value,handle_form.q2.value,handle_form.q3.value,handle_form.q4.value,handle_form.q5.value,handle_form.q6.value,handle_form.q7.value,handle_form.q8.value,handle_form.q9.value,handle_form.q10.value,handle_form.q11.value,handle_form.q12.value,handle_form.q13.value,handle_form.q14.value,handle_form.q15.value,handle_form.q16.value,handle_form.q17.value,handle_form.q18.value,handle_form.q19.value,handle_form.q20.value,handle_form.q21.value,handle_form.q22.value,handle_form.q23.value,handle_form.q24.value,handle_form.q25.value,handle_form.q26.value,handle_form.q27.value,handle_form.q28.value,handle_form.q29.value,handle_form.q30.value,handle_form.q31.value,handle_form.q32.value,handle_form.q33.value,handle_form.q34.value,handle_form.q35.value,handle_form.q36.value,handle_form.q37.value,handle_form.q38.value,handle_form.q39.value,handle_form.q40.value,handle_form.q41.value,handle_form.q42.value,handle_form.q43.value,handle_form.q44.value,handle_form.q45.value,handle_form.q46.value,handle_form.q47.value,handle_form.q48.value,handle_form.q49.value,handle_form.q50.value];

    //check answers

    userAnswers.forEach((answer,index)=>{
        if(answer === correctAnswers[index]){
            score +=2;
        }
    });
    countDown -= 1000; 
    var min = Math.floor(countDown / (60 * 1000));
    var sec = Math.floor((countDown - (min * 60 * 1000)) / 1000);
    if (countDown <= 0) {
        result.querySelector('span').textContent = `${score}%`;
        result.classList.remove('d-none');
        quiz_section.remove();
        document.querySelector(".countdown").style.display = "none";
    } else {
        document.querySelector(".countdown").innerHTML = min + " : " + sec;
    }

}, 1000); 


function setCookie() {
    localStorage.setItem('show', currentDate+"true");
}

if(performance.getEntriesByType("navigation")[0].type === 'reload'){
    console.log(performance.getEntriesByType("navigation")[0].type);
    if(localStorage.getItem('show').includes(currentDate+"true")){
        //quiz_section.remove();
       // window.location='login.php';
        document.querySelector(".countdown").style.display = "none";
        let score = 0;
    const userAnswers = [handle_form.q1.value,handle_form.q2.value,handle_form.q3.value,handle_form.q4.value,handle_form.q5.value,handle_form.q6.value,handle_form.q7.value,handle_form.q8.value,handle_form.q9.value,handle_form.q10.value,handle_form.q11.value,handle_form.q12.value,handle_form.q13.value,handle_form.q14.value,handle_form.q15.value,handle_form.q16.value,handle_form.q17.value,handle_form.q18.value,handle_form.q19.value,handle_form.q20.value,handle_form.q21.value,handle_form.q22.value,handle_form.q23.value,handle_form.q24.value,handle_form.q25.value,handle_form.q26.value,handle_form.q27.value,handle_form.q28.value,handle_form.q29.value,handle_form.q30.value,handle_form.q31.value,handle_form.q32.value,handle_form.q33.value,handle_form.q34.value,handle_form.q35.value,handle_form.q36.value,handle_form.q37.value,handle_form.q38.value,handle_form.q39.value,handle_form.q40.value,handle_form.q41.value,handle_form.q42.value,handle_form.q43.value,handle_form.q44.value,handle_form.q45.value,handle_form.q46.value,handle_form.q47.value,handle_form.q48.value,handle_form.q49.value,handle_form.q50.value];

    //check answers

    userAnswers.forEach((answer,index)=>{
        if(answer === correctAnswers[index]){
            score +=2;
        }
    });
    }else{
        document.querySelector('.quiz').style.display = "show";
    }
}

