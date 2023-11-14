var word = prompt("Введите слово:");

word = word.trim();

var syllables = 0;

console.log("Количество слогов: " + isVowel(word));

function isVowel(letter) {
    return letter.replace(/[^aeiouyаеёиоуыэюя]/g, "").length; 
}

