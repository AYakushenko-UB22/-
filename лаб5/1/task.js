function isPrime(number) {

  if (number < 2) {
    return false;
  }

  for (let i = 2; i <= Math.sqrt(number); i++) {
    if (number % i === 0) {
      return false;
    }
  }

  return true;
}

const input = prompt("Введите число:");

const number = parseInt(input);

if (isPrime(number)) {
  console.log(number + " - простое число");
} else {
  console.log(number + " - не является простым числом");
}