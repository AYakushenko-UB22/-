function removeElements(arr) {
    const filteredArray = arr.filter((num) => {
      const integerPart = Math.abs(Math.trunc(num));
      const digits = Array.from(String(integerPart), Number);
      return digits.some((digit) => digit % 2 === 1);
    });
  
    console.log("Исходный массив:", arr);
    console.log("Массив после удаления элементов:", filteredArray);
  }
  
  const array = [3.14, -2.5, 6.8, 11.2, -9.7];
  removeElements(array);