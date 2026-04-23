const input = document.getElementById("exp_field");
const digits = document.getElementsByClassName("digit");
for (let i = 0; i < digits.length; i++) {
  digits[i].addEventListener("click", getValue);
}
const operations = document.getElementsByClassName("operation");
for (let i = 0; i < operations.length; i++) {
  operations[i].addEventListener("click", getOperation);
}
const equal = document.getElementById("equal");
equal.addEventListener("click", calculate);

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
  if (last === "+" || last === "-" || last === "*" || last === "/") {
    input.value = input.value.slice(0, input.value.length - 1);
    input.value += op;
  } else {
    input.value += op;
  }
}

function calculate(event) {
  event.preventDefault();
  fetch("index.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `exp_field=${encodeURIComponent(input.value)}`,
  })
    .then((response) => response.text())
    .then((data) => {
      input.value = data;
    });
}
