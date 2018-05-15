//variables

// template strating scripts that shows how to interact with elements from an html page - not relevant
const gloverVid = document.getElementById("video_glover1");
const gloverPic = document.getElementById('image_glover1');
const triviaBtn = document.getElementById("trivia");
const toggleBtn = document.getElementById('toggle');
const movieTable = document.getElementById('table');
const addMovieBtn = document.getElementById('addMovie');

triviaBtn.addEventListener("click", function(){
  //implement trivia functionality
  alert("Yay, are you ready to play some trivia ?");
})




const videoButton = document.getElementById("videoButton");
const seagalPic = document.getElementById("seagalPic");
//create celebrityVideo, table Button, movieTable, titleInput, yearInput and trivia variables for DOM manipulation using above code as reference


triviaFunc = () => {
  alert("Please enter the letter for the corresponding answer.");
  const value1 = prompt("What was Steven Seagal's first movie?   a: Above the Law, b: Under Siege, c: The Glimmer Man");
  if(value1 === "a"){
    alert("You got it right!");
  } else {
    alert("Incorrect, Please try again.")
    triviaFunc();
  }

  const value2 = prompt("How old is Steven Seagal?   a: 57, b: 72, c: 65" );
  //use value collected from prompt, if else statements, operators, and alerts to handle trivia question

  const value3 = prompt("What 2 martial arts forms does Seagal know? a: Akido, b: Muay Thai, c: Boxing, d: Judo");
  //use value collected from prompt, if else statements, operators, and alerts to handle trivia question

}

trivia.addEventListener("click", function(){
//call triviaFunc
});

videoButton.addEventListener("click", function(){
//toggle celebrityPic and celebrityVideo classes with button functionality
});

tableButton.addEventListener("click", function(){
  const row = movieTable.insertRow(1);
  const cell1 = row.insertCell(0);
  // create variable to insert new cell similar to code above
  cell1.innerHTML = titleInput.value;
  // add yearInput value to cell you just created
  //call resetInputValues function;
});

resetInputValues = () => {
  //define function to reset input values
};
