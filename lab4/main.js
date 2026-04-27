const input = document.getElementById("exp_field");
const digits = document.getElementsByClassName("digit");
for (let i = 0; i < digits.length; i++) {
  digits[i].addEventListener("click", getValue);
}
const operations = document.getElementsByClassName("operation");
for (let i = 0; i < operations.length; i++) {
  operations[i].addEventListener("click", getOperation);
}

const clear = document.getElementById("clear");
const absClear = document.getElementById("abs_clear");
clear.addEventListener("click", backspace);
absClear.addEventListener("click", resetAll);

function getValue(event) {
  let digit_value = event.target.value;
  if (input.value === "0") {
    input.value = digit_value;
  } else {
    input.value += digit_value;
  }
}

function getOperation(event) {
  let op = event.target.value;
  let last = input.value[input.value.length - 1];
  const ARITH = new Set(["+", "-", "*", "/", ":"]);

  if (op === "(") {
    input.value = input.value === "0" ? "(" : input.value + op;
    return;
  }
  if (op === ")") {
    if (input.value === "0") return;
    input.value += op;
    return;
  }

  if (ARITH.has(op) && ARITH.has(last)) {
    input.value = input.value.slice(0, -1) + op;
    return;
  }
  input.value += op;
}

function backspace(event) {
  event.preventDefault();
  if (input.value.length <= 1) {
    input.value = "0";
    return;
  }
  input.value = input.value.slice(0, -1);
}

function resetAll(event) {
  event.preventDefault();
  input.value = "0";
}
