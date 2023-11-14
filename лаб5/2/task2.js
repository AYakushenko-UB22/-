function calculateSum(arr) {
    let sum = 0;
    let found = false;
  
    for (let i = 0; i < arr.length; i++) {
      if (Math.sin(arr[i]) > 0) {
        found = true;
        break;
      }
      sum += arr[i];
    }
  
    if (!found) {
      console.log("Нет элементов, удовлетворяющих условию");
      return;
    }
  
    console.log("Сумма элементов до первого положительного синуса:", sum);
  }
  
  const array = [10, -27, 3, -4, 0];
  calculateSum(array);