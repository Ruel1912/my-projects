// <T> - дженерик
function logTime<T>(num: T): T {
  console.log(new Date());
  return num;
}

// При вызове функции мы передаём number, значит что вместо T везде подставится number
logTime<number>(3);


// Дженерики можно использовать в inteface
interface MyInteface {
  transform: <T, F>(a: T) => F // данная запись означает, что параметр функции должен принимать тип данных T, а функция должна возвращать тип данных F
}

interface TimeStamp {
  stamp: number
}

// Дженерик можно наследовать от интерфейса
function logTimeStamp<T extends TimeStamp>(num: T): T {
  console.log(num.stamp); // Теперь после extends можно использовать stamp
  return num;
} 


