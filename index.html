<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flash Cards</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background: #f4f4f4; }
        .flashcard-container { width: 300px; height: 200px; perspective: 1000px; margin: 50px auto; }
        .flashcard { width: 100%; height: 100%; position: relative; transform-style: preserve-3d; transition: transform 0.5s; cursor: pointer; margin: 0 0 15px; }
        .flashcard.flip { transform: rotateY(180deg); }
        .flashcard .side { position: absolute; width: 100%;padding: 0 12px; height: 100%; backface-visibility: hidden; display: flex; align-items: center; justify-content: center; font-size: 18px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.2); }
        .front { background: #3498db; color: white; }
        .back { background: #2ecc71; color: white; transform: rotateY(180deg); }
        .nav-buttons { margin-top: 20px; }
        .buttns {display: flex ; justify-content: space-around;}
        .button { padding: 10px 20px; margin: 5px; cursor: pointer; background:rgb(29, 71, 99); color: white; border: none; border-radius: 5px; }
        .nav-buttons button { padding: 10px 20px; margin: 5px; cursor: pointer; }
        .progress-container { width: 100%; height: 10px; background: #ddd; margin-top: 10px; border-radius: 5px; overflow: hidden; } 
        #progress-bar { height: 100%; width: 0%; background: #257f4b; transition: width 0.3s; }
    </style>

</head>
<body>

<h2>Flash Cards</h2>
<div class="flashcard-container">
    <div id="flashcard" class="flashcard" onclick="flipCard()">
        
    </div>
    <div class="buttns">
    <button class="button" onclick="prevCard()">Previous</button>
    <button class="button" onclick="nextCard()">Next</button>
    </div>
    
    <div class="progress-container">
        <div id="progress-bar"></div>
    </div>

    <p id="progress-text">0 / 0</p>
</div>

<script src="flashcards.js"></script>

<script>
let flashcards = [];
let currentCardIndex = 0;

// جلب البيانات من قاعدة البيانات بناءً على معرف الدرس
function loadFlashcards(lessonId) {
    fetch(`get_flashcards.php?lesson_id=${lessonId}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error(data.error);
                return;
            }
            flashcards = data;
            currentCardIndex = 0;
            updateFlashcard();
        })
        .catch(error => console.error('Error fetching flashcards:', error));
}

// تحديث واجهة المستخدم
function updateFlashcard() {
    if (flashcards.length === 0) {
        document.querySelector(".flashcard-container").innerHTML = "لا توجد فلاش كارد لهذا الدرس";
        return;
    }

    let flashcard = document.getElementById("flashcard");
    flashcard.innerHTML = `<div class="side front">${flashcards[currentCardIndex].question}</div>
                           <div class="side back">${flashcards[currentCardIndex].answer}</div>`;
    
    updateProgress();
}
function flipCard() {
        document.querySelector(".flashcard").classList.toggle("flip");
    }

function resetCard() {
    let flashcard = document.querySelector(".flashcard");
    if (flashcard.classList.contains("flip")) {
        flashcard.classList.remove("flip");
    }
}

function nextCard() {
    if (currentCardIndex < flashcards.length - 1) {
        resetCard()
        currentCardIndex++;
        updateFlashcard();
    }else{
        alert("انتهى الدرس");
    }
}

function prevCard() {
    if (currentCardIndex > 0) {
        resetCard()
        currentCardIndex--;
        updateFlashcard();
    }
}

function updateProgress() {
    let progress = ((currentCardIndex + 1) / flashcards.length) * 100;
    document.getElementById("progress-bar").style.width = progress + "%";
    document.getElementById("progress-text").innerText = `${currentCardIndex + 1} / ${flashcards.length}`;
}
loadFlashcards(1);

</script>

</body>
</html>
